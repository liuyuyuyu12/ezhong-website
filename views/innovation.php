<?php
declare(strict_types=1);

/**
 * 重点研发方向
 */
$directions = [
  [
    'icon' => 'fa-gears',
    'title' => '压力钢管智能制造',
    'description' => '围绕高强度钢板预弯、卷制、校圆、组装和焊接等关键工序，开展制造工艺优化、装备改进与数字化技术研究。',
    'items' => [
      '高强钢板卷制工艺优化',
      '大直径压力钢管成形控制',
      '板头预弯与回弹控制',
      '制造参数数字化管理',
    ],
  ],
  [
    'icon' => 'fa-industry',
    'title' => '复杂钢结构成形',
    'description' => '面向岔管、月牙肋、方变圆、风电塔筒及大型钢结构件，研究复杂构件成形、装配和工程制造技术。',
    'items' => [
      '岔管及月牙肋制造',
      '方变圆复杂构件成形',
      '风电塔筒筒体制造',
      '大型钢结构装配',
    ],
  ],
  [
    'icon' => 'fa-magnifying-glass-chart',
    'title' => '质量检测与过程控制',
    'description' => '围绕尺寸、圆度、焊缝和制造过程质量数据，开展检测方法、过程控制和质量追溯技术研究。',
    'items' => [
      '尺寸与圆度检测',
      '焊接质量控制',
      '无损检测技术应用',
      '全过程质量追溯',
    ],
  ],
  [
    'icon' => 'fa-microchip',
    'title' => '智能装备与数字化',
    'description' => '结合卷板、液压、焊接及大型构件制造设备，探索设备状态监测、工艺参数优化和数字化管理应用。',
    'items' => [
      '设备状态监测',
      '工艺参数智能优化',
      '生产数据采集分析',
      '制造过程数字化',
    ],
  ],
];

/**
 * 科研协作服务
 *
 * 注意：
 * 这里采用“科研协作”和“方法支持”的表述，
 * 不使用“论文代写”“项目代申报”等容易产生合规风险的表述。
 */
$researchServices = [
  [
    'icon' => 'fa-diagram-project',
    'title' => '科研选题与技术路线协作',
    'description' => '围绕压力钢管、大型钢结构、智能制造及工程装备领域，结合真实产业问题，为合作团队提供研究场景、技术需求和工程可行性建议。',
    'items' => [
      '产业技术需求梳理',
      '工程问题凝练',
      '技术路线可行性分析',
      '研究任务协同分解',
    ],
  ],
  [
    'icon' => 'fa-flask-vial',
    'title' => '试验设计与样件支持',
    'description' => '根据研究目标和制造条件，协助设计工程试验方案，并提供试验件、样件、结构件或样机加工制造支持。',
    'items' => [
      '试验方案工程化评估',
      '试验件与样件制造',
      '样机加工与装配',
      '现场试验条件协调',
    ],
  ],
  [
    'icon' => 'fa-chart-column',
    'title' => '数据采集与分析支持',
    'description' => '围绕制造过程、设备运行和质量检测数据，为科研合作提供数据采集方案、数据整理、指标分析和结果可视化支持。',
    'items' => [
      '数据采集方案设计',
      '试验数据整理',
      '工程指标分析',
      '图表与结果可视化',
    ],
  ],
  [
    'icon' => 'fa-file-lines',
    'title' => '技术成果材料规范化',
    'description' => '协助合作团队整理真实研发过程与工程验证结果，形成结构清晰、依据充分、可核验的技术报告和成果资料。',
    'items' => [
      '技术报告结构优化',
      '试验过程资料整理',
      '成果应用证明材料',
      '工程案例规范化呈现',
    ],
  ],
];

/**
 * 科技成果转化流程
 */
$transformationStages = [
  [
    'number' => '01',
    'icon' => 'fa-bullseye',
    'title' => '需求对接',
    'description' => '对接高校、科研院所及企业的科技成果，明确拟解决的产业问题和工程应用目标。',
  ],
  [
    'number' => '02',
    'icon' => 'fa-clipboard-check',
    'title' => '成果评估',
    'description' => '从技术成熟度、制造条件、成本、知识产权和应用场景等方面开展初步可行性分析。',
  ],
  [
    'number' => '03',
    'icon' => 'fa-cubes',
    'title' => '样件试制',
    'description' => '将实验室方案转化为可制造的结构、工艺或装备方案，完成试验件和原理样机试制。',
  ],
  [
    'number' => '04',
    'icon' => 'fa-flask',
    'title' => '中试熟化',
    'description' => '通过多轮试验、工艺优化和性能验证，提升成果的稳定性、可靠性和工程适用性。',
  ],
  [
    'number' => '05',
    'icon' => 'fa-screwdriver-wrench',
    'title' => '工程验证',
    'description' => '将技术方案引入真实制造过程或工程项目，验证质量、效率、安全性和应用价值。',
  ],
  [
    'number' => '06',
    'icon' => 'fa-rocket',
    'title' => '产业化应用',
    'description' => '根据验证结果推进新工艺、新装备、新产品或技术服务的推广和产业化应用。',
  ],
];

/**
 * 产学研合作模式
 */
$cooperationModes = [
  [
    'number' => '01',
    'icon' => 'fa-people-group',
    'title' => '联合技术攻关',
    'description' => '围绕具体工程难题，由企业、高校和科研团队共同制定技术路线、任务计划和验证方案。',
  ],
  [
    'number' => '02',
    'icon' => 'fa-building-columns',
    'title' => '校企科研合作',
    'description' => '共同开展横向课题、联合研发、研究生工程实践以及科研成果工程化验证。',
  ],
  [
    'number' => '03',
    'icon' => 'fa-industry',
    'title' => '中试与工程验证',
    'description' => '依托制造现场、设备和项目经验，为科研成果提供试制、测试、优化和应用验证条件。',
  ],
  [
    'number' => '04',
    'icon' => 'fa-handshake',
    'title' => '成果转化合作',
    'description' => '通过技术许可、合作开发、委托开发或联合产业化等方式推进成果落地。',
  ],
];

/**
 * 可形成或可承接的成果类型
 *
 * 这里不是宣称公司已经拥有这些成果，
 * 而是说明合作过程中可以形成的成果载体。
 */
$achievementTypes = [
  [
    'icon' => 'fa-certificate',
    'title' => '知识产权成果',
    'description' => '发明专利、实用新型专利、软件著作权及相关技术秘密。',
  ],
  [
    'icon' => 'fa-book',
    'title' => '工艺与标准成果',
    'description' => '制造工艺、作业指导书、企业标准、技术规范和质量控制方法。',
  ],
  [
    'icon' => 'fa-gears',
    'title' => '装备与产品成果',
    'description' => '试验装置、原理样机、工程样机、专用设备及新型钢结构产品。',
  ],
  [
    'icon' => 'fa-chart-line',
    'title' => '应用与示范成果',
    'description' => '工程应用案例、检测报告、用户应用证明及产业化示范项目。',
  ],
];
?>

<section class="bg-white">

  <!-- 顶部横幅 -->
  <header class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-primary to-slate-800 text-white">
    <div class="absolute inset-0 opacity-10" aria-hidden="true">
      <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full border border-white"></div>
      <div class="absolute -bottom-32 -left-20 h-96 w-96 rounded-full border border-white"></div>
    </div>

    <div class="container relative mx-auto px-4 py-20 md:py-28">

      <nav class="mb-6 text-sm text-white/70" aria-label="Breadcrumb">
        <a href="/?p=home" class="transition hover:text-white">
          首页
        </a>

        <span class="mx-2">/</span>

        <span class="text-white" aria-current="page">
          科技创新
        </span>
      </nav>

      <div class="max-w-4xl">
        <p class="mb-4 text-sm font-semibold tracking-[0.25em] text-white/75">
          TECHNOLOGY · RESEARCH · TRANSFORMATION
        </p>

        <h1 class="text-4xl font-extrabold leading-tight md:text-6xl">
          科技创新与成果转化
        </h1>

        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85 md:text-xl">
          围绕高强度压力钢管、复杂钢结构和智能制造技术，
          开展联合科研、工艺研发、试验验证、中试熟化与科技成果产业化合作。
        </p>

        <div class="mt-8 flex flex-wrap gap-4">
          <a
            href="#research-directions"
            class="rounded-lg bg-white px-6 py-3 font-semibold text-primary transition hover:bg-gray-100"
          >
            查看研发方向
          </a>

          <a
            href="#research-services"
            class="rounded-lg border border-white/50 px-6 py-3 font-semibold text-white transition hover:bg-white/10"
          >
            了解科研协作
          </a>

          <a
            href="#achievement-transformation"
            class="rounded-lg border border-white/50 px-6 py-3 font-semibold text-white transition hover:bg-white/10"
          >
            成果转化合作
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- 科技创新简介 -->
  <section class="py-16 md:py-20">
    <div class="container mx-auto px-4">
      <div class="mx-auto max-w-4xl text-center">
        <p class="text-sm font-semibold tracking-widest text-primary">
          INNOVATION CAPABILITY
        </p>

        <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
          以工程需求牵引科研创新
        </h2>

        <p class="mt-6 text-lg leading-8 text-gray-600">
          湖北鄂重建设工程有限公司立足压力钢管及大型钢结构制造业务，
          将工程项目中遇到的成形、焊接、装配、检测和质量控制问题，
          转化为科研课题、技术改进方向和成果转化应用场景。
        </p>

        <p class="mt-4 text-lg leading-8 text-gray-600">
          公司依托制造厂房、卷板设备、液压装备、焊接条件和工程项目经验，
          与高校、科研院所、技术团队及产业伙伴开展联合研究、
          样件试制、中试熟化和工程应用验证。
        </p>
      </div>
    </div>
  </section>

  <!-- 重点研发方向 -->
  <section id="research-directions" class="scroll-mt-24 bg-gray-50 py-16 md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-12 text-center">
        <p class="text-sm font-semibold tracking-widest text-primary">
          RESEARCH DIRECTIONS
        </p>

        <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
          重点研发方向
        </h2>

        <p class="mx-auto mt-4 max-w-2xl text-gray-600">
          聚焦主营业务中的真实工程问题，持续提升制造质量、生产效率和工程交付能力。
        </p>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <?php foreach ($directions as $direction): ?>
          <article class="rounded-2xl border border-gray-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-primary/10 text-primary">
              <i class="fa-solid <?= e($direction['icon']) ?> text-2xl"></i>
            </div>

            <h3 class="mt-6 text-2xl font-bold text-gray-900">
              <?= e($direction['title']) ?>
            </h3>

            <p class="mt-3 leading-7 text-gray-600">
              <?= e($direction['description']) ?>
            </p>

            <ul class="mt-5 grid grid-cols-1 gap-3 text-sm text-gray-700 sm:grid-cols-2">
              <?php foreach ($direction['items'] as $item): ?>
                <li class="flex items-start gap-2">
                  <i class="fa-solid fa-circle-check mt-1 text-accent"></i>
                  <span><?= e($item) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 科研协作服务 -->
  <section id="research-services" class="scroll-mt-24 py-16 md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-12 text-center">
        <p class="text-sm font-semibold tracking-widest text-primary">
          RESEARCH COLLABORATION
        </p>

        <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
          科研协作与工程支持
        </h2>

        <p class="mx-auto mt-4 max-w-3xl leading-7 text-gray-600">
          面向高校、科研院所、技术团队和产业客户，
          提供以真实工程需求、试验验证和成果落地为核心的科研协作支持。
        </p>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <?php foreach ($researchServices as $service): ?>
          <article class="rounded-2xl border border-gray-200 bg-white p-7 shadow-sm">

            <div class="flex items-start gap-5">
              <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-primary text-white shadow-sm">
                <i class="fa-solid <?= e($service['icon']) ?> text-xl"></i>
              </div>

              <div>
                <h3 class="text-xl font-bold text-gray-900">
                  <?= e($service['title']) ?>
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                  <?= e($service['description']) ?>
                </p>
              </div>
            </div>

            <ul class="mt-6 grid grid-cols-1 gap-3 border-t border-gray-100 pt-5 text-sm text-gray-700 sm:grid-cols-2">
              <?php foreach ($service['items'] as $item): ?>
                <li class="flex items-start gap-2">
                  <i class="fa-solid fa-check mt-1 text-accent"></i>
                  <span><?= e($item) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>

          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 成果转化流程 -->
  <section id="achievement-transformation" class="scroll-mt-24 bg-slate-900 py-16 text-white md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-12 text-center">
        <p class="text-sm font-semibold tracking-widest text-white/65">
          ACHIEVEMENT TRANSFORMATION
        </p>

        <h2 class="mt-3 text-3xl font-extrabold md:text-4xl">
          科技成果转化路径
        </h2>

        <p class="mx-auto mt-4 max-w-3xl leading-7 text-white/70">
          从科研成果和技术方案出发，通过评估、试制、中试和工程验证，
          推动成果转化为可应用的新技术、新工艺、新装备和新产品。
        </p>
      </div>

      <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($transformationStages as $stage): ?>
          <article class="relative rounded-2xl border border-white/10 bg-white/5 p-7 backdrop-blur-sm">

            <div class="flex items-center justify-between">
              <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 text-white">
                <i class="fa-solid <?= e($stage['icon']) ?> text-lg"></i>
              </div>

              <span class="text-4xl font-extrabold text-white/10">
                <?= e($stage['number']) ?>
              </span>
            </div>

            <h3 class="mt-6 text-xl font-bold">
              <?= e($stage['title']) ?>
            </h3>

            <p class="mt-3 leading-7 text-white/70">
              <?= e($stage['description']) ?>
            </p>

          </article>
        <?php endforeach; ?>
      </div>

      <div class="mt-10 text-center">
        <a
          href="/?p=home#contact"
          class="inline-flex items-center gap-2 rounded-lg bg-white px-7 py-3 font-semibold text-primary transition hover:bg-gray-100"
        >
          提交成果转化需求
          <i class="fa-solid fa-arrow-right-long"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- 工程技术能力 -->
  <section class="py-16 md:py-20">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">

        <div>
          <p class="text-sm font-semibold tracking-widest text-primary">
            ENGINEERING CAPABILITY
          </p>

          <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
            让科研成果进入真实工程场景
          </h2>

          <p class="mt-6 leading-8 text-gray-600">
            科技成果从实验室走向产业应用，需要经历结构设计、
            工艺适配、样件制造、性能测试、工艺优化和工程验证等阶段。
          </p>

          <p class="mt-4 leading-8 text-gray-600">
            公司可依托现有厂房、卷板设备、液压装备、焊接条件和项目实施经验，
            为相关技术提供试制、验证、改进和工程应用条件。
          </p>

          <div class="mt-8 space-y-5">

            <div class="flex items-start gap-4">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                <i class="fa-solid fa-compass-drafting"></i>
              </div>

              <div>
                <h3 class="font-bold text-gray-900">
                  工程方案协同
                </h3>

                <p class="mt-1 leading-6 text-gray-600">
                  结合制造条件、材料性能和工程要求，对科研方案的可制造性与可实施性进行分析。
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                <i class="fa-solid fa-flask"></i>
              </div>

              <div>
                <h3 class="font-bold text-gray-900">
                  试验与试制
                </h3>

                <p class="mt-1 leading-6 text-gray-600">
                  为工艺研究、构件制造和装备开发提供试验件、功能样机和工程样件试制支持。
                </p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                <i class="fa-solid fa-chart-line"></i>
              </div>

              <div>
                <h3 class="font-bold text-gray-900">
                  工程应用验证
                </h3>

                <p class="mt-1 leading-6 text-gray-600">
                  通过真实制造过程和工程应用检验技术方案的稳定性、效率、成本和应用价值。
                </p>
              </div>
            </div>

          </div>
        </div>

        <div class="overflow-hidden rounded-2xl bg-gray-100 shadow-lg">
          <img
            src="https://static.ezhong.co/assets/images/鄂重航拍图片_压缩.png?x-oss-process=image/format,webp/interlace,1"
            alt="湖北鄂重建设工程有限公司科研成果工程验证与制造场景"
            class="h-full min-h-[420px] w-full object-cover"
            loading="lazy"
            decoding="async"
          >
        </div>

      </div>
    </div>
  </section>

  <!-- 产学研合作模式 -->
  <section class="bg-gray-50 py-16 md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-12 text-center">
        <p class="text-sm font-semibold tracking-widest text-primary">
          COOPERATION
        </p>

        <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
          产学研合作模式
        </h2>

        <p class="mx-auto mt-4 max-w-3xl leading-7 text-gray-600">
          根据技术成熟度、合作目标和知识产权情况，
          灵活采用联合研发、委托开发、工程验证或成果转化等合作方式。
        </p>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($cooperationModes as $mode): ?>
          <article class="rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

            <div class="flex items-center justify-between">
              <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary/10 text-primary">
                <i class="fa-solid <?= e($mode['icon']) ?> text-xl"></i>
              </div>

              <div class="text-4xl font-extrabold text-primary/10">
                <?= e($mode['number']) ?>
              </div>
            </div>

            <h3 class="mt-6 text-xl font-bold text-gray-900">
              <?= e($mode['title']) ?>
            </h3>

            <p class="mt-3 leading-7 text-gray-600">
              <?= e($mode['description']) ?>
            </p>

          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 可形成的成果类型 -->
  <section class="py-16 md:py-20">
    <div class="container mx-auto px-4">

      <div class="mb-12 text-center">
        <p class="text-sm font-semibold tracking-widest text-primary">
          ACHIEVEMENT TYPES
        </p>

        <h2 class="mt-3 text-3xl font-extrabold text-gray-900 md:text-4xl">
          科研与转化成果载体
        </h2>

        <p class="mx-auto mt-4 max-w-3xl leading-7 text-gray-600">
          根据合作项目的实际研发内容，可形成知识产权、工艺标准、
          样机装备、工程应用和产业化示范等成果。
        </p>
      </div>

      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($achievementTypes as $achievement): ?>
          <article class="rounded-2xl border border-gray-200 bg-white p-7 text-center shadow-sm">

            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary">
              <i class="fa-solid <?= e($achievement['icon']) ?> text-xl"></i>
            </div>

            <h3 class="mt-5 text-lg font-bold text-gray-900">
              <?= e($achievement['title']) ?>
            </h3>

            <p class="mt-3 leading-7 text-gray-600">
              <?= e($achievement['description']) ?>
            </p>

          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 当前成果建设 -->
  <section class="bg-gray-50 py-16 md:py-20">
    <div class="container mx-auto px-4">
      <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm md:p-12">

        <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-3">

          <div class="lg:col-span-2">
            <p class="text-sm font-semibold tracking-widest text-primary">
              TECHNOLOGY ACHIEVEMENTS
            </p>

            <h2 class="mt-3 text-3xl font-extrabold text-gray-900">
              技术成果持续建设与更新
            </h2>

            <p class="mt-5 leading-8 text-gray-600">
              公司将结合实际研发和项目应用情况，持续整理和公开专利、
              工艺成果、技术标准、科研项目、样机装备及产学研合作成果。
            </p>

            <p class="mt-3 leading-8 text-gray-600">
              所有公开成果均以真实、可核验的技术资料、知识产权文件、
              试验记录或工程应用材料为依据。
            </p>
          </div>

          <div class="flex justify-start lg:justify-end">
            <a
              href="/?p=home#contact"
              class="inline-flex items-center gap-2 rounded-lg bg-primary px-6 py-3 font-semibold text-white transition hover:bg-blue-800"
            >
              <i class="fa-solid fa-paper-plane"></i>
              联系技术团队
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- 科研诚信与服务边界 -->
  <section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
      <div class="rounded-2xl border border-amber-200 bg-amber-50 p-7 md:p-9">

        <div class="flex flex-col gap-5 md:flex-row md:items-start">

          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
            <i class="fa-solid fa-shield-halved text-xl"></i>
          </div>

          <div>
            <h2 class="text-xl font-bold text-gray-900">
              科研诚信与服务边界
            </h2>

            <p class="mt-3 leading-7 text-gray-700">
              公司提供工程技术咨询、科研协作、试验验证、数据分析方法支持、
              技术资料规范化和科技成果转化服务。
            </p>

            <p class="mt-2 leading-7 text-gray-700">
              不提供论文或项目申请书代写，不伪造、篡改研究数据，
              不承诺论文发表、项目立项、成果鉴定或奖项结果。
            </p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- 底部合作入口 -->
  <section class="bg-primary py-14 text-white">
    <div class="container mx-auto px-4">

      <div class="flex flex-col items-start justify-between gap-8 lg:flex-row lg:items-center">

        <div>
          <p class="text-sm font-semibold tracking-widest text-white/70">
            COOPERATE WITH US
          </p>

          <h2 class="mt-3 text-3xl font-extrabold">
            寻找科研合作与成果转化伙伴
          </h2>

          <p class="mt-4 max-w-3xl leading-7 text-white/80">
            欢迎高校、科研院所、技术团队及产业客户，
            围绕压力钢管、大型钢结构、智能装备和工程制造技术开展合作。
          </p>
        </div>

        <div class="flex shrink-0 flex-wrap gap-4">
          <a
            href="/?p=home#contact"
            class="inline-flex items-center gap-2 rounded-lg bg-white px-6 py-3 font-semibold text-primary transition hover:bg-gray-100"
          >
            提交合作需求
            <i class="fa-solid fa-arrow-right-long"></i>
          </a>

          <a
            href="tel:13972950821"
            class="inline-flex items-center gap-2 rounded-lg border border-white/40 px-6 py-3 font-semibold text-white transition hover:bg-white/10"
          >
            <i class="fa-solid fa-phone"></i>
            联系技术团队
          </a>
        </div>

      </div>
    </div>
  </section>

</section>