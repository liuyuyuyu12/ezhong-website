<?php
declare(strict_types=1);

/**
 * /views/project.php
 *
 * 功能：
 * - 根据 slug 显示案例详情
 * - slug 不存在时返回真实 404
 * - 兼容 projects.php 中的 slug/name/category/cover/summary/images 字段
 */

$projects = require __DIR__ . '/data/projects.php';

// index.php 通常会提前准备 $slug；这里兜底再读一次
$slug = $slug ?? ($_GET['slug'] ?? null);
$slug = is_string($slug) && $slug !== '' ? trim($slug) : null;

// 简单转义函数：如果以后有全局 e()，这里不会重复声明
if (!function_exists('e')) {
  function e(string|int|float|null $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
  }
}

if ($slug === null || !isset($projects[$slug])) {
  http_response_code(404);
  include __DIR__ . '/404.php';
  return;
}

$proj = $projects[$slug];

$projectSlug = $proj['slug'] ?? $slug;
$name = $proj['name'] ?? '';
$category = $proj['category'] ?? '';
$cover = $proj['cover'] ?? '';
$summary = $proj['summary'] ?? '';

$images = [];
if (!empty($proj['images']) && is_array($proj['images'])) {
  $images = $proj['images'];
} elseif (!empty($cover)) {
  $images = [$cover];
}

$title = ($name ? $name . ' - ' : '') . '湖北鄂重建设工程有限公司';
?>

<section class="bg-white">
  <!-- 顶部横幅 -->
  <div class="relative h-44 md:h-56 w-full overflow-hidden">
    <?php if (!empty($cover)): ?>
      <img
        src="<?= e($cover) ?>"
        alt="<?= e($name) ?>"
        class="w-full h-full object-cover"
      >
    <?php else: ?>
      <div class="w-full h-full bg-gray-200"></div>
    <?php endif; ?>

    <div class="absolute inset-0 bg-black/35"></div>

    <div class="absolute inset-0 flex items-center">
      <div class="container mx-auto px-4">
        <nav class="text-white/80 text-sm mb-2" aria-label="Breadcrumb">
          <a href="/?p=home" class="hover:text-white">首页</a>
          <span class="mx-2">/</span>
          <a href="/?p=home#projects" class="hover:text-white">案例展示</a>
          <span class="mx-2">/</span>
          <span class="text-white" aria-current="page"><?= e($name) ?></span>
        </nav>

        <?php if (!empty($category)): ?>
          <div class="inline-flex items-center bg-white/15 text-white text-sm px-3 py-1 rounded-full mb-3">
            <?= e($category) ?>
          </div>
        <?php endif; ?>

        <h1 class="text-2xl md:text-4xl font-extrabold text-white">
          <?= e($name) ?>
        </h1>

        <?php if (!empty($summary)): ?>
          <p class="mt-3 text-white/90">
            <?= e($summary) ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <article class="container mx-auto px-4 py-10 md:py-14 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-8">
      <!-- 图集：主画面 + 缩略图 -->
      <?php if (!empty($images)): ?>
        <div class="rounded-xl overflow-hidden mb-6">
          <div class="swiper proj-main rounded-xl overflow-hidden bg-gray-50">
            <div class="swiper-wrapper">
              <?php foreach ($images as $idx => $src): ?>
                <div class="swiper-slide">
                  <a href="<?= e($src) ?>" class="glightbox" data-gallery="proj">
                    <img
                      src="<?= e($src) ?>"
                      alt="<?= e($name) ?> 图<?= $idx + 1 ?>"
                      class="block max-w-full h-auto mx-auto"
                    >
                  </a>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>

          <?php if (count($images) > 1): ?>
            <div class="swiper proj-thumbs mt-3">
              <div class="swiper-wrapper">
                <?php foreach ($images as $idx => $src): ?>
                  <div class="swiper-slide">
                    <img
                      src="<?= e($src) ?>"
                      alt="<?= e($name) ?> 缩略图<?= $idx + 1 ?>"
                      class="h-20 w-full object-cover rounded"
                    >
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <div class="rounded-xl bg-gray-100 h-64 flex items-center justify-center text-gray-500 mb-6">
          暂无图片
        </div>
      <?php endif; ?>

    <!-- 项目介绍与能力亮点 -->
    <section class="mt-10 rounded-xl border border-gray-200 bg-white p-6 md:p-8">
      <div class="flex items-start gap-4">
        <div class="mt-1 flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
          <i class="fa-solid fa-diagram-project text-lg"></i>
        </div>
        <div>
          <p class="text-sm font-semibold text-primary">项目介绍</p>
          <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
            <?= htmlspecialchars($proj['name']) ?>
          </h2>
          <p class="mt-4 text-gray-700 leading-8">
            <?= htmlspecialchars($proj['summary']) ?>
          </p>
        </div>
      </div>
    
      <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="rounded-lg bg-gray-50 p-5">
          <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-white text-primary shadow-sm">
            <i class="fa-solid fa-industry"></i>
          </div>
          <h3 class="font-bold text-gray-900">制造能力</h3>
          <p class="mt-2 text-sm text-gray-600 leading-6">
            具备压力钢管、岔管、方变圆及复杂钢结构件的制作组织能力。
          </p>
        </div>
    
        <div class="rounded-lg bg-gray-50 p-5">
          <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-white text-primary shadow-sm">
            <i class="fa-solid fa-screwdriver-wrench"></i>
          </div>
          <h3 class="font-bold text-gray-900">工艺保障</h3>
          <p class="mt-2 text-sm text-gray-600 leading-6">
            围绕高强度钢结构制作需求，重视成形、焊接、装配与质量控制。
          </p>
        </div>
    
        <div class="rounded-lg bg-gray-50 p-5">
          <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-white text-primary shadow-sm">
            <i class="fa-solid fa-images"></i>
          </div>
          <h3 class="font-bold text-gray-900">现场图集</h3>
          <p class="mt-2 text-sm text-gray-600 leading-6">
            通过轮播与灯箱查看项目现场图片，便于了解构件细节与制作状态。
          </p>
        </div>
      </div>
    </section>

    <!-- 侧栏 -->
    <aside class="lg:col-span-4">
      <div class="rounded-xl border border-gray-200 p-6 sticky top-24">
        <h4 class="font-bold text-gray-900 mb-3">项目信息</h4>

        <ul class="space-y-2 text-gray-700 text-sm leading-6">
          <?php if (!empty($category)): ?>
            <li><strong>项目类型：</strong><?= e($category) ?></li>
          <?php endif; ?>

          <?php if (!empty($name)): ?>
            <li><strong>案例名称：</strong><?= e($name) ?></li>
          <?php endif; ?>
        </ul>

        <div class="mt-6">
          <h4 class="font-bold text-gray-900 mb-3">联系与咨询</h4>
          <p class="text-gray-700 text-sm">如需了解该项目更多技术细节与交付能力，请与我们联系。</p>
          <a href="/?p=home#contact" class="mt-4 inline-flex items-center gap-2 text-primary hover:text-secondary">
            <i class="fa-solid fa-paper-plane"></i> 获取更多资料
          </a>
        </div>
      </div>
    </aside>
  </article>
</section>

<!-- JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CreativeWork",
  "name": <?= json_encode($name, JSON_UNESCAPED_UNICODE) ?>,
  "url": <?= json_encode('/?p=project&slug=' . $projectSlug, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($images, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($summary, JSON_UNESCAPED_UNICODE) ?>,
  "about": <?= json_encode($category, JSON_UNESCAPED_UNICODE) ?>,
  "publisher": {
    "@type": "Organization",
    "name": "湖北鄂重建设工程有限公司"
  }
}
</script>

<!-- 项目页专用：灯箱 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var thumbsEl = document.querySelector('.proj-thumbs');
  var mainEl = document.querySelector('.proj-main');

  if (mainEl && typeof Swiper !== 'undefined') {
    var mainOptions = {
      loop: true,
      speed: 550,
      effect: 'slide',
      grabCursor: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      pagination: { el: '.proj-main .swiper-pagination', clickable: true },
      navigation: {
        nextEl: '.proj-main .swiper-button-next',
        prevEl: '.proj-main .swiper-button-prev'
      }
    };

    if (thumbsEl) {
      var thumbs = new Swiper('.proj-thumbs', {
        freeMode: true,
        watchSlidesProgress: true,
        slidesPerView: 'auto',
        spaceBetween: 8,
        slideToClickedSlide: true,
        observer: true,
        observeParents: true
      });

      mainOptions.thumbs = { swiper: thumbs };
    }

    new Swiper('.proj-main', mainOptions);
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.glightbox', loop: true });
  }
});
</script>

<style>
.proj-main .swiper-slide img {
  max-width: 100%;
  height: auto;
  object-fit: contain;
}
</style>