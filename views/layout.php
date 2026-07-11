<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title><?= e($title ?? '湖北鄂重建设工程有限公司 - 专业压力钢管制造与安装') ?></title>
  <meta name="description" content="<?= e($description ?? '湖北鄂重建设工程有限公司，专业压力钢管制造与安装。') ?>">
    <!--向上箭头-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <!-- 字体与样式 -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300;400;500;700&display=swap');
    body{ font-family:'Noto Sans SC',sans-serif; scroll-behavior:smooth; overflow-x:hidden; }
    .container{ max-width:100%; padding-left:1rem; padding-right:1rem; }
    @media (min-width:1280px){ .container{ max-width:1280px; } }
    .section-title{ position:relative; padding-bottom:1rem; }
    .section-title:after{ content:''; position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:80px; height:4px; background:#e11d48; }
    .project-card{ transition:all .3s ease; box-shadow:0 4px 6px rgba(0,0,0,.1); }
    .project-card:hover{ transform:translateY(-5px); box-shadow:0 10px 20px rgba(0,0,0,.15); }
    .equipment-card{ border-radius:10px; overflow:hidden; transition:all .3s ease; }
    .equipment-card:hover{ transform:scale(1.03); }
    .contact-info-card{ background:linear-gradient(135deg,#0a4c8c,#0d9488); color:#fff; border-radius:12px; }
    .nav-link{ position:relative; padding:.5rem 0; }
    .nav-link:after{ content:''; position:absolute; bottom:0; left:0; width:0; height:2px; background:#e11d48; transition:width .3s ease; }
    .nav-link:hover:after,.active-link:after{ width:100%; }
    .sticky-nav{ position:fixed; top:0; width:100%; z-index:1000; box-shadow:0 2px 15px rgba(0,0,0,.1); animation:slideDown .4s ease; }
    @keyframes slideDown{ from{ transform:translateY(-100%);} to{ transform:translateY(0);} }
    /* 背景视频用： */
    #hero-player-wrap{ position:absolute; inset:0; z-index:0; }
    /* 仅隐藏“首页横幅”那只播放器的控件和大播放键 */
    #hero-player .prism-controlbar,
    #hero-player .prism-play-btn { display:none !important; }
    
    #hero-player video{ object-fit:cover !important; width:100% !important; height:100% !important; }
    #hero-player{ background:transparent !important; }
    /*#hero-player, #hero-player-wrap{ background:transparent !important; }*/
    /* 让挂载点和内部层都占满父容器 */
    #hero-player-wrap{ position:absolute; inset:0; z-index:0; }
    #hero-player,
    #hero-player .prism-player,
    #hero-player .prism-video,
    #hero-player video{ object-fit:cover!important; width:100%!important; height:100%!important; }
    #hero-player-wrap{ position:absolute; inset:0; }
    
    /* —— 让导航箭头永远在最上层，可点击 —— */
    .prod-main, .proj-main { position: relative; }
    .prod-main .swiper-button-prev,
    .prod-main .swiper-button-next,
    .proj-main .swiper-button-prev,
    .proj-main .swiper-button-next {
      z-index: 50;          /* 默认是 10，容易被大图<a>覆盖 */
      pointer-events: auto; /* 确保能接管点击 */
    }
    
    /* —— 缩略图给固定宽度，避免 slidesPerView:'auto' 计算为 0 —— */
    .prod-thumbs .swiper-slide,
    .proj-thumbs .swiper-slide {
      width: 7rem !important;     /* 约 112px，可按需改 6.5~8rem */
    }
    .prod-thumbs .swiper-slide img,
    .proj-thumbs .swiper-slide img {
      width: 100%; height: 100%; object-fit: cover;
    }

  </style>

  <!-- Tailwind（CDN 用法：先引入脚本，然后可用 tailwind.config 自定义） -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { theme:{ extend:{ colors:{ primary:'#0a4c8c', secondary:'#e11d48', accent:'#0d9488' }}}}
  </script>
  <!-- 官方文档示例就是把脚本放在 <head>，并可用上面的方式定制。 -->

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://static.ezhong.co/assets/vendor/swiper/swiper-bundle.min.css">

  <!-- 阿里云 Web 播放器（CSS/JS） -->
  <link rel="stylesheet" href="https://g.alicdn.com/apsara-media-box/imp-web-player/2.25.1/skins/default/aliplayer-min.css">
  <script src="https://g.alicdn.com/apsara-media-box/imp-web-player/2.25.1/aliplayer-min.js"></script>
  <!-- 官方“快速接入 Web 播放器”明确要求把这两个资源引到页面里。:contentReference[oaicite:1]{index=1} -->
</head>
<body>

  <?php include __DIR__.'/header.php'; ?>

  <main><?php include $content_view; ?></main>

  <?php include __DIR__.'/footer.php'; ?>

  <!-- 全站底部脚本 -->
    <script src="https://static.ezhong.co/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.equipment-swiper, .project-swiper').forEach(function (el) {
        const pager = el.querySelector('.swiper-pagination');
        new Swiper(el, {
          loop: true,
          autoplay: { delay: 3000, disableOnInteraction: false },
          pagination: pager ? { el: pager, clickable: true } : undefined
          // 如需箭头：在 HTML 里加 .swiper-button-next/.swiper-button-prev 再开启 navigation
          // navigation: { nextEl: el.querySelector('.swiper-button-next'), prevEl: el.querySelector('.swiper-button-prev') }
        });
      });
    });
    </script>
</body>
</html>
