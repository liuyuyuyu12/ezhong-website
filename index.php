<?php
declare(strict_types=1);

$root = __DIR__;
$views_dir = $root . '/views';

require_once $root . '/includes/helpers.php';

$page = isset($_GET['p']) && $_GET['p'] !== '' ? trim((string)$_GET['p']) : 'home';
$slug = isset($_GET['slug']) ? trim((string)$_GET['slug']) : null;

$allowed = ['home', 'product', 'project', 'news', 'factory', 'contact', 'about', '404'];

$title = '湖北鄂重建设工程有限公司 - 专业压力钢管制造与安装';
$description = '湖北鄂重建设工程有限公司，专业从事新能源行业风电塔筒、水电压力钢管等高强度钢结构的设计、制造和安装服务。';

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
$current_section = in_array($page, ['product', 'project'], true)
  ? ($page === 'product' ? 'products' : 'projects')
  : $page;
$content_view = $view_file;

include $views_dir . '/layout.php';