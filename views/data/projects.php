<?php
declare(strict_types=1);

/**
 * /views/data/projects.php
 *
 * 键名是案例 slug，用于生成：
 * /?p=project&slug=xxx
 *
 * 字段说明：
 * - slug: 案例标识，建议与数组键名一致
 * - name: 案例名称
 * - category: 案例分类
 * - cover: 封面图
 * - summary: 首页卡片/详情页顶部摘要
 * - featured: 是否在首页案例区展示
 * - sort: 首页排序，数字越小越靠前
 * - images: 案例图集
 */

return [

    // 中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作
  'fangbianyuan-luotian' => [
    'slug'     => 'fangbianyuan-luotian',
    'name'     => '中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作',
    'category' => '抽水蓄能',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '为中国葛洲坝集团罗田平坦原抽水蓄能水电站制作的方变圆。',
    'featured' => true,
    'sort'     => 8,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作-1.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作-2.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作-3.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作-4.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团罗田平坦原抽水蓄能水电站的方变圆制作-5.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
  ],
    
    
    // 中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作
  'chaguan-fengxin' => [
    'slug'     => 'chaguan-fengxin',
    'name'     => '中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作',
    'category' => '抽水蓄能',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '为中国葛洲坝集团奉新抽水蓄能水电站制作的岔管。',
    'featured' => true,
    'sort'     => 9,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-1.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-2.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-3.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-4.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-5.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-6.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-7.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团江西奉新抽水蓄能水电站岔管制作-8.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
  ],
  
  
  // 1. 中国葛洲坝集团二公司罗田平坦原抽水蓄能
  'pingtanyuan' => [
    'slug'     => 'pingtanyuan',
    'name'     => '中国葛洲坝集团二公司罗田平坦原抽水蓄能',
    'category' => '抽水蓄能',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '压力钢管制作及安装项目；项目包括高强度压力钢管的设计、制造和安装。',
    'featured' => true,
    'sort'     => 10,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-4.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/中国葛洲坝集团二公司罗田平坦原抽水蓄能-5.png?x-oss-process=image/format,webp/interlace,1',
    ],
  ],

  // 2. 菲律宾良安水电站
  'liangan' => [
    'slug'     => 'liangan',
    'name'     => '菲律宾良安水电站',
    'category' => '水电站',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '压力钢管生产及安装项目；包括全套压力钢管的设计、制造和安装。',
    'featured' => true,
    'sort'     => 20,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-4.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-5.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-6.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-7.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-8.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-9.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-10.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/菲律宾良安水电站-11.png?x-oss-process=image/format,webp/interlace,1',
    ],
  ],

  // 3. 重庆蟠龙水电站
  'panlong' => [
    'slug'     => 'panlong',
    'name'     => '重庆蟠龙水电站',
    'category' => '水电站',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/重庆蟠龙水电站.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '岔管及部分钢管项目；复杂地形条件下的岔管设计与制造。',
    'featured' => true,
    'sort'     => 30,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/重庆蟠龙水电站.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/重庆蟠龙水电站-2.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
  ],

  // 4. 汉十高铁钢管拱桥
  'han10-bridge' => [
    'slug'     => 'han10-bridge',
    'name'     => '汉十高铁钢管拱桥',
    'category' => '钢结构桥梁',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '大型钢结构桥梁项目；高强度钢管拱桥的设计与施工。',
    'featured' => true,
    'sort'     => 40,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-4.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-5.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-6.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/汉十高铁钢管拱桥-7.png?x-oss-process=image/format,webp/interlace,1',
    ],
  ],

  // 5. 岔管及月牙板制作现场
  'pingtanyuan_chaguan' => [
    'slug'     => 'pingtanyuan_chaguan',
    'name'     => '岔管及月牙板制作现场',
    'category' => '抽水蓄能',
    'cover'    => 'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '平坦原岔管及月牙板制作现场。',
    'featured' => true,
    'sort'     => 50,
    'images'   => [
      'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-4.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/examples/罗田平坦原平坦原岔管及月牙板制作现场图片-5.png?x-oss-process=image/format,webp/interlace,1',
    ],
  ],

];