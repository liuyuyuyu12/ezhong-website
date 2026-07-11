<?php
/** @var string $slug */
/** @var array $item */
?>
<div class="border border-gray-200 rounded-xl overflow-hidden relative group">
  <a href="<?= e(site_url('news', ['slug' => $slug])) ?>"
     class="absolute inset-0 z-10"
     aria-label="阅读更多：<?= e($item['title']) ?>"></a>

  <?php if (!empty($item['cover'])): ?>
    <img src="<?= e($item['cover']) ?>" alt="<?= e($item['title']) ?>" class="w-full h-50 object-cover">
  <?php endif; ?>

  <div class="p-6 relative z-20">
    <div class="flex justify-between text-sm text-gray-500 mb-2">
      <span><?= e($item['date'] ?? '') ?></span>
      <span><?= e($item['category'] ?? '') ?></span>
    </div>
    <h3 class="text-xl font-bold text-gray-800 mb-3">
      <a href="<?= e(site_url('news', ['slug' => $slug])) ?>" class="hover:text-secondary transition">
        <?= e($item['title']) ?>
      </a>
    </h3>
    <?php if (!empty($item['summary'])): ?>
      <p class="text-gray-700 line-clamp-2"><?= e($item['summary']) ?></p>
    <?php endif; ?>
    <a href="<?= e(site_url('news', ['slug' => $slug])) ?>" class="mt-4 inline-block text-primary font-medium hover:text-secondary transition">
      阅读更多
    </a>
  </div>
  <div class="absolute inset-0 ring-0 ring-secondary/0 group-hover:ring-2 group-hover:ring-secondary/20 transition"></div>
</div>