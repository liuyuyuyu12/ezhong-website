<?php
declare(strict_types=1);

$root = __DIR__;
$views_dir = $root . '/views';

require_once $root . '/includes/helpers.php';

$page = isset($_GET['p']) && $_GET['p'] !== '' ? trim((string)$_GET['p']) : 'home';
$slug = isset($_GET['slug']) ? trim((string)$_GET['slug']) : null;

$allowed = [
  'home',
  'about',
  'product',
  'project',
  'innovation',
  'technical',
  'technical-article',
  'news',
  'factory',
  'contact',
  '404',
];

$title = '湖北鄂重建设工程有限公司 - 专业压力钢管制造与安装';
$description = '湖北鄂重建设工程有限公司，专业从事新能源行业风电塔筒、水电压力钢管等高强度钢结构的设计、制造和安装服务。';
$canonical = 'https://ezhong.co/';
$og_image = 'https://static.ezhong.co/assets/images/logo-ezhong.png';

if (!in_array($page, $allowed, true)) {
  http_response_code(404);
  $page = '404';
}

if ($page === 'product' && $slug) {
  $products = require $views_dir . '/data/products.php';
  if (isset($products[$slug])) {
    $title = $products[$slug]['name'] . ' - 湖北鄂重建设工程有限公司';
    $description = $products[$slug]['summary'] ?? ($products[$slug]['meta']['project'] ?? $description);
  }
}

if ($page === 'project' && $slug) {
  $projects = require $views_dir . '/data/projects.php';
  if (isset($projects[$slug])) {
    $title = $projects[$slug]['name'] . ' - 湖北鄂重建设工程有限公司';
    $description = $projects[$slug]['summary'] ?? $description;
  }
}

if ($page === 'innovation') {
  $title = '科技创新 - 湖北鄂重建设工程有限公司';
  $description = '湖北鄂重建设工程有限公司围绕压力钢管智能制造、复杂钢结构成形、焊接工艺、质量检测与产学研合作开展技术创新。';
}

if ($page === 'technical') {
  $title = '技术专栏 - 压力钢管、卷板成形与智能制造技术｜湖北鄂重';
  $description = '湖北鄂重技术专栏，分享压力钢管、三辊卷板、高强钢成形、焊接检测、抽水蓄能及智能制造等工程技术知识与实践经验。';
  $canonical = 'https://ezhong.co/?p=technical';
}

if ($page === 'technical-article') {
  $technical_articles = require $views_dir . '/data/technical-articles.php';

  if (!$slug || !isset($technical_articles[$slug])) {
    http_response_code(404);
    $page = '404';

    $title = '页面不存在 - 湖北鄂重建设工程有限公司';
    $description = '您访问的技术文章不存在或已调整。';
    $canonical = 'https://ezhong.co/?p=404';
  } else {
    $technical_article = $technical_articles[$slug];

    $title = $technical_article['meta_title']
      ?? ($technical_article['title'] . '｜湖北鄂重');

    $description = $technical_article['meta_description']
      ?? ($technical_article['summary'] ?? $description);

    $canonical =
      'https://ezhong.co/?p=technical-article&slug='
      . rawurlencode($slug);

    $og_image = $technical_article['cover'] ?? $og_image;
  }
}

if ($page === 'news' && $slug) {
  $news = require $views_dir . '/data/news.php';
  if (isset($news[$slug])) {
    $title = $news[$slug]['title'] . ' - 湖北鄂重建设工程有限公司';
    $description = $news[$slug]['summary'] ?? $description;
  }
}

$view_file = $views_dir . '/' . $page . '.php';
if (!is_file($view_file)) {
  http_response_code(404);
  $page = '404';
  $view_file = $views_dir . '/404.php';
}

$current_page = $page;
if ($page === 'product') {
  $current_section = 'products';
} elseif ($page === 'project') {
  $current_section = 'projects';
} elseif ($page === 'technical-article') {
  $current_section = 'technical';
} else {
  $current_section = $page;
}
$content_view = $view_file;

include $views_dir . '/layout.php';