<?php
// config/vod.php
return [
  'regionId'    => 'cn-shanghai', // 你的 VOD 区域，一般 cn-shanghai
  'authTimeout' => 900,           // 播放凭证有效期（秒），100~3000
  'endpoint'    => 'vod.cn-shanghai.aliyuncs.com', // 显式指定更稳
];
