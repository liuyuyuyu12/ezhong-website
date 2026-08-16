<?php
declare(strict_types=1);

$articles = require __DIR__ . '/data/technical-articles.php';

uasort(
  $articles,
  static function (array $a, array $b): int {
    return ((int)($b['sort'] ?? 0))
      <=> ((int)($a['sort'] ?? 0));
  }
);

$featured = null;

foreach ($articles as $key => $article) {
  if (!empty($article['featured'])) {
    $featured = [
      'slug' => $article['slug'] ?? $key,
      'item' => $article,
    ];
    break;
  }
}
?>

<section class="bg-white">

  <!-- ======================================================
       技术专栏 Hero
       ====================================================== -->
  <header
    class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-primary to-slate-800 text-white"
  >

    <div
      class="absolute inset-0 opacity-10"
      aria-hidden="true"
    >
      <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full border border-white"></div>
      <div class="absolute -bottom-32 -left-20 h-96 w-96 rounded-full border border-white"></div>
    </div>

    <div class="container relative mx-auto px-4 py-20 md:py-24">

      <nav
        class="mb-6 text-sm text-white/70"
        aria-label="Breadcrumb"
      >
        <a
          href="/?p=home"
          class="transition hover:text-white"
        >
          首页
        </a>

        <span class="mx-2">/</span>

        <span class="text-white">
          技术专栏
        </span>
      </nav>

      <div class="max-w-4xl">

        <p class="mb-4 text-sm font-semibold tracking-[0.25em] text-white/70">
          TECHNICAL INSIGHTS
        </p>

        <h1 class="text-4xl font-extrabold md:text-6xl">
          技术专栏
        </h1>

        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">
          聚焦压力钢管、卷板成形、焊接检测、抽水蓄能与智能制造，
          分享来自工程制造场景的技术知识、工艺经验与行业思考。
        </p>

      </div>
    </div>
  </header>


  <!-- ======================================================
       专栏分类
       ====================================================== -->
  <section class="border-b border-gray-100 bg-gray-50">
    <div class="container mx-auto px-4 py-7">

      <div class="flex flex-wrap gap-3">

        <?php
        $categories = [
          '压力钢管',
          '卷板成形',
          '焊接与检测',
          '智能制造',
          '工程技术',
        ];
        ?>

        <?php foreach ($categories as $category): ?>
          <span
            class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700"
          >
            <?= e($category) ?>
          </span>
        <?php endforeach; ?>

      </div>
    </div>
  </section>


  <!-- ======================================================
       编辑推荐
       ====================================================== -->
  <?php if ($featured): ?>

    <?php
    $featuredSlug = $featured['slug'];
    $featuredItem = $featured['item'];

    $featuredUrl = site_url(
      'technical-article',
      ['slug' => $featuredSlug]
    );
    ?>

    <section class="py-16 md:py-20">
      <div class="container mx-auto px-4">

        <div class="mb-10">
          <p class="text-sm font-semibold tracking-widest text-primary">
            FEATURED ARTICLE
          </p>

          <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
            编辑推荐
          </h2>
        </div>

        <article
          class="grid overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm lg:grid-cols-2"
        >

          <a
            href="<?= e($featuredUrl) ?>"
            class="group block min-h-[360px] overflow-hidden bg-gray-100"
          >
            <img
              src="<?= e($featuredItem['cover']) ?>"
              alt="<?= e($featuredItem['title']) ?>"
              class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
            >
          </a>

          <div class="flex flex-col justify-center p-8 md:p-12">

            <div class="flex flex-wrap items-center gap-3 text-sm">

              <span class="rounded-full bg-primary/10 px-3 py-1 font-semibold text-primary">
                <?= e($featuredItem['category']) ?>
              </span>

              <span class="text-gray-500">
                <?= e($featuredItem['date']) ?>
              </span>

            </div>

            <h2
              class="mt-5 text-2xl font-extrabold leading-10 text-gray-900 md:text-3xl"
            >
              <a
                href="<?= e($featuredUrl) ?>"
                class="hover:text-primary"
              >
                <?= e($featuredItem['title']) ?>
              </a>
            </h2>

            <p class="mt-5 leading-8 text-gray-600">
              <?= e($featuredItem['summary']) ?>
            </p>

            <div class="mt-7">
              <a
                href="<?= e($featuredUrl) ?>"
                class="inline-flex items-center gap-2 rounded-lg bg-primary px-6 py-3 font-semibold text-white transition hover:bg-blue-800"
              >
                阅读全文
                <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>

          </div>

        </article>

      </div>
    </section>

  <?php endif; ?>


  <!-- ======================================================
       全部技术文章
       ====================================================== -->
  <section class="bg-gray-50 py-16 md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-10">

        <p class="text-sm font-semibold tracking-widest text-primary">
          LATEST ARTICLES
        </p>

        <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
          最新技术文章
        </h2>

        <p class="mt-4 text-gray-600">
          持续更新压力钢管制造、卷板成形及大型钢结构相关技术内容。
        </p>

      </div>

      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

        <?php foreach ($articles as $key => $item): ?>

          <?php
          $slug = $item['slug'] ?? $key;
          include __DIR__ . '/partials/technical-card.php';
          ?>

        <?php endforeach; ?>

      </div>

    </div>
  </section>


  <!-- ======================================================
       合作 CTA
       ====================================================== -->
  <section class="bg-primary py-14 text-white">
    <div
      class="container mx-auto flex flex-col justify-between gap-8 px-4 lg:flex-row lg:items-center"
    >

      <div>

        <h2 class="text-3xl font-extrabold">
          有工程技术问题需要交流？
        </h2>

        <p class="mt-4 max-w-3xl leading-7 text-white/80">
          欢迎围绕压力钢管、卷板设备、大型钢结构制造及相关工程技术与我们联系。
        </p>

      </div>

      <a
        href="/?p=home#contact"
        class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-white px-6 py-3 font-semibold text-primary"
      >
        联系我们
        <i class="fa-solid fa-arrow-right-long"></i>
      </a>

    </div>
  </section>

</section>