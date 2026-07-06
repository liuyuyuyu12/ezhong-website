<?php
// /views/project.php
$projects = require __DIR__ . '/data/projects.php';
if (!$slug || !isset($projects[$slug])) {
  include __DIR__ . '/404.php';
  return;
}
$proj  = $projects[$slug];
$title = $proj['name'] . ' - 湖北鄂重建设工程有限公司';
?>
<section class="bg-white">
  <!-- 顶部横幅 -->
  <div class="relative h-44 md:h-56 w-full overflow-hidden">
    <img src="<?= htmlspecialchars($proj['cover']) ?>" alt="<?= htmlspecialchars($proj['name']) ?>"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/35"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="container mx-auto px-4">
        <nav class="text-white/80 text-sm mb-2" aria-label="Breadcrumb">
          <a href="/?p=home" class="hover:text-white">首页</a>
          <span class="mx-2">/</span>
          <a href="/?p=home#projects" class="hover:text-white">案例展示</a>
          <span class="mx-2">/</span>
          <span class="text-white" aria-current="page"><?= htmlspecialchars($proj['name']) ?></span>
        </nav>
        <h1 class="text-2xl md:text-4xl font-extrabold text-white"><?= htmlspecialchars($proj['name']) ?></h1>
        <p class="mt-3 text-white/90"><?= htmlspecialchars($proj['summary']) ?></p>
      </div>
    </div>
  </div>

  <article class="container mx-auto px-4 py-10 md:py-14 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-8">
      <!-- 图集：主画面 + 缩略图（保持原图比例预览 + 可全屏查看） -->
      <div class="rounded-xl overflow-hidden mb-6">
        <div class="swiper proj-main rounded-xl overflow-hidden">
          <div class="swiper-wrapper">
            <?php foreach ($proj['images'] as $idx => $src): ?>
              <div class="swiper-slide">
                <a href="<?= htmlspecialchars($src) ?>" class="glightbox" data-gallery="proj">
                  <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($proj['name']) ?> 图<?= $idx+1 ?>"
                       class="block max-w-full h-auto mx-auto">
                </a>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="swiper proj-thumbs mt-3">
          <div class="swiper-wrapper">
            <?php foreach ($proj['images'] as $src): ?>
              <div class="swiper-slide">
                <img src="<?= htmlspecialchars($src) ?>" alt="thumb"
                     class="h-20 w-full object-cover rounded">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- 介绍 -->
      <div class="prose prose-gray max-w-none leading-7">
        <h2>项目介绍</h2>
        <p><?= htmlspecialchars($proj['summary']) ?></p>

        <h3>服务与能力</h3>
        <ul>
          <li>高强度钢结构的设计、制造与安装组织能力。</li>
          <li>可视化图集与灯箱预览，便于查看高清细节。</li>
        </ul>
      </div>
    </div>

    <!-- 侧栏 -->
    <aside class="lg:col-span-4">
      <div class="rounded-xl border border-gray-200 p-6 sticky top-24">
        <h4 class="font-bold text-gray-900 mb-3">联系与咨询</h4>
        <p class="text-gray-700 text-sm">如需了解该项目更多技术细节与交付能力，请与我们联系。</p>
        <a href="/?p=home#contact" class="mt-4 inline-flex items-center gap-2 text-primary hover:text-secondary">
          <i class="fa-solid fa-paper-plane"></i> 获取更多资料
        </a>
      </div>
    </aside>
  </article>
</section>

<!-- JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CreativeWork",
  "name": <?= json_encode($proj['name'], JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($proj['images'], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($proj['summary'], JSON_UNESCAPED_UNICODE) ?>
}
</script>

<!-- 仅在项目页初始化轮播/灯箱 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var thumbs = new Swiper('.proj-thumbs', {
    freeMode: true,
    watchSlidesProgress: true,
    slidesPerView: 'auto',
    spaceBetween: 8,
    slideToClickedSlide: true,
    observer: true, observeParents: true
  });

  new Swiper('.proj-main', {
    loop:true, speed:550, effect:'slide', grabCursor:true,
    autoplay:{ delay: 3500, disableOnInteraction:false },
    pagination:{ el: '.proj-main .swiper-pagination', clickable: true },
    navigation:{
      nextEl: '.proj-main .swiper-button-next',
      prevEl: '.proj-main .swiper-button-prev'
    },
    thumbs: { swiper: thumbs }
  });
});
</script>


<style>
/* 详情页主画面允许图片按原始比例展示（不强行裁切） */
.proj-main .swiper-slide img { max-width: 100%; height: auto; object-fit: contain; }
</style>
