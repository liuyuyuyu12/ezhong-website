<?php
declare(strict_types=1);

/**
 * /views/home.php
 *
 * 首页内容说明：
 * - Banner、关于我们、视频、厂区、联系区仍保留在本文件。
 * - 产品、案例、新闻改为读取 views/data/*.php。
 * - 卡片 HTML 由 views/partials/*.php 负责渲染。
 */

$products = require __DIR__ . '/data/products.php';
$projects = require __DIR__ . '/data/projects.php';
$newsItems = require __DIR__ . '/data/news.php';

$filterFeatured = static function (array $items): array {
  $items = array_filter($items, static fn(array $item): bool => (bool)($item['featured'] ?? true));
  uasort($items, static function (array $a, array $b): int {
    return ((int)($a['sort'] ?? 999999)) <=> ((int)($b['sort'] ?? 999999));
  });
  return $items;
};

$sortNews = static function (array $items): array {
  $items = array_filter($items, static fn(array $item): bool => (bool)($item['featured'] ?? true));
  uasort($items, static function (array $a, array $b): int {
    return ((int)($b['sort'] ?? 0)) <=> ((int)($a['sort'] ?? 0));
  });
  return $items;
};

$featuredProducts = $filterFeatured($products);
$featuredProjects = $filterFeatured($projects);
$featuredNews = $sortNews($newsItems);
?>

<!-- 首页 Banner：阿里云 Web 播放器背景视频 -->
<section id="home" class="relative h-screen max-h-[800px] overflow-hidden">
  <div id="hero-player-wrap">
    <div id="hero-player" class="prism-player w-full h-full"></div>
  </div>

  <div class="absolute inset-0 bg-black/30 flex items-center justify-center z-10">
    <div class="container mx-auto px-4 text-center text-white">
      <h2 class="text-4xl md:text-6xl font-bold mb-6">智慧型压力钢管加工系统</h2>
      <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-10 leading-relaxed">
        国家抽水蓄能水电站高强度压力钢管制作及安装专家
      </p>
      <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6">
        <a href="#contact" class="bg-secondary hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full text-lg transition">立即咨询</a>
        <a href="#about" class="bg-white hover:bg-gray-100 text-primary font-bold py-3 px-8 rounded-full text-lg transition">了解更多</a>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', async function () {
  const VIDEO_ID = '60ba13df955b71f0bfe16733a68f0102';
  const MAX_LOOPS = 3;
  const wrap = document.getElementById('hero-player');

  if (!wrap || typeof Aliplayer === 'undefined') return;
  wrap.classList.add('hide-controls');

  async function getPlayAuth() {
    const response = await fetch(`/api/vod_playauth.php?videoId=${encodeURIComponent(VIDEO_ID)}`);
    return response.json();
  }

  try {
    const first = await getPlayAuth();
    if (!first.playAuth) {
      console.error('get playAuth failed:', first);
      return;
    }

    const player = new Aliplayer({
      id: 'hero-player',
      width: '100%',
      height: '100%',
      autoplay: true,
      muted: true,
      isLive: false,
      useH5Prism: true,
      vid: VIDEO_ID,
      playauth: first.playAuth,
      controlBarVisibility: 'hover',
      skinLayout: false,
      cover: (first.meta?.cover || '').replace(/^http:/, 'https:')
    }, function (p) {
      try {
        p.mute();
        p.play();
      } catch (e) {}
    });

    window.__ali = player;
    let loops = 0;

    async function replayOnce() {
      try {
        if (typeof player.replay === 'function') {
          player.replay();
        } else {
          player.seek(0);
          player.play();
        }
      } catch (e) {
        const fresh = await getPlayAuth();
        if (fresh.playAuth && typeof player.replayByVidAndPlayAuth === 'function') {
          player.replayByVidAndPlayAuth(VIDEO_ID, fresh.playAuth);
        }
      }
    }

    player.on('ended', async function () {
      loops++;
      if (loops < MAX_LOOPS) {
        await replayOnce();
      } else {
        player.pause();
        wrap.classList.remove('hide-controls');
      }
    });

    player.on('error', function (event) {
      console.error('AliPlayer error', event);
    });
  } catch (error) {
    console.error('hero video init failed:', error);
  }
});
</script>

<!-- 关于我们 -->
<section id="about" class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">关于我们</h2>
      <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
        湖北鄂重建设工程有限公司是湖北宏重重型机械有限公司的全资公司，专业从事新能源行业风电塔筒、水电压力钢管等钢结构的设计、制造和安装服务
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <img
          src="https://static.ezhong.co/assets/images/鄂重航拍图片_压缩.png?x-oss-process=image/format,webp/interlace,1"
          alt="公司厂区与设备"
          class="w-full h-96 object-cover rounded-xl"
        >
      </div>
      <div>
        <h3 class="text-2xl font-bold text-primary mb-4">公司简介</h3>
        <p class="text-gray-700 mb-4 leading-relaxed">
          湖北鄂重建设工程有限公司是湖北宏重重型机械有限公司的全资公司，是为适应市场的需要，服务卷板制管客户，提供卷板机、板头弯曲机等产品增值服务。特别是近年重点拓展国家抽水蓄能水电站的高强度压力钢管制作及安装项目。
        </p>
        <p class="text-gray-700 mb-4 leading-relaxed">
          公司是专业从事新能源行业风电塔筒、水电压力钢管、风能蓄能等高强度钢结构的设计、制造和安装服务。
        </p>
        <div class="mt-8">
          <h4 class="text-xl font-bold text-gray-800 mb-4">技术实力</h4>
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>拥有多年经验的高级工程师和技术团队</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>健全的管理机构、质控体系和检测手段</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>先进设计软件(SFCAD/HSTCAD/STSCAD)</span></li>
            <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i><span>经验丰富的专业安装队伍</span></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mt-20">
      <div class="text-center mb-10">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-800">智慧型压力钢管加工系统</h3>
        <p class="mt-2 text-gray-600">创新工艺引领行业变革</p>
      </div>

      <div class="max-w-4xl mx-auto">
        <div class="relative pb-[75%] h-0 overflow-hidden rounded-xl bg-black">
          <div id="process-player" class="absolute inset-0"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', async function () {
  const PROCESS_VIDEO_ID = '709b9295848771f0bfdf4531959c0102';
  const processEl = document.getElementById('process-player');
  if (!processEl || typeof Aliplayer === 'undefined') return;

  try {
    const response = await fetch(`/api/vod_playauth.php?videoId=${encodeURIComponent(PROCESS_VIDEO_ID)}`);
    const data = await response.json();
    if (!data.playAuth) {
      console.error('get playAuth failed:', data);
      return;
    }

    const processPlayer = new Aliplayer({
      id: 'process-player',
      width: '100%',
      height: '100%',
      autoSize: 'height',
      isLive: false,
      autoplay: false,
      useH5Prism: true,
      controlBarVisibility: 'hover',
      cover: (data.meta?.cover || '').replace(/^http:/, 'https:'),
      vid: PROCESS_VIDEO_ID,
      playauth: data.playAuth
    });

    let playing = false;
    processPlayer.on('play', function () { playing = true; });
    processPlayer.on('pause', function () { playing = false; });
    processPlayer.on('ended', function () { playing = false; });

    processEl.addEventListener('click', function (event) {
      if (event.target?.closest?.('.prism-controlbar')) return;
      try {
        playing ? processPlayer.pause() : processPlayer.play();
      } catch (e) {}
    });
  } catch (error) {
    console.error('process video init failed:', error);
  }
});
</script>

<!-- 产品中心 -->
<section id="products" class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">产品中心</h2>
      <p class="mt-4 text-gray-600 max-w-2xl mx-auto">我们提供高质量的压力钢管制造设备与解决方案</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($featuredProducts as $slug => $product): ?>
        <?php include __DIR__ . '/partials/product-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 案例展示 -->
<section id="projects" class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">案例展示</h2>
      <p class="mt-4 text-gray-600 max-w-2xl mx-auto">重点工程案例与现场图集</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <?php foreach ($featuredProjects as $slug => $project): ?>
        <?php include __DIR__ . '/partials/project-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 新闻动态 -->
<section id="news" class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">新闻动态</h2>
      <p class="mt-4 text-gray-600 max-w-2xl mx-auto">了解公司最新资讯与行业动态</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($featuredNews as $slug => $item): ?>
        <?php include __DIR__ . '/partials/news-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 厂区展示 -->
<section id="factory" class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">厂区展示</h2>
    </div>

    <div class="space-y-6">
      <div class="rounded-xl overflow-hidden">
        <img src="https://static.ezhong.co/assets/images/factory/厂区图1.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区图1" class="w-full h-auto object-cover" loading="lazy">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂区图2.png?x-oss-process=image/format,webp/interlace,1" alt="厂区图2" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂区图3.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区图3" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂区图4.png?x-oss-process=image/format,webp/interlace,1" alt="厂区图4" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂房内部1.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂房内部1" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂房内部2.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂房内部2" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂房内部3.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂房内部3" class="w-full h-64 md:h-80 object-cover" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 联系我们 -->
<section id="contact" class="py-16 bg-primary text-white">
  <div class="container mx-auto px-4">
    <div class="md:flex items-start justify-between gap-12">
      <div class="md:w-1/2 mb-10 md:mb-0">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">立即咨询</h2>
        <p class="text-lg md:text-xl mb-8 opacity-90">留下联系方式，我们会尽快与您取得联系</p>

        <div class="space-y-5">
          <div class="flex items-start">
            <i class="fas fa-phone-alt mr-4 text-xl mt-1"></i>
            <div>
              <div class="text-base opacity-80">电话</div>
              <div class="text-lg font-medium">13972950821（微信同号）</div>
              <div class="text-lg font-medium">0711-3611618（公司座机）</div>
            </div>
          </div>

          <div class="flex items-start">
            <i class="fas fa-map-marker-alt mr-4 text-xl mt-1"></i>
            <div>
              <div class="text-base opacity-80">地址</div>
              <div class="text-lg font-medium">湖北省鄂州市四海大道特一号</div>
            </div>
          </div>

          <div class="flex items-start">
            <i class="fas fa-envelope mr-4 text-xl mt-1"></i>
            <div>
              <div class="text-base opacity-80">邮箱</div>
              <div class="text-lg font-medium">ezjtlw@163.com</div>
            </div>
          </div>

          <div class="flex items-start">
            <i class="fab fa-weixin mr-4 text-xl mt-1"></i>
            <div>
              <div class="text-base opacity-80">微信</div>
              <div class="text-lg font-medium">微信同手机号</div>
              <button
                type="button"
                id="open-wechat-modal"
                class="mt-3 flex items-center justify-center gap-2 bg-white text-primary font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition"
              >
                <i class="fas fa-qrcode"></i>
                查看微信二维码
              </button>
              <p class="text-sm mt-2 opacity-80">如扫码不便，可直接添加手机号同号微信</p>
            </div>
          </div>
        </div>
      </div>

      <div class="md:w-1/2">
        <form id="contact-form" class="bg-white rounded-xl shadow-xl p-6 text-gray-800"
              onsubmit="event.preventDefault(); document.getElementById('wechat-dialog').showModal();">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 font-medium mb-2">您的姓名</label>
              <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            </div>
            <div>
              <label class="block text-gray-700 font-medium mb-2">联系方式</label>
              <input type="text" id="contact-way" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="电话/微信/QQ">
            </div>
            <div class="md:col-span-2">
              <label class="block text-gray-700 font-medium mb-2">咨询内容</label>
              <textarea id="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="请简要描述您的需求"></textarea>
            </div>
          </div>
          <button type="submit" class="mt-6 w-full bg-secondary text-white py-3 px-6 rounded-md hover:bg-red-700 transition font-medium">
            提交咨询并查看微信二维码
          </button>
        </form>
      </div>
    </div>
  </div>

  <dialog id="wechat-dialog" class="rounded-2xl p-0 w-[85vw] max-w-[400px] h-auto max-h-[68vh]">
    <div class="bg-white rounded-2xl overflow-hidden">
      <div class="px-6 pt-6">
        <h3 class="text-xl font-semibold text-gray-900">添加微信咨询</h3>
        <p class="text-gray-600 mt-1">扫描下方二维码，或搜索手机号添加</p>
      </div>

      <div class="p-6">
        <img
          src="https://static.ezhong.co/assets/images/wechat_qrcode.jpg?x-oss-process=image/format,webp/interlace,1"
          alt="微信二维码"
          class="w-64 h-auto mx-auto rounded-lg border"
        >
        <div class="mt-4 text-center text-gray-700 text-sm">
          <p>请在添加好友备注：<span class="font-medium">“设备/工程咨询”</span></p>
        </div>

        <button
          type="button"
          id="copy-remark"
          class="mt-4 w-full inline-flex items-center justify-center gap-2 bg-primary text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
        >
          <i class="fas fa-copy"></i> 复制备注信息
        </button>
      </div>

      <div class="px-6 pb-6 flex justify-end gap-3">
        <button
          type="button"
          class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50"
          onclick="document.getElementById('wechat-dialog').close()"
        >关闭</button>
      </div>
    </div>
  </dialog>
</section>
