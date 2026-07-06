<?php
// /views/product.php
$products = require __DIR__ . '/data/products.php';

// 获取路由里传入的 slug（你的路由里通常是 $_GET['slug']）
$slug = $_GET['slug'] ?? null;

if (!$slug || !isset($products[$slug])) {
  // 找不到就 404
  include __DIR__ . '/404.php';
  return;
}

$prod = $products[$slug];

/**
 * 统一做“安全取值”和“回退值”：
 * - summary：优先用 $prod['summary']，没有就退到 $prod['meta']['project'] 或空串
 * - category / owner：优先扁平字段，没有就尝试 meta 里的同名字段或空串
 * - images：没有就用空数组，避免 foreach 报错
 * - specs：可能不存在；优先用 $prod['specs']（若是数组），否则尝试用 $prod['meta']（若是数组）代替参数清单；再不行就空数组
 */
$name     = $prod['name'] ?? '';
$cover    = $prod['cover'] ?? '';
$summary  = $prod['summary'] ?? ($prod['meta']['project'] ?? '');
$category = $prod['category'] ?? ($prod['meta']['category'] ?? '');
$owner    = $prod['owner'] ?? ($prod['meta']['owner'] ?? '');

$images   = [];
if (!empty($prod['images']) && is_array($prod['images'])) {
  $images = $prod['images'];
}

$specs = [];
if (!empty($prod['specs']) && is_array($prod['specs'])) {
  $specs = $prod['specs'];
} elseif (!empty($prod['meta']) && is_array($prod['meta'])) {
  // 如果没有 specs，但存在 meta，就把 meta 当作“参数清单”显示出来
  $specs = $prod['meta'];
}

$title = ($name ? $name . ' - ' : '') . '湖北鄂重建设工程有限公司';
?>
<section class="bg-white">
  <!-- 顶部横幅 -->
  <div class="relative h-44 md:h-56 w-full overflow-hidden">
    <?php if ($cover): ?>
      <img src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($name) ?>"
           class="w-full h-full object-cover">
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
          <span class="text-white" aria-current="page"><?= htmlspecialchars($name) ?></span>
        </nav>
        <h1 class="text-2xl md:text-4xl font-extrabold text-white"><?= htmlspecialchars($name) ?></h1>
        <?php if (!empty($summary)): ?>
          <p class="mt-3 text-white/90"><?= htmlspecialchars($summary) ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <article class="container mx-auto px-4 py-10 md:py-14 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-8">
      <!-- 图集：主画面 + 缩略图（安全防空） -->
      <?php if (!empty($images)): ?>
      <div class="rounded-xl overflow-hidden mb-6">
        <div class="swiper prod-main aspect-[16/9] rounded-xl overflow-hidden">
          <div class="swiper-wrapper">
            <?php foreach ($images as $idx => $src): ?>
              <div class="swiper-slide">
                <a href="<?= htmlspecialchars($src) ?>" class="glightbox" data-gallery="prod">
                  <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($name) ?> 图<?= $idx+1 ?>"
                       class="w-full h-full object-cover">
                </a>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>

        <div class="swiper prod-thumbs mt-3 h-24">  <!-- ← 加了 h-24 -->
          <div class="swiper-wrapper">
            <?php foreach ($images as $src): ?>
              <div class="swiper-slide !w-auto">
                <img src="<?= htmlspecialchars($src) ?>" alt="thumb" class="h-full w-28 object-cover rounded">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php else: ?>
        <div class="rounded-xl bg-gray-100 h-64 flex items-center justify-center text-gray-500 mb-6">
          暂无图片
        </div>
      <?php endif; ?>

      <!-- 详细介绍（参数区：仅在有数组时渲染） -->
      <div class="prose prose-gray max-w-none leading-7">
        <?php if (!empty($specs) && is_array($specs)): ?>
          <h2>产品参数</h2>
          <ul>
            <?php foreach ($specs as $k => $v): ?>
              <li>
                <strong><?= htmlspecialchars((string)$k) ?>：</strong>
                <?= is_array($v) ? htmlspecialchars(json_encode($v, JSON_UNESCAPED_UNICODE)) : htmlspecialchars((string)$v) ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <h3>适用场景</h3>
        <p>适用于压力钢管、风电塔筒等高强结构用板材的成形/预弯/卷制等关键工序。</p>

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
            <li><strong>所属分类：</strong><?= htmlspecialchars($category) ?></li>
          <?php endif; ?>
          <?php if (!empty($owner)): ?>
            <li><strong>典型业主：</strong><?= htmlspecialchars($owner) ?></li>
          <?php endif; ?>
        </ul>
        <a href="/?p=home#contact" class="mt-4 inline-flex items-center gap-2 text-primary hover:text-secondary">
          <i class="fa-solid fa-paper-plane"></i> 索取技术资料/报价
        </a>
      </div>
    </aside>
  </article>
</section>

<!-- Product JSON-LD（有利于搜索引擎识别产品页） -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": <?= json_encode($name, JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($images, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?>,
  "description": <?= json_encode($summary, JSON_UNESCAPED_UNICODE) ?>,
  "brand": { "@type": "Brand", "name": "湖北鄂重建设工程有限公司" }
}
</script>

<!-- 仅在产品页初始化轮播/灯箱（确保全站已引入 Swiper） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var thumbsEl = document.querySelector('.prod-thumbs');
  var mainEl   = document.querySelector('.prod-main');

  if (thumbsEl && mainEl && typeof Swiper !== 'undefined') {
    var thumbs = new Swiper('.prod-thumbs', {
      freeMode: true,
      watchSlidesProgress: true,    // 缩略图联动所需
      slidesPerView: 'auto',        // 有了固定宽度 + auto，间距最自然
      spaceBetween: 8,
      slideToClickedSlide: true,    // 点击缩略图跳转
      observer: true, observeParents: true
    });

    new Swiper('.prod-main', {
      loop: true, speed: 550, effect: 'slide', grabCursor: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      navigation: {                 // 绑定到当前容器内部的箭头
        nextEl: '.prod-main .swiper-button-next',
        prevEl: '.prod-main .swiper-button-prev'
      },
      thumbs: { swiper: thumbs }    // 官方 thumbs 绑定方式
    });
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.glightbox', loop: true });
  }
});
</script>

<style>
/* 详情页主画面允许图片按原始比例展示（不强行裁切） */
.proj-main .swiper-slide img { max-width: 100%; height: auto; object-fit: contain; }
</style>