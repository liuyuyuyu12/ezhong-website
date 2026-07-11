<?php
declare(strict_types=1);

function e(string|int|float|null $value): string {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function site_url(string $page = 'home', array $params = []): string {
  $query = array_merge(['p' => $page], $params);
  return '/?' . http_build_query($query);
}

function static_asset(string $path): string {
  return 'https://static.ezhong.co/' . ltrim($path, '/');
}

function local_asset(string $path): string {
  return '/' . ltrim($path, '/');
}

function render_404(string $viewsDir): void {
  http_response_code(404);
  include $viewsDir . '/404.php';
}