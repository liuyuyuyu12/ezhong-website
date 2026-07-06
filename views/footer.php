  <!-- 页脚 -->
  <footer class="bg-gray-900 text-white py-6">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-12">
        <div>
          <h3 class="text-xl font-bold mb-4">湖北鄂重建设工程有限公司</h3>
          <p class="text-gray-400">专业从事新能源行业风电塔筒、水电压力钢管、风能蓄能等高强度钢结构的设计、制造和安装服务。</p>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">快速链接</h4>
          <ul class="space-y-2">
            <li><a href="/?p=home#home" class="text-gray-400 hover:text-white transition">网站首页</a></li>
            <li><a href="/?p=about" class="text-gray-400 hover:text-white transition">关于我们</a></li>
            <li><a href="/?p=home#products" class="text-gray-400 hover:text-white transition">产品中心</a></li>
            <li><a href="/?p=home#projects" class="text-gray-400 hover:text-white transition">案例展示</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">更多</h4>
          <ul class="space-y-2">
            <li><a href="/?p=home#news" class="text-gray-400 hover:text-white transition">新闻动态</a></li>
            <li><a href="/?p=home#factory" class="text-gray-400 hover:text-white transition">厂区展示</a></li>
            <li><a href="/?p=home#contact" class="text-gray-400 hover:text-white transition">联系我们</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">关注我们</h4>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition"><i class="fa-brands fa-weixin"></i></a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition"><i class="fa-brands fa-youtube"></i></a>
          </div>
          <p class="mt-6 text-gray-400">
            <i class="fa-solid fa-phone mr-2"></i>13972950821<br/>
            <i class="fa-solid fa-location-dot mr-2 mt-2"></i>湖北省鄂州市四海大道特一号
          </p>
        </div>
      </div>

      <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
        <p>© 2023 湖北鄂重建设工程有限公司 版权所有</p>
        <p class="mt-2">鄂ICP备2025094869号-2</p>
      </div>
    </div>
  </footer>

  <!-- 返回顶部按钮 -->
  <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-primary text-white shadow-lg hidden" aria-label="返回顶部">
    <i class="fas fa-arrow-up"></i>
  </button>


  <script>
  (function () {
    // 等 DOM 就绪再执行，避免找不到元素
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
    } else {
      init();
    }

    function init() {
      // ====== 移动端菜单切换 ======
      const menuBtn = document.getElementById('mobile-menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
          mobileMenu.classList.toggle('hidden');
        });
      }

      // ====== 导航栏固定 + 返回顶部（带 rAF 节流） ======
      const navbar = document.getElementById('navbar');
      const backToTopBtn = document.getElementById('back-to-top');
      let ticking = false;
      window.addEventListener('scroll', function () {
        if (!ticking) {
          window.requestAnimationFrame(function () {
            const y = window.scrollY || document.documentElement.scrollTop;
            if (navbar) navbar.classList.toggle('sticky-nav', y > 100);
            if (backToTopBtn) backToTopBtn.classList.toggle('hidden', y <= 100);
            ticking = false;
          });
          ticking = true;
        }
      });

      if (backToTopBtn) {
        backToTopBtn.addEventListener('click', function () {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }

      // ====== 同页平滑滚动（只处理 # 开头的站内锚点） ======
      document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
          const id = this.getAttribute('href');
          const target = id && document.querySelector(id);
          if (!target) return;
          e.preventDefault();
          if (mobileMenu && !mobileMenu.classList.contains('hidden')) mobileMenu.classList.add('hidden');
          // 预留导航高度（按你导航高度微调 -80）
          const top = target.getBoundingClientRect().top + window.scrollY - 80;
          window.scrollTo({ top, behavior: 'smooth' });
        });
      });

    //   // ====== 全站通用 Swiper（产品/案例卡片） ======
    //   document.querySelectorAll('.equipment-swiper, .project-swiper').forEach(function (el) {
    //     const paginationEl = el.querySelector('.swiper-pagination');
    //     new Swiper(el, {
    //       loop: true,
    //       autoplay: { delay: 3000, disableOnInteraction: false },
    //       pagination: paginationEl ? { el: paginationEl, clickable: true } : undefined
    //       // 若需要箭头：HTML 里放 .swiper-button-next/.swiper-button-prev，然后取消下面注释
    //       // navigation: {
    //       //   nextEl: el.querySelector('.swiper-button-next'),
    //       //   prevEl: el.querySelector('.swiper-button-prev')
    //       // }
    //     });
    //   });

      // ====== 首页背景视频：仅当存在容器且 SDK 已加载时初始化 ======
    //   try {
    //     const hero = document.getElementById('hero-player');
    //     if (hero && typeof Aliplayer !== 'undefined') {
    //       const player = new Aliplayer({
    //         id: 'hero-player',
    //         source: 'https://outin-8b0b365881a511f0ba1b00163e1c7426.oss-cn-shanghai.aliyuncs.com/b04108cd81a671f080716733a78e0102/07098a15ae7f4c65b372e3695390ce1a-9104a3e497f82845eb7753b020cb3761-ld.m3u8?Expires=1756191273&OSSAccessKeyId=LTAI8bKSZ6dKjf44&Signature=8QetDEEjNqA6sQC5pLc%2BE1aCTg8%3D&x-oss-process=hls%2Fsign',
    //         autoplay: true,
    //         muted: true,
    //         isLive: false,
    //         useH5Prism: true,
    //         controlBarVisibility: 'never',
    //         skinLayout: false,
    //         width: '100%',
    //         height: '100%',
    //         cover: '/assets/images/鄂重航拍图片_压缩.png'
    //       }, function(){ try{ player.mute(); player.play(); }catch(e){} });

    //       // 循环 & 简单重试
    //       player.on && player.on('ended', () => { try{ player.play(); }catch(e){} });
    //       player.on && player.on('error', () => { setTimeout(() => { try{ player.reload && player.reload(); }catch(e){} }, 1500); });
    //     }
    //   } catch (err) { /* 忽略播放器初始化失败 */ }

      // ====== 首页导航高亮（仅在 p=home 时启用） ======
      const params = new URLSearchParams(location.search);
      const isHome = (params.get('p') || 'home') === 'home';
      if (isHome) {
        const ids = ['home','about','products','projects','news','factory','contact'];
        function setActiveBySection(id) {
          document.querySelectorAll('.nav-link').forEach(a => a.classList.remove('active-link'));
          const link = document.querySelector('.nav-link[href="/?p=home#' + id + '"]') ||
                       document.querySelector('.nav-link[data-section="'+ id +'"]');
          if (link) link.classList.add('active-link');
        }
        // 初始高亮（根据 hash）
        setActiveBySection((location.hash || '#home').slice(1));
        // 点击导航时即时高亮
        document.querySelectorAll('a.nav-link[href^="/?p=home#"]').forEach(a => {
          a.addEventListener('click', function () {
            const id = this.getAttribute('href').split('#')[1];
            if (id) setActiveBySection(id);
          });
        });
          // 滚动联动（把阈值调到 0.35，并按导航高度做上边距补偿）
          if ('IntersectionObserver' in window) {
            const navbar = document.getElementById('navbar');
            const navH = navbar ? navbar.offsetHeight : 80;
            const io = new IntersectionObserver(entries => {
              entries.forEach(entry => entry.isIntersecting && setActiveBySection(entry.target.id));
            }, {
              threshold: 0.35,
              rootMargin: `-${navH}px 0px 0px 0px` // 提前触发，避免被吸顶导航遮挡
            });
        
            ids.forEach(id => {
              const el = document.getElementById(id);
              if (el) io.observe(el);
            });
          }
        }
    }
  })();
  </script>
  
  <!-- 交互脚本（可放这里或 footer.php 末尾） -->
<script>
  (function () {
    const dlg = document.getElementById('wechat-dialog');
    const openBtn = document.getElementById('open-wechat-modal');
    const copyBtn = document.getElementById('copy-remark');

    // 打开弹窗（左侧“查看二维码”按钮）
    if (openBtn && dlg) {
      openBtn.addEventListener('click', () => dlg.showModal());
    }

    // 点击 <dialog> 背景处关闭（仅点击到 backdrop 时）
    if (dlg) {
      dlg.addEventListener('click', (e) => {
        const rect = dlg.getBoundingClientRect();
        const isInDialog =
          e.clientX >= rect.left && e.clientX <= rect.right &&
          e.clientY >= rect.top && e.clientY <= rect.bottom;
        if (!isInDialog) dlg.close();
      });

      // Esc 关闭由浏览器原生处理（HTMLDialogElement cancel 事件）
    }

    // 复制备注
    if (copyBtn) {
      copyBtn.addEventListener('click', async () => {
        try {
          await navigator.clipboard.writeText('工程咨询');
          copyBtn.innerHTML = '<i class="fas fa-check"></i> 已复制';
          setTimeout(() => copyBtn.innerHTML = '<i class="fas fa-copy"></i> 复制备注信息', 1600);
        } catch (e) {
          alert('复制失败，请手动输入“工程咨询”。');
        }
      });
    }
  })();
</script>
