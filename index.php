<?php
declare(strict_types=1);

$root      = __DIR__;
$views_dir = $root . '/views';

// 读取 ?p=，默认 home
$page = isset($_GET['p']) && $_GET['p'] !== '' ? trim($_GET['p']) : 'home';

// 允许访问的视图（按照你真的存在的文件来列）
$allowed = ['home','product','project','news','factory','contact','about','404','news_20241118平坦原中标','news_葛洲坝临近春节送温暖','news_鄂重建设新年开业仪式','news_20250825奉新中标'];

// 计算视图文件
$view_file = $views_dir . '/' . $page . '.php';

error_log("DEBUG views_dir = " . $views_dir);
error_log("DEBUG want page = " . $page);
error_log("DEBUG view_file = " . $view_file . ' | exists? ' . (is_file($view_file) ? 'YES' : 'NO'));
if (!is_file($view_file)) {
  error_log("DEBUG scandir(views) = " . implode(', ', scandir($views_dir)));
}

// 不在白名单或文件不存在 -> 404
if (!in_array($page, $allowed, true) || !is_file($view_file)) {
  http_response_code(404);           // ← 新增
  $page      = '404';
  $view_file = $views_dir . '/404.php';
  error_log('MISS VIEW: ' . $view_file);
}

// 传给 layout.php 用
$current_page = $page;        // 导航高亮
$current_section = in_array($page, ['product','project'], true)
  ? ($page === 'product' ? 'products' : 'projects')
  : $page;



$content_view = $view_file;   // 正文视图的绝对路径

// 让视图能拿到 slug（如 /?p=product&slug=hzw11s-180x3200）
$slug = isset($_GET['slug']) ? trim((string)$_GET['slug']) : null;


include $views_dir . '/layout.php';





