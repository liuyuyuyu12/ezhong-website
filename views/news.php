<?php
declare(strict_types=1);

/**
 * /views/news.php
 *
 * 功能：
 * - 无 slug：显示新闻列表
 * - 有 slug 且存在：显示新闻详情
 * - 有 slug 但不存在：返回 404
 */

$all = require __DIR__ . '/data/news.php';

// index.php 通常会提前准备 $slug；这里兜底再读一次
$slug = $slug ?? ($_GET['slug'] ?? null);
$slug = is_string($slug) && $slug !== '' ? trim($slug) : null;

// 简单转义函数：如果以后有全局 e()，这里可以删掉这个 fallback
if (!function_exists('e')) {
  function e(string|int|float|null $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
  }
}

// ===== 有 slug：新闻详情页 =====
if ($slug !== null) {
  if (!isset($all[$slug])) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    return;
  }

  $item = $all[$slug];

  // 兼容旧页：有 view 就直接 include 现有文件
  if (!empty($item['view']) && is_file($item['view'])) {
    include $item['view'];
    return;
  }

  // 没有 view 的，走统一详情模板
  $title = ($item['title'] ?? '新闻详情') . ' - 湖北鄂重建设工程有限公司';
  ?>
  <section class="bg-white">
    <nav class="container mx-auto px-4 py-4 text-sm text-gray-500" aria-label="Breadcrumb">
      <a href="/?p=home" class="hover:text-primary">首页</a>
      <span class="mx-2 text-gray-400">/</span>
      <a href="/?p=news" class="hover:text-primary">新闻动态</a>
      <span class="mx-2 text-gray-400">/</span>
      <span class="text-gray-700"><?= e($item['title'] ?? '新闻详情') ?></span>
    </nav>

    <header class="container mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
        <?= e($item['title'] ?? '新闻详情') ?>
      </h1>

      <div class="mt-4 flex flex-wrap items-center gap-4 text-gray-500">
        <?php if (!empty($item['date'])): ?>
          <span class="inline-flex items-center">
            <i class="far fa-clock mr-2"></i>发布时间：<?= e($item['date']) ?>
          </span>
        <?php endif; ?>

        <?php if (!empty($item['category'])): ?>
          <span class="inline-flex items-center">
            <i class="fas fa-tag mr-2"></i><?= e($item['category']) ?>
          </span>
        <?php endif; ?>
      </div>

      <?php if (!empty($item['cover'])): ?>
        <figure class="mt-6 rounded-xl overflow-hidden shadow-sm">
          <img
            src="<?= e($item['cover']) ?>"
            alt="<?= e($item['title'] ?? '新闻封面') ?>"
            class="w-full h-auto object-cover"
          >
        </figure>
      <?php endif; ?>
    </header>

    <article class="container mx-auto px-4 py-10 text-gray-800 text-[17px] leading-relaxed space-y-8">
      <?php if (!empty($item['content'])): ?>
        <?= $item['content'] ?>
      <?php else: ?>
        <p><?= e($item['summary'] ?? '') ?></p>
      <?php endif; ?>

      <div class="pt-4">
        <a href="/?p=news" class="inline-flex items-center px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50">
          <i class="fas fa-arrow-left mr-2"></i>返回新闻列表
        </a>
      </div>
    </article>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": <?= json_encode($item['title'] ?? '', JSON_UNESCAPED_UNICODE) ?>,
    "datePublished": <?= json_encode($item['date'] ?? '') ?>,
    "image": <?= json_encode($item['cover'] ?? '', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
    "author": { "@type": "Organization", "name": "湖北鄂重建设工程有限公司" },
    "publisher": { "@type": "Organization", "name": "湖北鄂重建设工程有限公司" },
    "description": <?= json_encode($item['summary'] ?? '', JSON_UNESCAPED_UNICODE) ?>
  }
  </script>
  <?php
  return;
}

// ===== 无 slug：新闻列表页 =====
$items = $all;

// 新闻列表建议显示全部新闻；如果你希望只显示 featured=true，可取消下面这行注释
// $items = array_filter($items, static fn(array $item): bool => (bool)($item['featured'] ?? true));

uasort($items, static function (array $a, array $b): int {
  return ((int)($b['sort'] ?? 0)) <=> ((int)($a['sort'] ?? 0));
});
?>

<section class="py-16 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900">新闻动态</h1>
      <p class="mt-3 text-gray-600">公司新闻与活动速览</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($items as $key => $item): ?>
        <?php
        $slug = $item['slug'] ?? $key;
        include __DIR__ . '/partials/news-card.php';
        ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>