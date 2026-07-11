<?php
declare(strict_types=1);

/**
 * /views/data/news.php
 *
 * 键名就是新闻 slug，用于生成：
 * /?p=news&slug=xxx
 *
 * 字段说明：
 * - slug: 新闻标识，建议与数组键名一致
 * - title: 新闻标题
 * - date: 发布日期，建议统一 YYYY-MM-DD
 * - category: 新闻分类
 * - cover: 封面图地址
 * - summary: 列表页/首页摘要
 * - featured: 是否在首页新闻区展示
 * - sort: 排序值，越大越靠前
 * - view: 旧式详情页文件；如果有复杂图文详情，继续保留
 */

return [
    
  '20260707-midyear-production-operation-summary' => [
    'slug'     => '20260707-midyear-production-operation-summary',
    'title'    => '湖北鄂重建设工程有限公司马年年中生产经营总结会议',
    'date'     => '2026-07-07',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/湖北鄂重建设工程有限公司马年年中生产经营总结会议.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '湖北鄂重建设工程有限公司召开马年年中生产经营总结会议，系统回顾上半年生产经营工作，分析当前重点任务，并对下半年项目履约、安全质量、市场拓展和经营管理工作作出安排。',
    'featured' => true,
    'sort'     => 20260707,
    'view'     => __DIR__ . '/../news_20260707-湖北鄂重建设工程有限公司马年年中生产经营总结会议.php',
  ],
  
  'sanxia-lingdaoshicha' => [
    'slug'     => 'sanxia-lingdaoshicha',
    'title'    => '中国三峡-湖北能源领导视察罗田平坦原压力钢管厂',
    'date'     => '2026-07-06',
    'category' => '项目动态',
    'cover'    => 'https://static.ezhong.co/assets/images/news/中国三峡-湖北能源领导视察罗田平坦原压力钢管厂.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '中国三峡、湖北能源相关领导到罗田平坦原压力钢管厂视察指导，深入了解压力钢管制作现场、生产组织与质量管控情况。',
    'featured' => true,
    'sort'     => 20260706,
    'view'     => __DIR__ . '/../news_中国三峡湖北能源领导视察罗田平坦原压力钢管厂.php',
  ],
  
  '20241118-pingtanyuan-zhongbiao' => [
    'slug'     => '20241118-pingtanyuan-zhongbiao',
    'title'    => '湖北鄂重建设工程有限公司中标葛洲坝二公司平坦原项目压力钢管制作工程',
    'date'     => '2024-11-18',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/中标通知书.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '收到中国葛洲坝集团第二工程有限公司《中标通知书》，标志着我司在高强度压力钢管领域的综合实力与履约能力再次获权威认可。',
    'featured' => true,
    'sort'     => 20241118,
    'view'     => __DIR__ . '/../news_20241118平坦原中标.php',
  ],

  '20250128-gezhouba-warmth' => [
    'slug'     => '20250128-gezhouba-warmth',
    'title'    => '葛洲坝集团临近春节开展“送温暖到一线”活动',
    'date'     => '2025-01-28',
    'category' => '公司关怀',
    'cover'    => 'https://static.ezhong.co/assets/images/news/春节送温暖-封面.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '春节将至，慰问物资与关怀直达一线，暖心保障安全生产。',
    'featured' => true,
    'sort'     => 20250128,
    'view'     => __DIR__ . '/../news_葛洲坝临近春节送温暖.php',
  ],

  '20250206-ezhong-opening-ceremony' => [
    'slug'     => '20250206-ezhong-opening-ceremony',
    'title'    => '鄂重建设新年开业仪式｜舞狮迎新 合影同庆',
    'date'     => '2025-02-06',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/新年开业-封面.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '醒狮点睛、歌舞助兴、嘉宾致辞，现场氛围热烈，精彩瞬间一图尽览。',
    'featured' => true,
    'sort'     => 20250206,
    'view'     => __DIR__ . '/../news_鄂重建设新年开业仪式.php',
  ],

  '20250825-fengxin-zhongbiao' => [
    'slug'     => '20250825-fengxin-zhongbiao',
    'title'    => '湖北鄂重建设工程有限公司中标葛洲坝二公司奉新项目压力钢管制作及安装工程',
    'date'     => '2025-08-25',
    'category' => '公司新闻',
    'cover'    => 'https://static.ezhong.co/assets/images/news/江西奉新中标通知书1.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '深入合作！收到中国葛洲坝集团第二工程有限公司《中标通知书》，持续赋能抽水蓄能。',
    'featured' => true,
    'sort'     => 20250825,
    'view'     => __DIR__ . '/../news_20250825奉新中标.php',
  ],
];