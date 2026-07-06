<section class="bg-white">
  <!-- 顶部横幅 -->
  <div class="relative h-56 md:h-64 w-full overflow-hidden">
    <img src="https://static.ezhong.co/assets/images/news/新年开业-封面.jpg"
         alt="鄂重建设新年开业仪式"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="container mx-auto px-4">
        <nav class="text-white/80 text-sm mb-2">
          <a href="/?p=home" class="hover:text-white">首页</a>
          <span class="mx-2">/</span>
          <a href="/?p=news" class="hover:text-white">新闻动态</a>
          <span class="mx-2">/</span>
          <span class="text-white">鄂重建设新年开业仪式</span>
        </nav>
        <h1 class="text-2xl md:text-4xl font-extrabold text-white">
          鄂重建设新年开业仪式｜舞狮迎新 合影同庆
        </h1>
        <p class="mt-3 text-white/90">醒狮点睛、歌舞助兴、嘉宾致辞，现场氛围热烈，精彩瞬间一图尽览</p>
      </div>
    </div>
  </div>

  <!-- 正文 -->
  <article class="container mx-auto px-4 py-10 md:py-14 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-8">

      <!-- 文章信息 -->
      <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-6">
        <span class="inline-flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
          <i class="fa-regular fa-calendar"></i> 2025-02-06
        </span>
        <span class="inline-flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
          <i class="fa-solid fa-location-dot"></i> 湖北·鄂州
        </span>
        <span class="inline-flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full">
          <i class="fa-solid fa-tag"></i> 公司新闻
        </span>
      </div>

      <!-- 导语 -->
      <p class="text-lg leading-8 text-gray-800 mb-6">
        新岁新气象，鄂重建设举行新年开业典礼。活动现场醒狮点睛、锣鼓喧天，歌舞表演气氛热烈，
        来宾致辞为新一年目标鼓劲加油，员工与合作伙伴合影同贺，共启高质量发展的新征程。
      </p>

      <!-- 图集：主画面轮播 + 缩略图联动（适合 20 张） -->
      <div class="rounded-xl overflow-hidden mb-8">
        <div class="relative">
          <!-- 主画面 -->
          <div class="swiper ceremony-main aspect-[16/9] rounded-xl overflow-hidden">
            <div class="swiper-wrapper">
              <?php
              // 生成 1~20 的图片项，按需可减少
              for ($i = 1; $i <= 20; $i++): ?>
                <div class="swiper-slide">
                  <img src="https://static.ezhong.co/assets/images/news/新年开业-<?= $i ?>.jpg"
                       alt="鄂重建设新年开业仪式现场 <?= $i ?>"
                       class="w-full h-full object-cover">
                </div>
              <?php endfor; ?>
            </div>
            <!-- 左右箭头 -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- 分页圆点（可点） -->
            <div class="swiper-pagination"></div>
          </div>

          <!-- 缩略图走马灯 -->
          <div class="swiper ceremony-thumbs mt-3">
            <div class="swiper-wrapper">
              <?php for ($i = 1; $i <= 20; $i++): ?>
                <div class="swiper-slide">
                  <img src="https://static.ezhong.co/assets/images/news/新年开业-<?= $i ?>.jpg"
                       alt="缩略图 <?= $i ?>"
                       class="h-20 w-full object-cover rounded">
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- 内容分节 -->
      <div class="prose prose-gray max-w-none leading-7">
        <h2>精彩环节回顾</h2>
        <ul>
          <li><strong>醒狮点睛：</strong>寓意新年鸿运当头、事业蒸蒸日上。</li>
          <li><strong>歌舞助兴：</strong>多支节目轮番上阵，烘托欢庆氛围。</li>
          <li><strong>嘉宾致辞：</strong>总结上一年成绩，部署新年目标。</li>
          <li><strong>集体合影：</strong>记录与合作伙伴、团队成员的高光时刻。</li>
        </ul>

        <h3>公司寄语</h3>
        <p>
          新的一年，鄂重建设将继续坚持“质量为本、创新为先、服务至上”的理念，
          以更加稳健的步伐推进项目建设与产品升级，为客户创造更大价值。
        </p>
      </div>

      <!-- 版权/声明 -->
      <div class="mt-10 p-5 bg-gray-50 rounded-xl text-gray-600 text-sm">
        <p>编辑发布：湖北鄂重建设工程有限公司</p>
        <p>版权声明：本文图文仅用于公司新闻传播，未经许可请勿转载。</p>
      </div>

      <!-- 返回按钮 -->
      <div class="mt-8">
        <a href="/?p=news" class="inline-flex items-center gap-2 text-primary hover:text-secondary">
          <i class="fa-solid fa-arrow-left"></i> 返回新闻列表
        </a>
      </div>
    </div>

    <!-- 侧栏 -->
    <aside class="lg:col-span-4">
      <div class="rounded-xl border border-gray-200 p-6 sticky top-24">
        <h4 class="font-bold text-gray-900 mb-3">浏览提示</h4>
        <ul class="space-y-2 text-gray-700 text-sm leading-6">
          <li>支持点击下方缩略图快速定位到对应大图。</li>
          <li>左右箭头或拖拽切换，自动播放可随时手动干预。</li>
        </ul>
      </div>
    </aside>
  </article>
</section>

<!-- 页面专用：初始化两个 Swiper（主画面 + 缩略图 联动） -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // 缩略图
    var thumbsSwiper = new Swiper('.ceremony-thumbs', {
      slidesPerView: 6,
      spaceBetween: 8,
      freeMode: true,
      watchSlidesProgress: true,
      breakpoints: {
        640:  { slidesPerView: 7, spaceBetween: 8  },
        768:  { slidesPerView: 8, spaceBetween: 10 },
        1024: { slidesPerView: 10, spaceBetween: 12 }
      }
    });

    // 主画面
    var mainSwiper = new Swiper('.ceremony-main', {
      loop: true,
      speed: 550,
      effect: 'slide',
      grabCursor: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      pagination: { el: '.ceremony-main .swiper-pagination', clickable: true },
      navigation: {
        nextEl: '.ceremony-main .swiper-button-next',
        prevEl: '.ceremony-main .swiper-button-prev'
      },
      thumbs: { swiper: thumbsSwiper }
    });
  });
</script>
