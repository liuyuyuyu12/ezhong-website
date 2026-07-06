<?php
// /views/news.php
$title = '新闻动态 - 湖北鄂重建设工程有限公司';
$all = require __DIR__ . '/data/news.php';

// 读取 slug（index.php 已经准备了 $slug）
$slug = $slug ?? null;

if ($slug && isset($all[$slug])) {
  $item = $all[$slug];

  // 1) 兼容旧页：有 view 就直接 include 现有文件
  if (!empty($item['view']) && is_file($item['view'])) {
    // 旧页面里通常会自行输出 <section> 等完整结构
    include $item['view'];
    return;
  }

  // 2) （可选）没有 view 的，走统一详情模板
  $title = $item['title'] . ' - 湖北鄂重建设工程有限公司';
  ?>
  <section class="bg-white">
    <nav class="container mx-auto px-4 py-4 text-sm text-gray-500">
      <a href="/?p=home" class="hover:text-primary">首页</a>
      <span class="mx-2 text-gray-400">/</span>
      <a href="/?p=news" class="hover:text-primary">新闻动态</a>
      <span class="mx-2 text-gray-400">/</span>
      <span class="text-gray-700"><?= htmlspecialchars($item['title']) ?></span>
    </nav>

    <header class="container mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
        <?= htmlspecialchars($item['title']) ?>
      </h1>
      <div class="mt-4 flex flex-wrap items-center gap-4 text-gray-500">
        <span class="inline-flex items-center"><i class="far fa-clock mr-2"></i>发布时间：<?= htmlspecialchars($item['date']) ?></span>
        <span class="inline-flex items-center"><i class="fas fa-tag mr-2"></i><?= htmlspecialchars($item['category']) ?></span>
      </div>
      <?php if (!empty($item['cover'])): ?>
        <figure class="mt-6 rounded-xl overflow-hidden shadow-sm">
          <img src="<?= htmlspecialchars($item['cover']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-auto object-cover">
        </figure>
      <?php endif; ?>
    </header>

    <article class="container mx-auto px-4 py-10 text-gray-800 text-[17px] leading-relaxed space-y-8">
      <?php if (!empty($item['content'])): ?>
        <?= $item['content'] /* 可在 data 里放一小段 HTML 简文，按需使用 */ ?>
      <?php else: ?>
        <p><?= htmlspecialchars($item['summary'] ?? '') ?></p>
      <?php endif; ?>

      <div class="pt-4">
        <a href="/?p=news" class="inline-flex items-center px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50">
          <i class="fas fa-arrow-left mr-2"></i>返回新闻列表
        </a>
      </div>
    </article>
  </section>

  <!-- 可选：Article JSON-LD（统一模板时使用） -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": <?= json_encode($item['title'], JSON_UNESCAPED_UNICODE) ?>,
    "datePublished": <?= json_encode($item['date']) ?>,
    "image": <?= json_encode($item['cover'] ?? '', JSON_UNESCAPED_SLASHES) ?>,
    "author": { "@type": "Organization", "name": "湖北鄂重建设工程有限公司" },
    "publisher": { "@type": "Organization", "name": "湖北鄂重建设工程有限公司" },
    "description": <?= json_encode($item['summary'] ?? '', JSON_UNESCAPED_UNICODE) ?>
  }
  </script>
  <?php
  return;
}

// ===== 无 slug：新闻列表页 =====
?>
<section class="py-16 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-900">新闻动态</h1>
      <p class="mt-3 text-gray-600">公司新闻与活动速览</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($all as $s => $n): ?>
        <div class="border border-gray-200 rounded-xl overflow-hidden relative group">
          <a href="/?p=news&slug=<?= urlencode($s) ?>"
             class="absolute inset-0 z-10" aria-label="阅读更多：<?= htmlspecialchars($n['title']) ?>"></a>
          <?php if (!empty($n['cover'])): ?>
            <img src="<?= htmlspecialchars($n['cover']) ?>" alt="<?= htmlspecialchars($n['title']) ?>" class="w-full h-50 object-cover">
          <?php endif; ?>
          <div class="p-6 relative z-20">
            <div class="flex justify-between text-sm text-gray-500 mb-2">
              <span><?= htmlspecialchars($n['date']) ?></span>
              <span><?= htmlspecialchars($n['category']) ?></span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <a href="/?p=news&slug=<?= urlencode($s) ?>" class="hover:text-secondary transition">
                <?= htmlspecialchars($n['title']) ?>
              </a>
            </h3>
            <?php if (!empty($n['summary'])): ?>
              <p class="text-gray-700 line-clamp-2"><?= htmlspecialchars($n['summary']) ?></p>
            <?php endif; ?>
            <a href="/?p=news&slug=<?= urlencode($s) ?>" class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">
              阅读更多
            </a>
          </div>
          <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
