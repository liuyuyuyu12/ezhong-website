<?php
/**
 * /views/partials/project-card.php
 *
 * 需要外部传入：
 * - $slug: 当前案例 slug
 * - $project: 当前案例数据数组
 */

$projectSlug = $project['slug'] ?? $slug;
$images = !empty($project['images']) && is_array($project['images'])
  ? $project['images']
  : [];

$cover = $project['cover'] ?? ($images[0] ?? '');
$name = $project['name'] ?? '';
$summary = $project['summary'] ?? '';
$category = $project['category'] ?? '';
?>

<div class="project-card bg-white rounded-xl overflow-hidden relative">
  <a
    href="/?p=project&amp;slug=<?= htmlspecialchars((string)$projectSlug, ENT_QUOTES, 'UTF-8') ?>"
    class="absolute inset-0 z-10"
    aria-label="查看案例详情：<?= htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') ?>"
  ></a>

  <div class="swiper project-swiper relative w-full aspect-[16/9] overflow-hidden rounded-t-xl">
    <div class="swiper-wrapper">
      <?php if (!empty($images)): ?>
        <?php foreach ($images as $idx => $src): ?>
          <div class="swiper-slide">
            <img
              src="<?= htmlspecialchars((string)$src, ENT_QUOTES, 'UTF-8') ?>"
              alt="<?= htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') ?> 图<?= $idx + 1 ?>"
              class="w-full h-full object-cover"
              loading="lazy"
              decoding="async"
            >
          </div>
        <?php endforeach; ?>
      <?php elseif ($cover): ?>
        <div class="swiper-slide">
          <img
            src="<?= htmlspecialchars((string)$cover, ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') ?>"
            class="w-full h-full object-cover"
            loading="lazy"
            decoding="async"
          >
        </div>
      <?php else: ?>
        <div class="swiper-slide">
          <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-500">
            暂无图片
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="swiper-pagination"></div>
  </div>

  <div class="p-6">
    <?php if ($category): ?>
      <div class="text-sm text-primary font-medium mb-2">
        <?= htmlspecialchars((string)$category, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <h3 class="text-xl font-bold text-gray-800 mb-2">
      <?= htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') ?>
    </h3>

    <?php if ($summary): ?>
      <p class="text-gray-700">
        <?= htmlspecialchars((string)$summary, ENT_QUOTES, 'UTF-8') ?>
      </p>
    <?php endif; ?>
  </div>
</div>