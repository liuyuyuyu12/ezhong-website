<!-- 首页 Banner：使用阿里云 Web 播放器（方案 A） -->
  <section id="home" class="relative h-screen max-h-[800px] overflow-hidden">
     
    <div id="hero-player-wrap">
      <div id="hero-player" class="prism-player w-full h-full"></div>
    </div>
    <!--<div class="container mx-auto px-4">-->
        <!-- 16:9 容器（任选其一） -->
    <!--    <div class="relative w-full aspect-[16/9] bg-black rounded-xl">   <!-- Tailwind 支持时用这行 -->-->
        <!-- <div class="relative w-full h-0 pb-[56.25%] bg-black rounded-xl"> --> <!-- 或者用 padding 百分比 -->
    <!--    <div id="hero-player" class="absolute inset-0"></div>-->
    
    
    <!-- 半透明遮罩 + 文案（在上层） -->
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

    <!-- 放在上面那个首页 Banner </section> 的正后方 -->
    <script>
    document.addEventListener('DOMContentLoaded', async function () {
      const VIDEO_ID = '60ba13df955b71f0bfe16733a68f0102';
      const MAX_LOOPS = 3;
    
      // 先给容器加一个“隐藏控制条”的类，等播完6次再撤掉
      const wrap = document.getElementById('hero-player');
      wrap.classList.add('hide-controls');
    
      // 取一次播放凭证（你后端 /api/vod_playauth.php 已经OK）
      async function getPlayAuth() {
        const r = await fetch(`/api/vod_playauth.php?videoId=${encodeURIComponent(VIDEO_ID)}`);
        return r.json();
      }
      const first = await getPlayAuth();
      if (!first.playAuth) { console.error('get playAuth failed:', first); return; }
    
      // 初始化播放器
        const player = new Aliplayer({
          id: 'hero-player',
          width: '100%',          // ← 加上
          height: '100%',         // ← 加上
          autoplay: true,
          muted: true,
          isLive: false,
          useH5Prism: true,
          vid: VIDEO_ID,
          playauth: first.playAuth,
          controlBarVisibility: 'hover',
          skinLayout: false,
        // 👇 关键修改：自动获取阿里云视频自带的第一帧/封面图，并强制使用 https
          cover: (first.meta?.cover || '').replace(/^http:/, 'https:')
        }, function (p) { try { p.mute(); p.play(); } catch (e) {} });
    
      window.__ali = player; // 便于排错
    
      let loops = 0;
      async function replayOnce() {
        try {
          // 大多数场景下，直接 replay() 或 seek(0)+play() 就能再播一次
          if (typeof player.replay === 'function') {
            player.replay();
          } else {
            player.seek(0);
            player.play();
          }
        } catch (e) {
          // 如果凭证过期（默认100秒，你已在后端把 authInfoTimeout 配到900秒），
          // 就重取 playAuth，再用官方提供的 replayByVidAndPlayAuth 复播
          try {
            const fresh = await getPlayAuth();
            if (fresh.playAuth && typeof player.replayByVidAndPlayAuth === 'function') {
              player.replayByVidAndPlayAuth(VIDEO_ID, fresh.playAuth);
            } else {
              console.error('replay fallback failed:', fresh);
            }
          } catch (ee) {
            console.error('replay error:', ee);
          }
        }
      }
    
      // 监听“播放结束”事件
      // 官方文档：使用 vid+playAuth 时，结束后如需复播可用 replayByVidAndPlayAuth；事件名为 ended。:contentReference[oaicite:1]{index=1}
      player.on('ended', async function () {
        loops++;
        if (loops < MAX_LOOPS) {
          await replayOnce();
        } else {
          // 满6次：停在“结束”状态，露出控制栏，用户可点击控制栏的播放键继续看
          player.pause();
          wrap.classList.remove('hide-controls'); // 显示控制条/播放键
          // 如果你希望此时控制条一直显示，可取消注释下一行（也可以保持 hover）：
          // player && player.setPlayerVars && player.setPlayerVars({ controlBarVisibility: 'always' });
        }
      });
    
      // 可选：记录/排错
      player.on('error', function (e) { console.error('AliPlayer error', e); });
    });
    </script>


  <!-- 关于我们 -->
  <section id="about" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">关于我们</h2>
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">湖北鄂重建设工程有限公司是湖北宏重重型机械有限公司的全资公司，专业从事新能源行业风电塔筒、水电压力钢管等钢结构的设计、制造和安装服务</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
        <img
          src="https://static.ezhong.co/assets/images/鄂重航拍图片_压缩.png?x-oss-process=image/format,webp/interlace,1"
          alt="公司厂区与设备"
          class="w-full h-96 object-cover rounded-xl"
        />
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

    <!-- 智慧型压力钢管加工系统视频 -->
    <div class="mt-20">
      <div class="text-center mb-10">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-800">智慧型压力钢管加工系统</h3>
        <p class="mt-2 text-gray-600">创新工艺引领行业变革</p>
      </div>
    
      <div class="max-w-4xl mx-auto">
        <!-- 4:3 容器 -->
        <div class="relative pb-[75%] h-0 overflow-hidden rounded-xl bg-black">
          <!-- ✅ 只保留 id，别加 prism-player -->
          <div id="process-player" class="absolute inset-0"></div>
        </div>
      </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', async () => {
      const PROCESS_VIDEO_ID = '709b9295848771f0bfdf4531959c0102';
    
      const res  = await fetch(`/api/vod_playauth.php?videoId=${encodeURIComponent(PROCESS_VIDEO_ID)}`);
      const data = await res.json();
      if (!data.playAuth) { console.error('get playAuth failed:', data); return; }
    
      const processPlayer = new Aliplayer({
        id: 'process-player',
    
        // ✅ 关键：让播放器吃满挂载容器
        width:  '100%',
        height: '100%',
        autoSize: 'height',   // 或 'width'，按需要选择其一（默认等同 'height'）:contentReference[oaicite:3]{index=3}
    
        isLive: false,
        autoplay: false,      // 只在点击中心播放键后播放
        useH5Prism: true,
        controlBarVisibility: 'hover',  // 悬停显示控制条（静音、进度条等）:contentReference[oaicite:4]{index=4}
    
        // 封面：仅在 autoplay=false 时生效；把 http→https 防混合内容
        cover: (data.meta?.cover || '').replace(/^http:/, 'https:'),  // :contentReference[oaicite:5]{index=5}
    
        // Vid + PlayAuth 播放
        vid: PROCESS_VIDEO_ID,
        playauth: data.playAuth
      }, function(p) {
        // ready...
      });
    
      // 点击视频区域切换 播放/暂停（点到控制条不拦截）
      let playing = false;
      processPlayer.on('play',  () => playing = true);
      processPlayer.on('pause', () => playing = false);
      processPlayer.on('ended', () => playing = false);
    
      document.getElementById('process-player').addEventListener('click', (ev) => {
        if (ev.target?.closest?.('.prism-controlbar')) return;
        try { playing ? processPlayer.pause() : processPlayer.play(); } catch {}
      });
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
    
          <!-- 1 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
            <a href="/?p=product&slug=hzw11s-180x3200" class="absolute inset-0 z-10" aria-label="查看产品详情：HZW11S-180×3200"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-180×3200 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-2.jpg?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-180×3200 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-3.jpg?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-180×3200 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-4.jpg?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-180×3200 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">HZW11S-180×3200 全液压微控变中心距三辊卷板机</h3>
              <p class="text-gray-600 mb-4">中国葛洲坝集团二公司罗田平坦原抽水蓄能电站项目</p>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>中国葛洲坝集团第二工程有限公司</li>
                <li><span class="font-medium">施工内容：</span>800MPa压力管道</li>
              </ul>
            </div>
          </div>
    
          <!-- 2 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
             <a href="/?p=product&slug=y32-50000kn" class="absolute inset-0 z-10" aria-label="查看产品详情：Y32-50000KN"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机.jpg?x-oss-process=image/format,webp/interlace,1" alt="Y32-50000KN 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机-2.jpg?x-oss-process=image/format,webp/interlace,1" alt="Y32-50000KN 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机-3.jpg?x-oss-process=image/format,webp/interlace,1" alt="Y32-50000KN 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">Y32-50000KN钢板板头预弯油压机</h3>
              <p class="text-gray-600 mb-4">中国葛洲坝集团二公司张掖抽水蓄能电站项目</p>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>中国葛洲坝集团第二工程有限公司</li>
                <li><span class="font-medium">施工内容：</span>800MPa压力管道</li>
              </ul>
            </div>
          </div>
    
          <!-- 3 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
           <a href="/?p=product&slug=w11-50x2500" class="absolute inset-0 z-10" aria-label="查看产品详情：W11-50x2500"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11-50×2500 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机-2.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11-50×2500 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机-3.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11-50×2500 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">W11-50×2500对称式三辊卷板机</h3>
              <p class="text-gray-600 mb-4">菲律宾良安水电站压力钢管项目</p>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>中铁二十一局集团有限公司</li>
                <li><span class="font-medium">施工内容：</span>水电站项目主体(800MPa压力管道)</li>
              </ul>
            </div>
          </div>
    
          <!-- 4 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
             <a href="/?p=product&slug=w11s-200x4500" class="absolute inset-0 z-10" aria-label="查看产品详情：W11s-200x4500"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11S-200×4500 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1" alt="W11S-200×4500 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1" alt="W11S-200×4500 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-4.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11S-200×4500 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">W11S-200×4500微控液压水平下调式三辊卷板机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>湘潭永达机械制造股份有限公司</li>
                <li><span class="font-medium">施工内容：</span>风力发电大直径钢管制作</li>
              </ul>
            </div>
          </div>
    
          <!-- 5 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
           <a href="/?p=product&slug=w11-25x4300" class="absolute inset-0 z-10" aria-label="查看产品详情：W11-25x4300"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">W11-25X4300mm智能型三辊卷板机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>重庆美的通用制冷设备有限公司</li>
                <li><span class="font-medium">施工内容：</span>大型中央空调风管</li>
              </ul>
            </div>
          </div>
          
          
          <!-- 6 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
             <a href="/?p=product&slug=xw11s-270x4000" class="absolute inset-0 z-10" aria-label="查看产品详情：XW11s-270x4000"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1" alt="XW11S-270×4000 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1" alt="XW11S-270×4000 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1" alt="XW11S-270×4000 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-4.png?x-oss-process=image/format,webp/interlace,1" alt="XW11S-270×4000 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">XW11S-270×4000水平下调式三辊卷板机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>张家港锦隆化工机械有限公司</li>
                <li><span class="font-medium">施工内容：</span>高强度钢板（压力容器）制作</li>
              </ul>
            </div>
          </div>
    
          <!-- 7 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
           <a href="/?p=product&slug=w11s-series-upper-driven" class="absolute inset-0 z-10" aria-label="查看产品详情：W11s-series"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[4/3.8]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机.png?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1" alt="W11S 系列 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">W11S 系列上缸机械驱动三辊卷板机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>南京宝色股份公司</li>
                <li><span class="font-medium">施工内容：</span>石油化工压力容器</li>
              </ul>
            </div>
          </div>
          
          <!-- 8 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
             <a href="/?p=product&slug=hzw11s-120x4200" class="absolute inset-0 z-10" aria-label="查看产品详情：HZW11s-120x4200"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[4/3.8]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-120×4200微控液压卧式下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-120×4200微控液压卧式下调式三辊卷板机 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/HZW11S-120×4200微控液压卧式下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1" alt="HZW11S-120×4200微控液压卧式下调式三辊卷板机 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">HZW11S-120×4200微控液压卧式下调式三辊卷板机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>江苏海恒风电设备制造有限公司</li>
                <li><span class="font-medium">施工内容：</span>海洋风力发电筒体制作</li>
              </ul>
            </div>
          </div>
    
          <!-- 9 -->
          <div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
           <a href="/?p=product&slug=hydraulic-press-oil" class="absolute inset-0 z-10" aria-label="查看产品详情：油压机"></a>
            <div class="swiper equipment-swiper relative w-full aspect-[4/3.8]">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/油压机.png?x-oss-process=image/format,webp/interlace,1" alt="油压机 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/油压机-2.png?x-oss-process=image/format,webp/interlace,1" alt="油压机 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/油压机-3.png?x-oss-process=image/format,webp/interlace,1" alt="油压机 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
                <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/products/油压机-4.png?x-oss-process=image/format,webp/interlace,1" alt="油压机 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-6 flex-1">
              <h3 class="text-xl font-bold text-gray-800 mb-2">油压机</h3>
              <ul class="text-gray-700 space-y-1">
                <li><span class="font-medium">业主单位：</span>江苏沪宁钢机股份有限公司</li>
                <li><span class="font-medium">施工内容：</span>钢结构</li>
              </ul>
            </div>
          </div>
    
    
        </div>
      </div>
    </section>


  <!-- 案例展示 -->
  <section id="projects" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 section-title">案例展示</h2>
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">我们承建了众多优质工程项目，获得业界一致好评</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="project-card bg-white rounded-xl overflow-hidden relative">
          <a href="/?p=project&slug=pingtanyuan" class="absolute inset-0 z-10" aria-label="查看案例详情：平坦原抽蓄"></a>
          <!-- 轮播：替换原来的灰色块 -->
          <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能.png?x-oss-process=image/format,webp/interlace,1" alt="中国葛洲坝集团二公司罗田平坦原抽水蓄能 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-2.png?x-oss-process=image/format,webp/interlace,1" alt="中国葛洲坝集团二公司罗田平坦原抽水蓄能 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-3.png?x-oss-process=image/format,webp/interlace,1" alt="中国葛洲坝集团二公司罗田平坦原抽水蓄能 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-4.png?x-oss-process=image/format,webp/interlace,1" alt="中国葛洲坝集团二公司罗田平坦原抽水蓄能 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-5.png?x-oss-process=image/format,webp/interlace,1" alt="中国葛洲坝集团二公司罗田平坦原抽水蓄能 图5" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
              
            </div>
            <div class="swiper-pagination"></div>
          </div>
        
          <!-- 文本区保持不变 -->
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">中国葛洲坝集团二公司罗田平坦原抽水蓄能</h3>
            <p class="text-gray-600 mb-4">压力钢管制作及安装项目</p>
            <p class="text-gray-700">项目包括高强度压力钢管的设计、制造和安装，做好抽水蓄能的“血管”。</p>
          </div>
        </div>

        <div class="project-card bg-white rounded-xl overflow-hidden relative">
          <a href="/?p=project&slug=liangan" class="absolute inset-0 z-10" aria-label="查看案例详情：菲律宾良安水电站"></a>
          <!-- 轮播：替换原来的灰色块 -->
          <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-2.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-3.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-4.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-5.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图5" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-6.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图6" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-7.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图7" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-8.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图8" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-9.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图9" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-10.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图10" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-11.png?x-oss-process=image/format,webp/interlace,1" alt="菲律宾良安水电站 图11" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">菲律宾良安水电站</h3>
            <p class="text-gray-600 mb-4">压力钢管生产及安装项目</p>
            <p class="text-gray-700">项目包括全套压力钢管的设计、制造和安装，满足国际高标准要求。</p>
          </div>
        </div>

        <div class="project-card bg-white rounded-xl overflow-hidden relative">
          <a href="/?p=project&slug=panlong" class="absolute inset-0 z-10" aria-label="查看案例详情：重庆蟠龙水电站"></a>
          <!-- 轮播：替换原来的灰色块 -->
          <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/重庆蟠龙水电站.jpg?x-oss-process=image/format,webp/interlace,1" alt="重庆蟠龙水电站 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/重庆蟠龙水电站-2.jpg?x-oss-process=image/format,webp/interlace,1" alt="重庆蟠龙水电站 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">重庆蟠龙水电站</h3>
            <p class="text-gray-600 mb-4">岔管及部分钢管项目</p>
            <p class="text-gray-700">复杂地形条件下的岔管设计与制造，解决多项技术难题。</p>
          </div>
        </div>

        <div class="project-card bg-white rounded-xl overflow-hidden relative">
          <a href="/?p=project&slug=han10-bridge" class="absolute inset-0 z-10" aria-label="查看案例详情：汉十高铁钢管拱桥"></a>
          <!-- 轮播：替换原来的灰色块 -->
          <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-2.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-3.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-4.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-5.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图5" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-6.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图6" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-7.png?x-oss-process=image/format,webp/interlace,1" alt="汉十高铁钢管拱桥 图7" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">汉十高铁钢管拱桥</h3>
            <p class="text-gray-600 mb-4">大型钢结构桥梁项目</p>
            <p class="text-gray-700">高强度钢管拱桥的设计与施工，体现公司在大跨度结构上的技术实力。</p>
          </div>
        </div>
        
          <div class="project-card bg-white rounded-xl overflow-hidden relative">
          <a href="/?p=project&slug=pingtanyuan_chaguan" class="absolute inset-0 z-10" aria-label="查看案例详情：平坦原抽蓄岔管及月牙板制作现场"></a>
          <!-- 轮播：替换原来的灰色块 -->
          <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片.png?x-oss-process=image/format,webp/interlace,1" alt="罗田平坦原平坦原岔管及月牙板制作现场图片 图1" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-2.png?x-oss-process=image/format,webp/interlace,1" alt="罗田平坦原平坦原岔管及月牙板制作现场图片 图2" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-3.png?x-oss-process=image/format,webp/interlace,1" alt="罗田平坦原平坦原岔管及月牙板制作现场图 图3" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-4.png?x-oss-process=image/format,webp/interlace,1" alt="罗田平坦原平坦原岔管及月牙板制作现场图片 图4" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            <div class="swiper-slide"><img src="https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-5.png?x-oss-process=image/format,webp/interlace,1" alt="罗田平坦原平坦原岔管及月牙板制作现场图片 图5" class="w-full h-full object-cover" loading="lazy" decoding="async"></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        
          <!-- 文本区保持不变 -->
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">中国葛洲坝集团二公司罗田平坦原抽水蓄能岔管及月牙板制作现场</h3>
            <p class="text-gray-600 mb-4">岔管及月牙板制作及安装项目</p>
            <p class="text-gray-700">项目包括岔管及月牙板制作，精益求精，追求卓越。</p>
          </div>
        </div>
        
        
        
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
        
         <!-- 新闻动态（第二条，其它条同理改 href） -->
        <div class="border border-gray-200 rounded-xl overflow-hidden relative group">
          <!-- 让整张卡片可点击的“铺满层” -->
          <a href="/?p=news&slug=20241118-pingtanyuan-zhongbiao"
             class="absolute inset-0 z-10" aria-label="阅读更多：我司中标葛洲坝二公司金结项目"></a>
        
          <!-- 封面图（可用新闻配图缩略图替换灰块） -->
          <img src="https://static.ezhong.co/assets/images/news/中标通知书.jpg?x-oss-process=image/format,webp/interlace,1"
               alt="中标通知书封面" class="w-full h-50 object-cover">
        
          <div class="p-6 relative z-20">
            <div class="flex justify-between text-sm text-gray-500 mb-2">
              <span>2024-11-18</span><span>公司新闻</span>
            </div>
        
            <!-- 标题也加链接（可选，增强可用性） -->
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <a href="/?p=news_20241118平坦原中标"
                 class="hover:text-secondary transition">我司中标葛洲坝二公司金结项目</a>
            </h3>
        
            <p class="text-gray-700 line-clamp-2">
              我司收到中国葛洲坝集团第二工程有限公司发来的中标通知书，项目为罗田平坦原抽水蓄能电站金结工程……
            </p>
        
            <!-- 明显的“阅读更多”按钮 -->
            <a href="/?p=news_20241118平坦原中标"
               class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">
              阅读更多
            </a>
          </div>
        
          <!-- 小交互：悬停阴影（可选） -->
          <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
        </div>
        
        
        
        <!-- 新闻动态（第二条，其它条同理改 href） -->
        <div class="border border-gray-200 rounded-xl overflow-hidden relative group">
          <!-- 链接整卡片 -->
          <a href="/?p=news&slug=20250128-gezhouba-warmth"
             class="absolute inset-0 z-10" aria-label="阅读更多：葛洲坝集团临近春节送温暖到一线"></a>
        
          <!-- 封面图（替换为你的缩略图） -->
          <img src="https://static.ezhong.co/assets/images/news/春节送温暖-封面.jpg?x-oss-process=image/format,webp/interlace,1"
               alt="葛洲坝集团临近春节送温暖到一线" class="w-full h-50 object-cover">
        
          <div class="p-6 relative z-20">
            <div class="flex justify-between text-sm text-gray-500 mb-2">
              <span>2025-01-28</span><span>公司关怀</span>
            </div>
        
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <a href="/?p=news_葛洲坝临近春节送温暖"
                 class="hover:text-secondary transition">葛洲坝集团临近春节向一线送温暖</a>
            </h3>
        
            <p class="text-gray-700 line-clamp-2">
              春节将至，集团工会和项目部开展“送温暖到一线”活动，为一线员工送去慰问物资与祝福，保障寒冬施工生产安全有序……
            </p>
        
            <a href="/?p=news_葛洲坝临近春节送温暖"
               class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">阅读更多</a>
          </div>
        
          <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
        </div>
        

        <!-- 新闻动态（鄂重建设新年开业仪式） -->
        <div class="border border-gray-200 rounded-xl overflow-hidden relative group">
          <!-- 链接整卡可点 -->
          <a href="/?p=news&slug=20250206-ezhong-opening-ceremony"
             class="absolute inset-0 z-10" aria-label="阅读更多：鄂重建设新年开业仪式"></a>
        
          <!-- 封面图（请放一张封面到 /assets/images/news/新年开业-封面.jpg） -->
          <img src="https://static.ezhong.co/assets/images/news/新年开业-封面.jpg?x-oss-process=image/format,webp/interlace,1"
               alt="鄂重建设新年开业仪式" class="w-full h-50 object-cover">
        
          <div class="p-6 relative z-20">
            <div class="flex justify-between text-sm text-gray-500 mb-2">
              <span>2025-02-06</span><span>公司新闻</span>
            </div>
        
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <a href="/?p=news_鄂重建设新年开业仪式"
                 class="hover:text-secondary transition">鄂重建设新年开业仪式｜舞狮迎新、歌舞助兴、全员同贺</a>
            </h3>
        
            <p class="text-gray-700 line-clamp-2">
              新年启新程，鄂重建设举行开业典礼，舞狮点睛、文艺表演、集体合影精彩纷呈——现场直击 20 张高清图集。
            </p>
        
            <a href="/?p=news_鄂重建设新年开业仪式"
               class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">
              阅读更多
            </a>
          </div>
        
          <!-- 悬停高亮 -->
          <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
        </div>
        
        
        <!-- 新闻动态（第四条，其它条同理改 href） -->
        <div class="border border-gray-200 rounded-xl overflow-hidden relative group">
          <!-- 让整张卡片可点击的“铺满层” -->
          <a href="/?p=news&slug=20250825-fengxin-zhongbiao"
             class="absolute inset-0 z-10" aria-label="阅读更多：我司中标葛洲坝二公司金结项目"></a>
        
          <!-- 封面图（可用新闻配图缩略图替换灰块） -->
          <img src="https://static.ezhong.co/assets/images/news/江西奉新中标通知书1.jpg?x-oss-process=image/format,webp/interlace,1"
               alt="中标通知书封面" class="w-full h-50 object-cover">
        
          <div class="p-6 relative z-20">
            <div class="flex justify-between text-sm text-gray-500 mb-2">
              <span>2025-08-25</span><span>公司新闻</span>
            </div>
        
            <!-- 标题也加链接（可选，增强可用性） -->
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <a href="/?p=news_20250825奉新中标"
                 class="hover:text-secondary transition">我司中标葛洲坝二公司金结项目</a>
            </h3>
        
            <p class="text-gray-700 line-clamp-2">
              我司再次收到中国葛洲坝集团第二工程有限公司发来的中标通知书，项目为江西奉新抽水蓄能电站金结工程……
            </p>
        
            <!-- 明显的“阅读更多”按钮 -->
            <a href="/?p=news_20250825奉新中标"
               class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">
              阅读更多
            </a>
          </div>
        
          <!-- 小交互：悬停阴影（可选） -->
          <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
        </div>
        

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
        <!-- 横图作为横幅 -->
        <div class="rounded-xl overflow-hidden">
          <img src="https://static.ezhong.co/assets/images/factory/厂区图1.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区图1" 
               class="w-full h-auto object-cover" loading="lazy">
        </div>
        
        <!-- 其他图片网格布局 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- 大门图片 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂区图2.png?x-oss-process=image/format,webp/interlace,1" alt="厂区图2" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          
          <!-- 仰视图 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂区图3.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区图3" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          
          <!-- 留白或可添加说明文字 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂区图4.png?x-oss-process=image/format,webp/interlace,1" alt="厂区图4" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          
          
          <!-- 第一张内部图 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂房内部1.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区内部1" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          
          <!-- 第二张内部图 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂房内部2.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区内部2" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          
          <!-- 第三张内部图 -->
          <div class="rounded-xl overflow-hidden">
            <img src="https://static.ezhong.co/assets/images/factory/厂房内部3.jpg?x-oss-process=image/format,webp/interlace,1" alt="厂区内部3" 
                 class="w-full h-64 md:h-80 object-cover" loading="lazy">
          </div>
          

        </div>
      </div>
    </div>
  </section>

  <!-- 联系我们 -->
<!-- 联系我们（替换整块） -->
<section id="contact" class="py-16 bg-primary text-white">
  <div class="container mx-auto px-4">
    <div class="md:flex items-start justify-between gap-12">
      <!-- 左侧信息 -->
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

          <!-- 微信 + 打开二维码按钮 -->
          <div class="flex items-start">
            <i class="fab fa-weixin mr-4 text-xl mt-1"></i>
            <div>
              <div class="text-base opacity-80">微信</div>
              <div class="text-lg font-medium">微信同手机号</div>

              <!-- 触发按钮 -->
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

      <!-- 右侧表单 -->
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

  <!-- 微信二维码模态（原生 dialog，支持 Esc & 背景点击） -->
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
        />
        <div class="mt-4 text-center text-gray-700 text-sm">
          <p>请在添加好友备注：<span class="font-medium">“设备/工程咨询”</span></p>
        </div>

        <!-- 一键复制备注（可选） -->
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



