<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$videoId = isset($_GET['videoId']) ? trim((string)$_GET['videoId']) : '';
if ($videoId === '') { http_response_code(400); echo json_encode(['error'=>'bad_request','message'=>'missing videoId']); exit; }

$vod   = include __DIR__ . '/../config/vod.php';      // regionId/authTimeout/endpoint
$akcfg = include __DIR__ . '/../config/aliyun.php';   // ak/sk
require __DIR__ . '/../vendor/autoload.php';

try {
  // ✅ 用 Darabonba 的 Config
  $config = new \Darabonba\OpenApi\Models\Config([
    'accessKeyId'     => $akcfg['ak'],
    'accessKeySecret' => $akcfg['sk'],
    'endpoint'        => $vod['endpoint'],  // vod.cn-shanghai.aliyuncs.com
    'regionId'        => $vod['regionId'],  // cn-shanghai
  ]);

  // ✅ Vod 客户端这样 new
  $client = new \AlibabaCloud\SDK\Vod\V20170321\Vod($config);

  $req = new \AlibabaCloud\SDK\Vod\V20170321\Models\GetVideoPlayAuthRequest([
    'videoId'         => $videoId,
    'authInfoTimeout' => $vod['authTimeout'] ?? 900,
  ]);

  $resp = $client->getVideoPlayAuth($req)->body;

  echo json_encode([
    'playAuth' => $resp->playAuth ?? null,
    'meta'     => [
      'title'    => $resp->videoMeta->title ?? null,
      'duration' => $resp->videoMeta->duration ?? null,
      'cover'    => $resp->videoMeta->coverURL ?? null,
    ],
  ], JSON_UNESCAPED_UNICODE);

} catch (\Throwable $e) {
  http_response_code(500);
  echo json_encode(['error'=>'server_error','message'=>$e->getMessage()], JSON_UNESCAPED_UNICODE);
}
