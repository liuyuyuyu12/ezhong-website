<?php
/** @var string $slug */
/** @var array $item */

$url = site_url('technical-article', ['slug' => $slug]);
?>

<article
  class="group overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl"
>

  <a
    href="<?= e($url) ?>"
    class="block overflow-hidden bg-gray-100"
    aria-label="阅读技术文章：<?= e($item['title']) ?>"
  >
    <?php if (!empty($item['cover'])): ?>
      <img
        src="<?= e($item['cover']) ?>"
        alt="<?= e($item['title']) ?>"
        class="h-56 w-full object-cover transition duration-700 group-hover:scale-105"
        loading="lazy"
        decoding="async"
      >
    <?php endif; ?>
  </a>

  <div class="p-6">

    <div class="mb-4 flex flex-wrap items-center gap-3 text-sm">

      <?php if (!empty($item['category'])): ?>
        <span class="rounded-full bg-primary/10 px-3 py-1 font-medium text-primary">
          <?= e($item['category']) ?>
        </span>
      <?php endif; ?>

      <?php if (!empty($item['date'])): ?>
        <span class="text-gray-500">
          <i class="fa-regular fa-calendar mr-1"></i>
          <?= e($item['date']) ?>
        </span>
      <?php endif; ?>

    </div>

    <h2 class="text-xl font-bold leading-8 text-gray-900">
      <a
        href="<?= e($url) ?>"
        class="transition hover:text-primary"
      >
        <?= e($item['title']) ?>
      </a>
    </h2>

    <?php if (!empty($item['summary'])): ?>
      <p class="mt-4 line-clamp-3 leading-7 text-gray-600">
        <?= e($item['summary']) ?>
      </p>
    <?php endif; ?>

    <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4">

      <span class="text-sm text-gray-500">
        <?= e($item['reading_time'] ?? '') ?>
      </span>

      <a
        href="<?= e($url) ?>"
        class="inline-flex items-center gap-2 font-semibold text-primary transition hover:text-secondary"
      >
        阅读全文
        <i class="fa-solid fa-arrow-right text-sm"></i>
      </a>

    </div>

  </div>
</article>