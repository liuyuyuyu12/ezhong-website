<?php
declare(strict_types=1);

$all = $technical_articles
  ?? require __DIR__ . '/data/technical-articles.php';

$slug = $slug
  ?? ($_GET['slug'] ?? null);

$slug = is_string($slug) && $slug !== ''
  ? trim($slug)
  : null;

if (
  !$slug
  || !isset($all[$slug])
) {
  render_404(__DIR__);
  return;
}

$item = $all[$slug];

$contentView = $item['content_view'] ?? null;

if (
  !$contentView
  || !is_file($contentView)
) {
  render_404(__DIR__);
  return;
}

$articleUrl = site_url(
  'technical-article',
  ['slug' => $slug]
);
?>

<section class="bg-white pb-24 lg:pb-0">

  <!-- 面包屑 -->
  <nav
    class="container mx-auto px-4 py-5 text-sm text-gray-500"
    aria-label="Breadcrumb"
  >

    <a
      href="/?p=home"
      class="hover:text-primary"
    >
      首页
    </a>

    <span class="mx-2 text-gray-400">/</span>

    <a
      href="/?p=technical"
      class="hover:text-primary"
    >
      技术专栏
    </a>

    <span class="mx-2 text-gray-400">/</span>

    <span class="text-gray-700">
      <?= e($item['short_title'] ?? $item['title']) ?>
    </span>

  </nav>


  <!-- 文章头部 -->
  <header class="container mx-auto max-w-5xl px-4 pb-10 pt-5">

    <div class="mb-5 flex flex-wrap items-center gap-3 text-sm">

      <span class="rounded-full bg-primary/10 px-3 py-1 font-semibold text-primary">
        <?= e($item['category'] ?? '技术文章') ?>
      </span>

      <?php if (!empty($item['date'])): ?>
        <span class="text-gray-500">
          <i class="fa-regular fa-calendar mr-1"></i>
          发布时间：<?= e($item['date']) ?>
        </span>
      <?php endif; ?>

      <?php if (!empty($item['reading_time'])): ?>
        <span class="text-gray-500">
          <i class="fa-regular fa-clock mr-1"></i>
          <?= e($item['reading_time']) ?>
        </span>
      <?php endif; ?>

    </div>

    <h1
      class="max-w-5xl text-3xl font-extrabold leading-tight text-gray-900 md:text-5xl md:leading-tight"
    >
      <?= e($item['title']) ?>
    </h1>

    <p
      class="mt-6 max-w-4xl text-lg leading-8 text-gray-600"
    >
      <?= e($item['summary']) ?>
    </p>

    <div
      class="mt-6 flex flex-wrap items-center gap-5 border-t border-gray-100 pt-5 text-sm text-gray-500"
    >

      <span>
        <i class="fa-solid fa-user-pen mr-2"></i>
        <?= e($item['author'] ?? '湖北鄂重技术团队') ?>
      </span>

      <?php if (!empty($item['updated_at'])): ?>
        <span>
          最后更新：<?= e($item['updated_at']) ?>
        </span>
      <?php endif; ?>

    </div>
    
    <div class="mt-6 hidden flex-wrap gap-3 lg:flex">
    
      <button
        type="button"
        data-share-article
        class="inline-flex items-center gap-2 rounded-lg bg-primary px-5 py-2.5 font-semibold text-white transition hover:bg-blue-800"
      >
        <i class="fa-solid fa-share-nodes"></i>
        分享文章
      </button>
    
      <button
        type="button"
        data-copy-article-link
        class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 font-semibold text-gray-700 transition hover:bg-gray-50"
      >
        <i class="fa-regular fa-copy"></i>
        复制链接
      </button>
    
    </div>
    
    
    
  </header>


  <!-- 封面 -->
  <?php if (!empty($item['cover'])): ?>

    <div class="container mx-auto max-w-6xl px-4">

      <figure
        class="overflow-hidden rounded-2xl bg-gray-100 shadow-sm"
      >

        <img
          src="<?= e($item['cover']) ?>"
          alt="<?= e($item['title']) ?>"
          class="max-h-[620px] w-full object-cover"
        >

      </figure>

    </div>

  <?php endif; ?>


  <!-- 正文 -->
  <div
    class="container mx-auto grid max-w-6xl grid-cols-1 gap-12 px-4 py-12 lg:grid-cols-[minmax(0,1fr)_280px]"
  >

    <article
      class="technical-article-body min-w-0 text-[17px] leading-8 text-gray-800"
    >
      <?php include $contentView; ?>
    </article>


    <!-- 右侧栏 -->
    <aside class="hidden lg:block">

      <div class="sticky top-28 space-y-6">

        <div
          class="rounded-2xl border border-gray-200 bg-gray-50 p-6"
        >

          <h2 class="text-lg font-bold text-gray-900">
            本文关键词
          </h2>

          <div class="mt-4 flex flex-wrap gap-2">

            <?php foreach (($item['keywords'] ?? []) as $keyword): ?>

              <span
                class="rounded-full border border-gray-200 bg-white px-3 py-1 text-sm text-gray-600"
              >
                <?= e($keyword) ?>
              </span>

            <?php endforeach; ?>

          </div>
        </div>


        <div
          class="rounded-2xl bg-primary p-6 text-white"
        >

          <h2 class="text-xl font-bold">
            工程技术咨询
          </h2>

          <p class="mt-3 text-sm leading-7 text-white/80">
            如果您有压力钢管制造、卷板设备或大型钢结构相关技术需求，欢迎联系我们。
          </p>

          <a
            href="/?p=home#contact"
            class="mt-5 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 font-semibold text-primary"
          >
            联系技术团队
          </a>

        </div>

      </div>

    </aside>

  </div>


  <!-- 返回 -->
  <div
    class="container mx-auto max-w-6xl border-t border-gray-100 px-4 py-10"
  >

    <a
      href="/?p=technical"
      class="inline-flex items-center gap-2 font-semibold text-primary hover:text-secondary"
    >
      <i class="fa-solid fa-arrow-left"></i>
      返回技术专栏
    </a>

  </div>

</section>

<!-- =====================================================
     移动端文章操作栏
     ===================================================== -->

<div
  class="fixed inset-x-0 z-40 px-3 lg:hidden"
  style="bottom: calc(10px + env(safe-area-inset-bottom));"
>

  <div
    class="mx-auto flex max-w-md items-center overflow-hidden rounded-2xl border border-gray-200 bg-white/95 p-2 shadow-2xl backdrop-blur-xl"
  >

    <a
      href="/?p=technical"
      class="flex flex-1 items-center justify-center gap-2 rounded-xl px-4 py-3 font-medium text-gray-700"
    >
      <i class="fa-solid fa-arrow-left"></i>
      技术专栏
    </a>

    <div class="h-8 w-px bg-gray-200"></div>

    <button
      type="button"
      data-share-article
      class="flex flex-1 items-center justify-center gap-2 rounded-xl px-4 py-3 font-semibold text-primary"
    >
      <i class="fa-solid fa-share-nodes"></i>
      分享文章
    </button>

  </div>

</div>



<?php
$schemaImage = $item['cover'] ?? '';
?>

<!-- Article Schema -->
<script type="application/ld+json">
<?= json_encode(
  [
    '@context' => 'https://schema.org',
    '@type' => 'Article',

    'headline' => $item['title'] ?? '',

    'description' =>
      $item['meta_description']
      ?? ($item['summary'] ?? ''),

    'image' => [$schemaImage],

    'datePublished' => $item['date'] ?? '',

    'dateModified' =>
      $item['updated_at']
      ?? ($item['date'] ?? ''),

    'author' => [
      '@type' => 'Organization',
      'name' => $item['author']
        ?? '湖北鄂重技术团队',
    ],

    'publisher' => [
      '@type' => 'Organization',
      'name' => '湖北鄂重建设工程有限公司',
      'logo' => [
        '@type' => 'ImageObject',
        'url' =>
          'https://static.ezhong.co/assets/images/logo-ezhong.png',
      ],
    ],

    'mainEntityOfPage' => [
      '@type' => 'WebPage',
      '@id' =>
        'https://ezhong.co'
        . $articleUrl,
    ],
  ],
  JSON_UNESCAPED_UNICODE
  | JSON_UNESCAPED_SLASHES
  | JSON_PRETTY_PRINT
) ?>
</script>


<!-- Breadcrumb Schema -->
<script type="application/ld+json">
<?= json_encode(
  [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',

    'itemListElement' => [

      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => '首页',
        'item' =>
          'https://ezhong.co/?p=home',
      ],

      [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => '技术专栏',
        'item' =>
          'https://ezhong.co/?p=technical',
      ],

      [
        '@type' => 'ListItem',
        'position' => 3,
        'name' =>
          $item['short_title']
          ?? $item['title'],
      ],

    ],
  ],
  JSON_UNESCAPED_UNICODE
  | JSON_UNESCAPED_SLASHES
  | JSON_PRETTY_PRINT
) ?>
</script>



<!-- 普通浏览器分享失败后的备用面板 -->
<div
  id="mobile-share-sheet"
  class="fixed inset-0 z-[9998] hidden bg-black/50 px-4"
  role="dialog"
  aria-modal="true"
  aria-label="文章分享"
>

  <button
    type="button"
    data-close-share-layer
    class="absolute inset-0 h-full w-full"
    aria-label="关闭分享面板"
  ></button>

  <div
    class="absolute bottom-0 left-0 right-0 z-20 rounded-t-3xl bg-white px-5 pb-6 pt-4 shadow-2xl"
    style="padding-bottom: calc(24px + env(safe-area-inset-bottom));"
  >

    <div class="mx-auto mb-5 h-1.5 w-12 rounded-full bg-gray-300"></div>

    <h2
      id="mobile-share-sheet-title"
      class="text-center text-lg font-bold text-gray-900"
    >
      分享文章
    </h2>
    
    <p
      id="mobile-share-sheet-message"
      class="mt-2 text-center text-sm leading-6 text-gray-500"
    >
      当前浏览器无法直接调起系统分享，可以复制文章链接后发送给好友。
    </p>

    <button
      type="button"
      data-copy-article-link
      class="mt-6 flex w-full items-center justify-center gap-3 rounded-xl bg-primary px-5 py-4 font-semibold text-white"
    >
      <i class="fa-regular fa-copy"></i>
      复制文章链接
    </button>

    <button
      type="button"
      data-close-share-layer
      class="mt-3 w-full rounded-xl bg-gray-100 px-5 py-4 font-semibold text-gray-700"
    >
      取消
    </button>

  </div>

</div>



<div
  id="article-share-toast"
  class="pointer-events-none fixed left-1/2 top-6 z-[9999] hidden -translate-x-1/2 rounded-full bg-gray-900 px-5 py-3 text-sm font-medium text-white shadow-xl"
>
</div>

<script>

window.EZHONG_ARTICLE_SHARE = <?= json_encode(
  [
    'title' =>
      $item['share']['title']
      ?? $item['title']
      ?? '',

    'text' =>
      $item['share']['description']
      ?? $item['summary']
      ?? '',

    'url' =>
      $canonical
      ?? (
        'https://ezhong.co'
        . site_url(
            'technical-article',
            ['slug' => $slug]
          )
      ),

    'image' =>
      $item['share']['image']
      ?? $item['cover']
      ?? '',
  ],
  JSON_UNESCAPED_UNICODE
  | JSON_UNESCAPED_SLASHES
) ?>;

</script>

<script>
(function () {

  /**
   * =====================================================
   * 鄂重技术文章移动端分享
   * =====================================================
   */

  const shareData =
    window.EZHONG_ARTICLE_SHARE || {};

    const fallbackTitle =
      document.getElementById(
        'mobile-share-sheet-title'
      );
    
    const fallbackMessage =
      document.getElementById(
        'mobile-share-sheet-message'
      );
    
      const fallbackSheet =
        document.getElementById('mobile-share-sheet');
    
      const toast =
        document.getElementById('article-share-toast');


  /**
   * 微信 / 企业微信检测
   *
   * MicroMessenger = 微信
   * wxwork         = 企业微信
   */
  const userAgent =
    navigator.userAgent || '';

  const isWeChat =
    /MicroMessenger/i.test(userAgent);

  const isWeCom =
    /wxwork/i.test(userAgent);

  const isWeChatEnvironment =
    isWeChat || isWeCom;


  /**
   * Toast
   */
  function showToast(message) {

    if (!toast) return;

    toast.textContent = message;

    toast.classList.remove('hidden');

    clearTimeout(
      window.__ezhongShareToastTimer
    );

    window.__ezhongShareToastTimer =
      setTimeout(function () {

        toast.classList.add('hidden');

      }, 2200);

  }



  /**
   * 显示备用分享面板
   */
    function showFallbackSheet(mode = 'fallback') {
    
      if (!fallbackSheet) return;
    
      if (
        mode === 'wechat'
      ) {
    
        if (fallbackTitle) {
          fallbackTitle.textContent =
            '分享到微信';
        }
    
        if (fallbackMessage) {
          fallbackMessage.innerHTML =
            '请点击微信右上角 <strong>···</strong>，选择<strong>发送给朋友</strong>或<strong>分享到朋友圈</strong>；也可以复制下面的文章链接。';
        }
    
      } else {
    
        if (fallbackTitle) {
          fallbackTitle.textContent =
            '分享文章';
        }
    
        if (fallbackMessage) {
          fallbackMessage.textContent =
            '当前浏览器无法直接调起系统分享，可以复制文章链接后发送给好友。';
        }
    
      }
    
      fallbackSheet.classList.remove(
        'hidden'
      );
    
      document.documentElement.style.overflow =
        'hidden';
    
    }


  /**
   * 关闭所有分享层
   */
    function closeShareLayers() {
    
      if (fallbackSheet) {
        fallbackSheet.classList.add(
          'hidden'
        );
      }
    
      document.documentElement.style.overflow =
        '';
    
    }


  /**
   * 兼容旧手机浏览器的复制方案
   */
  function legacyCopy(text) {

    const textarea =
      document.createElement('textarea');

    textarea.value = text;

    textarea.setAttribute(
      'readonly',
      ''
    );

    textarea.style.position =
      'fixed';

    textarea.style.left =
      '-9999px';

    textarea.style.top =
      '0';

    document.body.appendChild(
      textarea
    );

    textarea.focus();

    textarea.select();

    let success = false;

    try {

      success =
        document.execCommand('copy');

    } catch (error) {

      success = false;

    }

    document.body.removeChild(
      textarea
    );

    return success;

  }


  /**
   * 复制文章链接
   */
  async function copyArticleLink() {

    const url =
      shareData.url
      || window.location.href;

    /*
     * 优先使用现代 Clipboard API
     */
    if (
      window.isSecureContext
      && navigator.clipboard
      && typeof navigator.clipboard.writeText
        === 'function'
    ) {

      try {

        await navigator.clipboard.writeText(
          url
        );

        closeShareLayers();

        showToast('链接已复制，可发送给微信好友');

        return true;

      } catch (error) {

        console.warn(
          '[EZHONG] Clipboard API failed:',
          error
        );

      }

    }


    /*
     * 老浏览器备用方法
     */
    const success =
      legacyCopy(url);

    if (success) {

      closeShareLayers();

      showToast('链接已复制，可发送给微信好友');

      return true;

    }


    /*
     * 连传统复制方式也失败
     */
    showToast('复制失败，请使用浏览器菜单分享');

    return false;

  }


  /**
   * 分享文章
   */
  async function shareArticle() {

    /*
     * 微信 / 企业微信浏览器
     *
     * 普通网页不能直接打开微信好友选择器，
     * 因此直接展示右上角分享引导。
     */
    if (isWeChatEnvironment) {
    
      showFallbackSheet('wechat');
    
      return;
    
    }


    const data = {

      title:
        shareData.title
        || document.title,

      text:
        shareData.text
        || '',

      url:
        shareData.url
        || window.location.href

    };


    /**
     * 浏览器支持 canShare 时，
     * 先验证数据是否合法
     */
    if (
      typeof navigator.canShare ===
      'function'
    ) {

      try {

        if (!navigator.canShare(data)) {

          console.warn(
            '[EZHONG] navigator.canShare returned false'
          );

          showFallbackSheet();

          return;

        }

      } catch (error) {

        console.warn(
          '[EZHONG] navigator.canShare failed:',
          error
        );

      }

    }


    /**
     * 优先尝试原生 Web Share
     */
    if (
      window.isSecureContext
      && typeof navigator.share
        === 'function'
    ) {

      try {

        await navigator.share(data);

        return;

      } catch (error) {

        /*
         * 用户点击取消：
         * 属于正常操作，不弹备用面板。
         */
        if (
          error
          && error.name === 'AbortError'
        ) {

          return;

        }


        /*
         * 浏览器拒绝 / 不支持 / 权限问题
         */
        console.warn(
          '[EZHONG] navigator.share failed:',
          error
        );

        showFallbackSheet();

        return;

      }

    }


    /**
     * 浏览器完全不支持 Web Share
     */
    showFallbackSheet();

  }


  /**
   * =====================================================
   * 使用事件代理
   *
   * 比 document.querySelectorAll(...).forEach 可靠，
   * 即使未来按钮重新渲染也能正常工作。
   * =====================================================
   */
  document.addEventListener(
    'click',
    function (event) {

      const shareButton =
        event.target.closest(
          '[data-share-article]'
        );

      if (shareButton) {

        event.preventDefault();

        shareArticle();

        return;

      }


      const copyButton =
        event.target.closest(
          '[data-copy-article-link]'
        );

      if (copyButton) {

        event.preventDefault();

        copyArticleLink();

        return;

      }


      const closeButton =
        event.target.closest(
          '[data-close-share-layer]'
        );

      if (closeButton) {

        event.preventDefault();

        closeShareLayers();

      }

    }
  );


  /**
   * ESC 关闭
   */
  document.addEventListener(
    'keydown',
    function (event) {

      if (event.key === 'Escape') {

        closeShareLayers();

      }

    }
  );


  /**
   * 页面初始化日志
   *
   * 方便以后手机远程调试
   */
  console.info(
    '[EZHONG Share]',
    {
      secureContext:
        window.isSecureContext,

      webShare:
        typeof navigator.share ===
        'function',

      canShare:
        typeof navigator.canShare ===
        'function',

      clipboard:
        !!navigator.clipboard,

      wechat:
        isWeChat,

      wecom:
        isWeCom
    }
  );

})();
</script>
