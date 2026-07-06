<?php
// /views/data/news.php
// 说明：键名是 slug，用于拼接 /?p=news&slug=xxx
return [
  '20241118-pingtanyuan-zhongbiao' => [
    'title'    => '湖北鄂重建设工程有限公司中标葛洲坝二公司平坦原项目压力钢管制作工程',
    'date'     => '2024-11-18',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/中标通知书.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '收到中国葛洲坝集团第二工程有限公司《中标通知书》，标志着我司在高强度压力钢管领域的综合实力与履约能力再次获权威认可。',
    // 旧页直接 include，保留你现有样式
    'view'     => __DIR__ . '/../news_20241118平坦原中标.php',
  ],

  '20250128-gezhouba-warmth' => [
    'title'    => '葛洲坝集团临近春节开展“送温暖到一线”活动',
    'date'     => '2025-01-28',
    'category' => '公司关怀',
    'cover'    => 'https://static.ezhong.co/assets/images/news/春节送温暖-封面.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '春节将至，慰问物资与关怀直达一线，暖心保障安全生产。',
    'view'     => __DIR__ . '/../news_葛洲坝临近春节送温暖.php',
  ],

  '20250206-ezhong-opening-ceremony' => [
    'title'    => '鄂重建设新年开业仪式｜舞狮迎新 合影同庆',
    'date'     => '2025-02-06',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/新年开业-封面.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '醒狮点睛、歌舞助兴、嘉宾致辞，现场氛围热烈，精彩瞬间一图尽览。',
    'view'     => __DIR__ . '/../news_鄂重建设新年开业仪式.php',
  ],
  
    '20250825-fengxin-zhongbiao' => [
    'title'    => '湖北鄂重建设工程有限公司中标葛洲坝二公司奉新项目压力钢管制作及安装工程',
    'date'     => '2025-08-25',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/江西奉新中标通知书.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '深入合作！收到中国葛洲坝集团第二工程有限公司《中标通知书》，持续赋能抽水蓄能。',
    // 旧页直接 include，保留你现有样式
    'view'     => __DIR__ . '/../news_20250825奉新中标.php',
  ],
];
