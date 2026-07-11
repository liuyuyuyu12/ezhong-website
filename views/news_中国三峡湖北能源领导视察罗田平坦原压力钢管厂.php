<?php
$newsTitle = '中国三峡-湖北能源领导视察罗田平坦原压力钢管厂';
$newsDate = '2026-07-06';
$newsCategory = '项目动态';
$summary = '中国三峡、湖北能源相关领导到罗田平坦原压力钢管厂视察指导，深入了解压力钢管制作现场、生产组织与质量管控情况。';

$images = [
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-1.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-2.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-3.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-4.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-5.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-6.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-7.jpg?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂-8.jpg?x-oss-process=image/format,webp/interlace,1',
];
?>

<section class="bg-white">
  <nav class="container mx-auto px-4 py-4 text-sm text-gray-500">
    <a href="/?p=home" class="hover:text-primary">首页</a>
    <span class="mx-2 text-gray-400">/</span>
    <a href="/?p=news" class="hover:text-primary">新闻动态</a>
    <span class="mx-2 text-gray-400">/</span>
    <span class="text-gray-700"><?= htmlspecialchars($newsTitle) ?></span>
  </nav>

  <article class="container mx-auto px-4 pb-14">
    <header class="max-w-4xl mx-auto">
      <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight"><?= htmlspecialchars($newsTitle) ?></h1>
      <div class="mt-4 flex flex-wrap items-center gap-4 text-gray-500">
        <span><i class="far fa-clock mr-2"></i>发布时间：<?= htmlspecialchars($newsDate) ?></span>
        <span><i class="fas fa-tag mr-2"></i><?= htmlspecialchars($newsCategory) ?></span>
      </div>
      <p class="mt-6 text-lg text-gray-700 leading-relaxed"><?= htmlspecialchars($summary) ?></p>
    </header>

    <div class="max-w-5xl mx-auto mt-8">
      <div class="swiper news-main rounded-xl overflow-hidden bg-gray-100">
        <div class="swiper-wrapper">
          <?php foreach ($images as $idx => $src): ?>
            <div class="swiper-slide">
              <a href="<?= htmlspecialchars($src) ?>" class="glightbox" data-gallery="news-gallery">
                <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($newsTitle) ?> 图<?= $idx + 1 ?>" class="block w-full h-auto mx-auto">
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="swiper news-thumbs mt-3 h-24">
        <div class="swiper-wrapper">
          <?php foreach ($images as $idx => $src): ?>
            <div class="swiper-slide !w-auto">
              <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($newsTitle) ?> 缩略图<?= $idx + 1 ?>" class="h-full w-32 object-cover rounded cursor-pointer">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="max-w-4xl mx-auto mt-10">
      <a href="/?p=news" class="inline-flex items-center px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50">
        <i class="fas fa-arrow-left mr-2"></i>返回新闻列表
      </a>
    </div>
  </article>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Swiper !== 'undefined') {
    var thumbs = new Swiper('.news-thumbs', {
      freeMode: true,
      watchSlidesProgress: true,
      slidesPerView: 'auto',
      spaceBetween: 8,
      slideToClickedSlide: true,
      observer: true,
      observeParents: true
    });

    new Swiper('.news-main', {
      loop: true,
      speed: 550,
      effect: 'slide',
      grabCursor: true,
      autoplay: { delay: 3500, disableOnInteraction: false },
      pagination: { el: '.news-main .swiper-pagination', clickable: true },
      navigation: {
        nextEl: '.news-main .swiper-button-next',
        prevEl: '.news-main .swiper-button-prev'
      },
      thumbs: { swiper: thumbs }
    });
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.glightbox', loop: true });
  }
});
</script>

<style>
.news-main .swiper-slide {
  display: flex;
  align-items: center;
  justify-content: center;
}

.news-main .swiper-slide img {
  max-width: 100%;
  height: auto;
  object-fit: contain;
}
</style>