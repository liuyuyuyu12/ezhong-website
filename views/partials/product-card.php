<?php
/** @var string $slug */
/** @var array $product */
$images = $product['images'] ?? [];
?>
<div class="equipment-card bg-white rounded-xl overflow-hidden shadow flex flex-col h-full relative">
  <a href="<?= e(site_url('product', ['slug' => $slug])) ?>" class="absolute inset-0 z-10" aria-label="查看产品详情：<?= e($product['name']) ?>"></a>
  <div class="swiper equipment-swiper relative w-full aspect-[3.2/2.4]">
    <div class="swiper-wrapper">
      <?php foreach ($images as $idx => $src): ?>
        <div class="swiper-slide">
          <img src="<?= e($src) ?>" alt="<?= e($product['name']) ?> 图<?= $idx + 1 ?>" class="w-full h-full object-cover" loading="lazy" decoding="async">
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="p-6 flex-1">
    <h3 class="text-xl font-bold text-gray-800 mb-2"><?= e($product['name']) ?></h3>
    <?php if (!empty($product['summary'])): ?>
      <p class="text-gray-600 mb-4"><?= e($product['summary']) ?></p>
    <?php endif; ?>
    <?php if (!empty($product['meta'])): ?>
      <ul class="text-gray-700 space-y-1">
        <?php if (!empty($product['meta']['owner'])): ?>
          <li><span class="font-medium">业主单位：</span><?= e($product['meta']['owner']) ?></li>
        <?php endif; ?>
        <?php if (!empty($product['meta']['scope'])): ?>
          <li><span class="font-medium">施工内容：</span><?= e($product['meta']['scope']) ?></li>
        <?php endif; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>