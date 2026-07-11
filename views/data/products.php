<?php
declare(strict_types=1);

/**
 * /views/data/products.php
 *
 * 键名是产品 slug，用于生成：
 * /?p=product&slug=xxx
 *
 * 字段说明：
 * - slug: 产品标识，建议与数组键名一致
 * - name: 产品名称
 * - category: 产品分类
 * - cover: 封面图
 * - summary: 首页卡片/详情页顶部摘要
 * - featured: 是否在首页产品区展示
 * - sort: 首页排序，数字越小越靠前
 * - images: 产品图集
 * - meta: 项目信息、业主单位、施工内容等参数
 */

return [

  // 1. HZW11S-180×3200 三辊卷板机
  'hzw11s-180x3200' => [
    'slug'     => 'hzw11s-180x3200',
    'name'     => 'HZW11S-180×3200 全液压微控变中心距三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '中国葛洲坝集团二公司罗田平坦原抽水蓄能电站项目',
    'featured' => true,
    'sort'     => 10,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-2.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-3.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/HZW11S-180×3200 全液压微控变中心距三辊卷板机-4.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'project' => '中国葛洲坝集团二公司罗田平坦原抽水蓄能电站项目',
      'owner'   => '中国葛洲坝集团第二工程有限公司',
      'scope'   => '800MPa压力管道',
    ],
  ],

  // 2. Y32-50000KN 钢板板头预弯油压机
  'y32-50000kn' => [
    'slug'     => 'y32-50000kn',
    'name'     => 'Y32-50000KN 钢板板头预弯油压机',
    'category' => '油压机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '中国葛洲坝集团二公司张掖抽水蓄能电站项目',
    'featured' => true,
    'sort'     => 20,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机-2.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/Y32-50000KN钢板板头预弯油压机-3.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'project' => '中国葛洲坝集团二公司张掖抽水蓄能电站项目',
      'owner'   => '中国葛洲坝集团第二工程有限公司',
      'scope'   => '800MPa压力管道',
    ],
  ],

  // 3. W11-50×2500 对称式三辊卷板机
  'w11-50x2500' => [
    'slug'     => 'w11-50x2500',
    'name'     => 'W11-50×2500 对称式三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '菲律宾良安水电站压力钢管项目',
    'featured' => true,
    'sort'     => 30,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机-2.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11-502500对称式三辊卷板机-3.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'project' => '菲律宾良安水电站压力钢管项目',
      'owner'   => '中铁二十一局集团有限公司',
      'scope'   => '水电站项目主体 (800MPa 压力管道)',
    ],
  ],

  // 4. W11S-200×4500 微控液压水平下调式三辊卷板机
  'w11s-200x4500' => [
    'slug'     => 'w11s-200x4500',
    'name'     => 'W11S-200×4500 微控液压水平下调式三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '风力发电大直径钢管制作',
    'featured' => true,
    'sort'     => 40,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11S-200×4500微控液压水平下调式三辊卷板机-4.jpg?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '湘潭永达机械制造股份有限公司',
      'scope' => '风力发电大直径钢管制作',
    ],
  ],

  // 5. W11-25X4300mm 智能型三辊卷板机
  'w11-25x4300' => [
    'slug'     => 'w11-25x4300',
    'name'     => 'W11-25X4300mm 智能型三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '大型中央空调风管制作',
    'featured' => true,
    'sort'     => 50,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机.jpg?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11-25X4300mm智能型三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '重庆美的通用制冷设备有限公司',
      'scope' => '大型中央空调风管',
    ],
  ],

  // 6. XW11S-270×4000 水平下调式三辊卷板机
  'xw11s-270x4000' => [
    'slug'     => 'xw11s-270x4000',
    'name'     => 'XW11S-270×4000 水平下调式三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '高强度钢板（压力容器）制作',
    'featured' => true,
    'sort'     => 60,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/XW11S-270×4000水平下调式三辊卷板机-4.png?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '张家港锦隆化工机械有限公司',
      'scope' => '高强度钢板（压力容器）制作',
    ],
  ],

  // 7. W11S 系列上缸机械驱动三辊卷板机
  'w11s-series-upper-driven' => [
    'slug'     => 'w11s-series-upper-driven',
    'name'     => 'W11S 系列上缸机械驱动三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '石油化工压力容器制作',
    'featured' => true,
    'sort'     => 70,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/W11S 系列上缸机械驱动三辊卷板机-3.png?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '南京宝色股份公司',
      'scope' => '石油化工压力容器',
    ],
  ],

  // 8. HZW11S-120×4200 微控液压卧式下调式三辊卷板机
  'hzw11s-120x4200' => [
    'slug'     => 'hzw11s-120x4200',
    'name'     => 'HZW11S-120×4200 微控液压卧式下调式三辊卷板机',
    'category' => '三辊卷板机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/HZW11S-120×4200微控液压卧式下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '海洋风力发电筒体制作',
    'featured' => true,
    'sort'     => 80,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/HZW11S-120×4200微控液压卧式下调式三辊卷板机.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/HZW11S-120×4200微控液压卧式下调式三辊卷板机-2.png?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '江苏海恒风电设备制造有限公司',
      'scope' => '海洋风力发电筒体制作',
    ],
  ],

  // 9. 油压机
  'hydraulic-press-oil' => [
    'slug'     => 'hydraulic-press-oil',
    'name'     => '油压机',
    'category' => '油压机',
    'cover'    => 'https://static.ezhong.co/assets/images/products/油压机.png?x-oss-process=image/format,webp/interlace,1',
    'summary'  => '钢结构制作',
    'featured' => true,
    'sort'     => 90,
    'images'   => [
      'https://static.ezhong.co/assets/images/products/油压机.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/油压机-2.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/油压机-3.png?x-oss-process=image/format,webp/interlace,1',
      'https://static.ezhong.co/assets/images/products/油压机-4.png?x-oss-process=image/format,webp/interlace,1',
    ],
    'meta' => [
      'owner' => '江苏沪宁钢机股份有限公司',
      'scope' => '钢结构',
    ],
  ],

];