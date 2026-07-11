<?php
declare(strict_types=1);

/**
 * /views/product.php
 *
 * 功能：
 * - 根据 slug 显示产品详情
 * - slug 不存在时返回真实 404
 * - 兼容 products.php 中的 summary/category/featured/sort/meta/specs 字段
 */

$products = require __DIR__ . '/data/products.php';

// index.php 通常会提前准备 $slug；这里兜底再读一次
$slug = $slug ?? ($_GET['slug'] ?? null);
$slug = is_string($slug) && $slug !== '' ? trim($slug) : null;

// 简单转义函数：如果以后有全局 e()，这里不会重复声明
if (!function_exists('e')) {
  function e(string|int|float|null $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
  }
}

if ($slug === null || !isset($products[$slug])) {
  http_response_code(404);
  include __DIR__ . '/404.php';
  return;
}

$prod = $products[$slug];

$productSlug = $prod['slug'] ?? $slug;
$name = $prod['name'] ?? '';
$cover = $prod['cover'] ?? '';
$summary = $prod['summary'] ?? ($prod['meta']['project'] ?? '');
$category = $prod['category'] ?? ($prod['meta']['category'] ?? '');
$owner = $prod['owner'] ?? ($prod['meta']['owner'] ?? '');

$images = [];
if (!empty($prod['images']) && is_array($prod['images'])) {
  $images = $prod['images'];
} elseif (!empty($cover)) {
  $images = [$cover];
}

$specs = [];
if (!empty($prod['specs']) && is_array($prod['specs'])) {
  $specs = $prod['specs'];
} elseif (!empty($prod['meta']) && is_array($prod['meta'])) {
  $specs = $prod['meta'];
}

$specLabels = [
  'project'  => '项目名称',
  'owner'    => '业主单位',
  'scope'    => '施工内容',
  'category' => '所属分类',
];

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
          <a href="/?p=home#products" class="hover:text-white">产品中心</a>
          <span class="mx-2">/</span>
          <span class="text-white" aria-current="page"><?= e($name) ?></span>
        </nav>

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
          <div class="swiper prod-main aspect-[16/9] rounded-xl overflow-hidden">
            <div class="swiper-wrapper">
              <?php foreach ($images as $idx => $src): ?>
                <div class="swiper-slide">
                  <a href="<?= e($src) ?>" class="glightbox" data-gallery="prod">
                    <img
                      src="<?= e($src) ?>"
                      alt="<?= e($name) ?> 图<?= $idx + 1 ?>"
                      class="w-full h-full object-cover"
                    >
                  </a>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

          <?php if (count($images) > 1): ?>
            <div class="swiper prod-thumbs mt-3 h-24">
              <div class="swiper-wrapper">
                <?php foreach ($images as $idx => $src): ?>
                  <div class="swiper-slide !w-auto">
                    <img
                      src="<?= e($src) ?>"
                      alt="<?= e($name) ?> 缩略图<?= $idx + 1 ?>"
                      class="h-full w-28 object-cover rounded"
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

      <!-- 详细介绍 -->
      <div class="prose prose-gray max-w-none leading-7">
        <?php if (!empty($specs) && is_array($specs)): ?>
          <h2>产品参数</h2>
          <ul>
            <?php foreach ($specs as $key => $value): ?>
              <?php
              $label = $specLabels[(string)$key] ?? (string)$key;
              $displayValue = is_array($value)
                ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                : (string)$value;
              ?>
              <li>
                <strong><?= e($label) ?>：</strong><?= e($displayValue) ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <h3>适用场景</h3>
        <p>适用于压力钢管、风电塔筒等高强结构用板材的成形、预弯、卷制等关键工序。</p>

        <h3>工艺与优势</h3>
        <ul>
          <li>全液压/微控：同步性好、重复精度高，便于数字化工艺参数沉淀。</li>
          <li>结构加固：高负载稳定性与安全保护完善，支持长周期连续作业。</li>
          <li>配套完善：与上料、矫平、焊接等工序联动，提升整体效率。</li>
        </ul>
      </div>
    </div>

    <!-- 侧栏 -->
    <aside class="lg:col-span-4">
      <div class="rounded-xl border border-gray-200 p-6 sticky top-24">
        <h4 class="font-bold text-gray-900 mb-3">关键信息</h4>

        <ul class="space-y-2 text-gray-700 text-sm leading-6">
          <?php if (!empty($category)): ?>
            <li><strong>所属分类：</strong><?= e($category) ?></li>
          <?php endif; ?>

          <?php if (!empty($owner)): ?>
            <li><strong>典型业主：</strong><?= e($owner) ?></li>
          <?php endif; ?>

          <?php if (!empty($prod['meta']['project'])): ?>
            <li><strong>典型项目：</strong><?= e($prod['meta']['project']) ?></li>
          <?php endif; ?>

          <?php if (!empty($prod['meta']['scope'])): ?>
            <li><strong>应用范围：</strong><?= e($prod['meta']['scope']) ?></li>
          <?php endif; ?>
        </ul>

        <a href="/?p=home#contact" class="mt-4 inline-flex items-center gap-2 text-primary hover:text-secondary">
          <i class="fa-solid fa-paper-plane"></i> 索取技术资料/报价
        </a>
      </div>
    </aside>
  </article>
</section>

<!-- Product JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": <?= json_encode($name, JSON_UNESCAPED_UNICODE) ?>,
  "url": <?= json_encode('/?p=product&slug=' . $productSlug, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($images, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($summary, JSON_UNESCAPED_UNICODE) ?>,
  "category": <?= json_encode($category, JSON_UNESCAPED_UNICODE) ?>,
  "brand": {
    "@type": "Brand",
    "name": "湖北鄂重建设工程有限公司"
  }
}
</script>

<!-- 产品页专用：灯箱 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var thumbsEl = document.querySelector('.prod-thumbs');
  var mainEl = document.querySelector('.prod-main');

  if (mainEl && typeof Swiper !== 'undefined') {
    var mainOptions = {
      loop: true,
      speed: 550,
      effect: 'slide',
      grabCursor: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      navigation: {
        nextEl: '.prod-main .swiper-button-next',
        prevEl: '.prod-main .swiper-button-prev'
      }
    };

    if (thumbsEl) {
      var thumbs = new Swiper('.prod-thumbs', {
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

    new Swiper('.prod-main', mainOptions);
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.glightbox', loop: true });
  }
});
</script>

<style>
.prod-main .swiper-slide img {
  max-width: 100%;
  height: 100%;
  object-fit: contain;
  background: #f8fafc;
}
</style>