<?php
declare(strict_types=1);

$newsTitle = '湖北鄂重建设工程有限公司马年年中生产经营总结会议';
$newsDate = '2026-07-07';
$newsCategory = '公司新闻';
$newsLocation = '湖北鄂重建设工程有限公司会议室';

$summary = '湖北鄂重建设工程有限公司召开马年年中生产经营总结会议，系统回顾上半年生产经营工作，分析当前重点任务，并对下半年项目履约、安全质量、市场拓展和经营管理工作作出安排。';

$images = [
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议.png?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议-1.png?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议-2.png?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议-3.png?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议-4.png?x-oss-process=image/format,webp/interlace,1',
  'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议-5.png?x-oss-process=image/format,webp/interlace,1',
];

$imageCaptions = [
  '马年年中生产经营总结会议现场',
  '会议现场（一）',
  '会议现场（二）',
  '会议现场（三）',
  '会议现场（四）',
  '会议现场（五）',
];
?>

<section class="bg-white">
  <!-- 面包屑导航 -->
  <nav
    class="container mx-auto px-4 py-4 text-sm text-gray-500"
    aria-label="Breadcrumb"
  >
    <a href="/?p=home" class="hover:text-primary">首页</a>
    <span class="mx-2 text-gray-400">/</span>

    <a href="/?p=news" class="hover:text-primary">新闻动态</a>
    <span class="mx-2 text-gray-400">/</span>

    <span class="text-gray-700"><?= e($newsTitle) ?></span>
  </nav>

  <!-- 标题区域 -->
  <header class="container mx-auto px-4">
    <div class="max-w-5xl mx-auto">
      <div class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-sm font-medium text-primary">
        <?= e($newsCategory) ?>
      </div>

      <h1 class="mt-4 text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
        <?= e($newsTitle) ?>
      </h1>

      <div class="mt-4 flex flex-wrap items-center gap-4 text-gray-500">
        <span class="inline-flex items-center">
          <i class="far fa-clock mr-2"></i>
          发布时间：
          <time datetime="<?= e($newsDate) ?>"><?= e($newsDate) ?></time>
        </span>

        <span class="inline-flex items-center">
          <i class="fas fa-map-marker-alt mr-2"></i>
          <?= e($newsLocation) ?>
        </span>
      </div>

      <p class="mt-6 text-lg text-gray-700 leading-8">
        <?= e($summary) ?>
      </p>
    </div>
  </header>

  <article class="container mx-auto px-4 py-10 md:py-14">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
      <div class="lg:col-span-8">
        <!-- 主图轮播 -->
        <div class="rounded-xl overflow-hidden">
          <div class="swiper midyear-news-main bg-gray-100 rounded-xl overflow-hidden">
            <div class="swiper-wrapper">
              <?php foreach ($images as $index => $src): ?>
                <div class="swiper-slide">
                  <figure class="relative">
                    <a
                      href="<?= e($src) ?>"
                      class="glightbox block"
                      data-gallery="midyear-news"
                      data-title="<?= e($imageCaptions[$index] ?? '') ?>"
                    >
                      <img
                        src="<?= e($src) ?>"
                        alt="<?= e($imageCaptions[$index] ?? ($newsTitle . ' 图' . ($index + 1))) ?>"
                        class="block w-full aspect-[16/9] object-contain bg-gray-100"
                      >
                    </a>

                    <figcaption class="absolute bottom-0 left-0 right-0 bg-black/55 px-4 py-3 text-sm text-white">
                      <?= e($imageCaptions[$index] ?? '') ?>
                    </figcaption>
                  </figure>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>

          <!-- 缩略图 -->
          <div class="swiper midyear-news-thumbs mt-3 h-24">
            <div class="swiper-wrapper">
              <?php foreach ($images as $index => $src): ?>
                <div class="swiper-slide">
                  <img
                    src="<?= e($src) ?>"
                    alt="<?= e($imageCaptions[$index] ?? ('缩略图' . ($index + 1))) ?>"
                    class="h-20 w-full object-cover rounded-lg cursor-pointer border border-gray-200"
                  >
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- 新闻正文 -->
        <div class="mt-10 space-y-8 text-[17px] leading-8 text-gray-800">
          <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
              总结工作成效，明确发展方向
            </h2>

            <p>
              2026年7月7日，湖北鄂重建设工程有限公司在公司会议室召开马年年中生产经营总结会议。会议围绕上半年生产经营工作进行系统回顾，结合项目建设、生产组织、质量管理、安全生产和市场经营等方面，对当前工作情况进行梳理分析。
            </p>

            <p class="mt-4">
              会议认为，面对不断变化的市场环境和项目履约要求，公司各部门应进一步强化责任意识和协同意识，坚持以客户需求为导向，以质量和安全为基础，持续提升生产组织效率与项目管理水平。
            </p>
          </section>

          <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
              聚焦项目履约，强化生产组织
            </h2>

            <p>
              会议围绕在建项目和重点生产任务进行了交流，要求进一步细化生产计划，做好人员、设备、材料和工序之间的衔接，及时解决生产过程中的重点、难点问题，保障各项任务按照计划有序推进。
            </p>

            <p class="mt-4">
              在项目实施过程中，公司将继续加强全过程管理，强化节点意识和交付意识，推动生产安排、技术支持、质量检查和现场服务紧密协同，不断提升项目履约能力。
            </p>
          </section>

          <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
              坚守安全质量底线
            </h2>

            <p>
              会议强调，安全和质量是企业稳定发展的基础。各部门、各岗位要严格落实安全生产责任，持续开展风险排查和隐患治理，加强关键工序、重点设备及作业现场的安全管理。
            </p>

            <p class="mt-4">
              同时，要进一步完善质量控制流程，严格执行相关技术标准和检验要求，将质量责任落实到生产制造的各个环节，以稳定可靠的产品和服务保障项目建设。
            </p>
          </section>

          <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
              部署下半年重点工作
            </h2>

            <p>
              围绕下半年生产经营目标，会议对项目履约、市场拓展、成本管理、技术支持和内部协同等工作进行了安排。公司将坚持稳中求进，持续提升经营管理的规范化、精细化水平。
            </p>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                <h3 class="font-bold text-gray-900">抓好项目履约</h3>
                <p class="mt-2 text-sm leading-6 text-gray-600">
                  紧盯重点项目和关键节点，提高生产组织与现场服务效率。
                </p>
              </div>

              <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                <h3 class="font-bold text-gray-900">强化安全质量</h3>
                <p class="mt-2 text-sm leading-6 text-gray-600">
                  落实安全生产责任，严格执行质量标准和检验要求。
                </p>
              </div>

              <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                <h3 class="font-bold text-gray-900">推进市场经营</h3>
                <p class="mt-2 text-sm leading-6 text-gray-600">
                  深化客户服务，积极把握新能源和水电工程领域的发展机遇。
                </p>
              </div>

              <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                <h3 class="font-bold text-gray-900">提升协同效率</h3>
                <p class="mt-2 text-sm leading-6 text-gray-600">
                  加强部门沟通和信息共享，推动各项工作高效衔接。
                </p>
              </div>
            </div>
          </section>

          <section>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
              凝聚共识，推动高质量发展
            </h2>

            <p>
              此次年中生产经营总结会议进一步统一了思想、明确了方向。湖北鄂重建设工程有限公司将以更加务实的作风推进下半年各项工作，持续提升压力钢管及相关钢结构产品的制造、安装和项目服务能力，为客户提供更加可靠、高效的解决方案。
            </p>
          </section>
        </div>

        <div class="mt-10 border-t border-gray-200 pt-6">
          <a
            href="/?p=news"
            class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2 hover:bg-gray-50"
          >
            <i class="fas fa-arrow-left"></i>
            返回新闻列表
          </a>
        </div>
      </div>

      <!-- 侧栏 -->
      <aside class="lg:col-span-4">
        <div class="sticky top-24 rounded-xl border border-gray-200 p-6">
          <h2 class="text-lg font-bold text-gray-900">新闻信息</h2>

          <ul class="mt-4 space-y-3 text-sm leading-6 text-gray-700">
            <li>
              <strong>新闻分类：</strong><?= e($newsCategory) ?>
            </li>

            <li>
              <strong>发布日期：</strong><?= e($newsDate) ?>
            </li>

            <li>
              <strong>会议地点：</strong><?= e($newsLocation) ?>
            </li>
          </ul>

          <div class="mt-6 border-t border-gray-200 pt-5">
            <p class="text-sm leading-6 text-gray-600">
              如需了解公司生产制造、工程项目或合作服务，请联系我们。
            </p>

            <a
              href="/?p=home#contact"
              class="mt-4 inline-flex items-center gap-2 font-medium text-primary hover:text-secondary"
            >
              <i class="fa-solid fa-paper-plane"></i>
              联系我们
            </a>
          </div>
        </div>
      </aside>
    </div>
  </article>
</section>

<!-- 图片灯箱 -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Swiper !== 'undefined') {
    var thumbs = new Swiper('.midyear-news-thumbs', {
      freeMode: true,
      watchSlidesProgress: true,
      slidesPerView: 3,
      spaceBetween: 8,
      slideToClickedSlide: true,
      breakpoints: {
        640: {
          slidesPerView: 4
        },
        768: {
          slidesPerView: 5
        },
        1024: {
          slidesPerView: 6
        }
      }
    });

    new Swiper('.midyear-news-main', {
      loop: true,
      speed: 550,
      grabCursor: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.midyear-news-main .swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: '.midyear-news-main .swiper-button-next',
        prevEl: '.midyear-news-main .swiper-button-prev'
      },
      thumbs: {
        swiper: thumbs
      }
    });
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({
      selector: '.glightbox',
      loop: true
    });
  }
});
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": <?= json_encode($newsTitle, JSON_UNESCAPED_UNICODE) ?>,
  "datePublished": <?= json_encode($newsDate) ?>,
  "description": <?= json_encode($summary, JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($images, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
  "author": {
    "@type": "Organization",
    "name": "湖北鄂重建设工程有限公司"
  },
  "publisher": {
    "@type": "Organization",
    "name": "湖北鄂重建设工程有限公司"
  }
}
</script>