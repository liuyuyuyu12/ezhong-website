<?php
declare(strict_types=1);

$images = $item['images'] ?? [];

$prebendingArticleUrl = site_url(
  'technical-article',
  [
    'slug' =>
      'three-roll-bending-edge-prebending',
  ]
);

$springbackArticleUrl = site_url(
  'technical-article',
  [
    'slug' =>
      'high-strength-steel-roll-bending-springback',
  ]
);

$pingtanyuanProjectUrl = site_url(
  'project',
  ['slug' => 'pingtanyuan']
);

$transitionProjectUrl = site_url(
  'project',
  ['slug' => 'fangbianyuan-luotian']
);

$branchProjectUrl = site_url(
  'project',
  ['slug' => 'chaguan-fengxin']
);
?>

<div class="space-y-8">

  <!-- =====================================================
       导语
       ===================================================== -->

  <p>
    在抽水蓄能电站中，
    压力钢管承担着高压输水的重要任务。
    从上水库到地下厂房，
    水流需要经过上平洞、斜井、下平洞、钢岔管和高压支管等不同部位，
    压力钢管及钢岔管长期承受内水压力、
    水锤以及机组工况转换产生的循环荷载。
  </p>

  <p>
    随着抽水蓄能工程向
    <strong>高水头、大容量、大直径</strong>
    方向发展，
    600 MPa、800 MPa 级高强钢已经越来越多地应用于
    压力钢管和钢岔管，
    更高强度等级材料也开始进入实际工程应用。
  </p>

  <p>
    但高强钢压力钢管并不是简单地把一张钢板
    “卷成圆筒”。
    从原材料进场到最终安装在地下洞室，
    通常需要经历材料检验、数控下料、坡口加工、
    板头预弯、卷制、组圆、纵缝焊接、
    加劲环及附件安装、大节组装、环缝焊接、
    无损检测、防腐、运输和现场安装等多个环节。
  </p>

  <div
    class="rounded-xl border-l-4 border-primary bg-blue-50 px-6 py-5 leading-8 text-gray-800"
  >
    <strong>
      对高强钢压力钢管而言，
      材料性能、成形精度、焊接质量和安装精度
      并不是彼此独立的四件事，
      而是一个前后关联的完整制造安装体系。
    </strong>
  </div>


  <!-- =====================================================
       全流程图
       ===================================================== -->

  <?php if (!empty($images['process_flow']['url'])): ?>

    <?php $image = $images['process_flow']; ?>

    <figure class="my-10">

      <a
        href="<?= e($image['url']) ?>"
        class="article-image-zoom block overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
        data-pswp-width="<?= e((string)$image['width']) ?>"
        data-pswp-height="<?= e((string)$image['height']) ?>"
        aria-label="查看大图：<?= e($image['alt']) ?>"
      >

        <img
          src="<?= e($image['url']) ?>"
          alt="<?= e($image['alt']) ?>"
          class="h-auto w-full"
          loading="lazy"
          decoding="async"
        >

        <span class="zoom-hint">
          <i class="fa-solid fa-magnifying-glass-plus"></i>
          查看大图
        </span>

      </a>

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图1 抽水蓄能高强钢压力钢管制作及安装主要流程示意

        <span class="mt-1 block text-xs text-gray-400">
          示意流程应结合具体工程设计文件和施工组织方案使用
        </span>
      </figcaption>

    </figure>

  <?php endif; ?>


  <!-- =====================================================
       第一节
       ===================================================== -->

  <h2
    id="why-high-strength-steel"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    一、为什么抽水蓄能压力钢管越来越多使用高强钢？
  </h2>

  <p>
    压力钢管承受的荷载与设计水头、
    管径、内水压力以及结构布置密切相关。
    当水头和设计压力不断提高时，
    如果仅依靠增加普通钢材的壁厚提高承载能力，
    往往会进一步增加结构重量，
    同时增大卷制、焊接、运输和现场安装难度。
  </p>

  <p>
    因此，
    在满足安全、韧性和可焊性等要求的前提下，
    提高钢材强度等级，
    可以成为控制压力钢管壁厚和结构重量的重要技术途径。
  </p>

  <p>
    例如，
    长龙山抽水蓄能电站在高水头条件下，
    不同输水部位分别使用了
    600 MPa 和 800 MPa 级钢衬。
    高压部位采用更高等级钢材，
    反映的并不是简单的“钢材越强越好”，
    而是根据设计内水压力、
    管径、结构受力和制造条件综合确定材料方案。
  </p>

  <p>
    对高强钢而言，
    材料选择还需要关注塑性、低温韧性、
    厚度方向性能以及焊接裂纹敏感性等指标。
    材料强度越高，
    对后续成形、焊接和施工控制提出的要求往往也越高。
  </p>


  <!-- =====================================================
       第二节
       ===================================================== -->

  <h2
    id="material-inspection"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    二、第一步不是卷板，而是高强钢板检验
  </h2>

  <p>
    压力钢管制造质量控制实际上从钢板进场就已经开始。
  </p>

  <p>
    对用于高水头输水系统的高强钢板，
    通常需要按照项目技术文件和相应标准，
    对钢板牌号、规格、表面质量、
    化学成分、力学性能以及相关检测资料进行核验。
  </p>

  <p>
    对 800 MPa 等级钢材，
    碳当量和焊接裂纹敏感性等指标尤其值得关注，
    因为这些材料特性会直接影响后续焊接工艺、
    预热要求和热输入控制。
  </p>

  <div
    class="rounded-xl bg-gray-50 px-6 py-5 leading-8 text-gray-700"
  >
    对工程制造企业而言，
    原材料检验的意义并不仅是确认“这是不是设计要求的钢板”，
    还包括确认这批钢板能否按照既定制造工艺
    稳定完成成形、焊接和检测。
  </div>


  <!-- =====================================================
       第三节
       ===================================================== -->

  <h2
    id="cutting-and-bevel"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    三、数控下料和坡口加工：先把后续焊接条件准备好
  </h2>

  <p>
    钢板检验完成后，
    根据施工图纸和制造尺寸进行排版、划线和下料。
  </p>

  <p>
    标准直管节的展开形状相对规则，
    而弯管、钢岔管、月牙肋和方变圆等复杂构件，
    则需要更精确的展开计算和成形余量控制。
  </p>

  <p>
    下料之后进入坡口加工。
    坡口不仅决定两块钢板如何对接，
    还直接影响焊接熔透、
    焊缝填充量、焊接效率和焊后变形。
  </p>

  <p>
    对厚壁高强钢而言，
    坡口角度过大可能明显增加填充金属量，
    而坡口过窄又可能增加未熔合或未焊透风险。
    因此实际坡口形式必须结合板厚、
    焊接位置、焊接设备和焊接工艺评定确定。
  </p>


  <!-- =====================================================
       第四节
       ===================================================== -->

  <h2
    id="prebending"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    四、板头预弯：解决压力钢管卷制中的端部直边
  </h2>

  <p>
    钢板正式卷圆之前，
    一个很容易被忽略但非常重要的工序就是
    <strong>板头预弯</strong>。
  </p>

  <p>
    在三辊卷板过程中，
    钢板主体能够在三根工作辊之间形成稳定弯矩，
    但到了钢板端部，
    由于端部外侧缺少足够长度继续参与受力，
    弯曲条件发生改变。
  </p>

  <p>
    如果不提前处理板端，
    钢板卷圆后两端容易留下一段曲率不足的区域，
    也就是通常所说的
    <strong>板端直边</strong>。
  </p>

  <p>
    因此板头预弯的目标，
    是让钢板两端在主体卷圆之前
    先获得接近设计筒体的曲率，
    从而为后续卷圆、合口和校圆创造条件。
  </p>


  <?php if (!empty($images['prebending_press']['url'])): ?>

    <?php $image = $images['prebending_press']; ?>

    <figure class="my-10">

      <img
        src="<?= e($image['url']) ?>"
        alt="<?= e($image['alt']) ?>"
        class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
        loading="lazy"
        decoding="async"
      >

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图2 湖北鄂重钢板板头预弯设备实际应用
      </figcaption>

    </figure>

  <?php endif; ?>


  <p>
    关于板端为什么会形成直边、
    预弯量又受到哪些因素影响，
    可以继续阅读：
    <a
      href="<?= e($prebendingArticleUrl) ?>"
      class="font-semibold text-primary underline decoration-primary/30 underline-offset-4 hover:text-secondary"
    >
      《三辊卷板机为什么要预弯？钢板直边产生原因与板头预弯控制要点》
    </a>。
  </p>


  <!-- =====================================================
       第五节
       ===================================================== -->

  <h2
    id="plate-rolling"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    五、三辊卷制：把平板逐步形成设计圆弧
  </h2>

  <p>
    板头预弯完成以后，
    钢板进入主体卷制阶段。
  </p>

  <p>
    三辊卷板机通过工作辊之间的相对运动和压下量控制，
    使钢板沿宽度方向逐步产生塑性弯曲，
    最终形成接近目标直径的筒体。
  </p>

  <p>
    对高强钢而言，
    卷制过程中的一个突出问题是
    <strong>回弹</strong>。
  </p>

  <p>
    钢板在设备加载状态下达到的曲率，
    并不等于卸载以后最终保留下来的曲率。
    材料强度、板厚、目标直径、
    辊系位置、压下量和卷制路径等因素
    都可能影响回弹结果。
  </p>


  <?php if (!empty($images['rolling_machine']['url'])): ?>

    <?php $image = $images['rolling_machine']; ?>

    <figure class="my-10">

      <img
        src="<?= e($image['url']) ?>"
        alt="<?= e($image['alt']) ?>"
        class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
        loading="lazy"
        decoding="async"
      >

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图3 湖北鄂重高强钢压力管道三辊卷制设备
      </figcaption>

    </figure>

  <?php endif; ?>


  <p>
    如果需要进一步了解高强钢回弹产生的原因，
    可以阅读：
    <a
      href="<?= e($springbackArticleUrl) ?>"
      class="font-semibold text-primary underline decoration-primary/30 underline-offset-4 hover:text-secondary"
    >
      《高强钢卷制为什么容易回弹？三辊卷板机回弹原因与控制方法》
    </a>。
  </p>


  <!-- =====================================================
       第六节
       ===================================================== -->

  <h2
    id="fit-up-and-longitudinal-welding"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    六、组圆、校圆以后，为什么先焊纵缝？
  </h2>

  <p>
    钢板从卷板机出来以后，
    得到的是一个接近闭合的圆筒形瓦片或筒体。
  </p>

  <p>
    此时需要进一步调整钢板两端的相对位置，
    控制管口圆度、筒体直径、
    对口间隙和错边量，
    使两条沿管节轴向延伸的直边完成准确组对。
  </p>

  <p>
    这两条直边形成的焊缝，
    就是压力钢管的
    <strong>纵缝</strong>。
  </p>

  <div
    class="rounded-xl border-l-4 border-secondary bg-red-50 px-6 py-5 leading-8 text-gray-800"
  >
    <strong>纵缝和环缝要明确区分：</strong>
    纵缝沿压力钢管轴向延伸，
    是卷制后的钢板两端直边形成的焊缝；
    环缝则沿钢管圆周方向布置，
    用于连接相邻两个已经制作完成的管节。
  </div>

  <p>
    因此典型工艺逻辑是：
    <strong>
      卷制 → 组圆/校圆 → 纵缝焊接 → 单节验收
    </strong>，
    而不是先做环缝。
  </p>

  <p>
    对大直径压力钢管，
    一个标准管节也可能由多个瓦片组装而成，
    此时一个管节可能存在多条纵缝。
    焊接过程中还需要持续关注焊接变形，
    避免纵缝焊接以后管节圆度和尺寸发生明显变化。
  </p>


  <!-- =====================================================
       第七节
       ===================================================== -->

  <h2
    id="stiffener-and-large-section"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    七、加劲环、附件和大节组装
  </h2>

  <p>
    单节压力钢管纵缝焊接并检查合格以后，
    根据设计结构安装加劲环、
    吊耳以及其他需要在厂内完成的附件。
  </p>

  <p>
    对部分工程，
    还会根据运输和吊装条件，
    将两个或多个标准管节提前在加工厂拼接成
    <strong>大节</strong>。
  </p>

  <p>
    这样做的重要意义是，
    将部分原本需要在地下洞室完成的环缝焊接工作
    转移到条件更加稳定、设备更加完善的加工厂进行，
    从而减少现场作业量。
  </p>

  <p>
    辽宁清原抽水蓄能工程的公开研究中，
    就根据现场吊装条件采用了两节或三节组大节的方式，
    以减少现场环缝焊接量。
  </p>


  <!-- =====================================================
       第八节
       ===================================================== -->

  <h2
    id="welding-quality-control"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    八、高强钢压力钢管焊接为什么必须依靠工艺评定？
  </h2>

  <p>
    高强钢压力钢管制造和安装过程中，
    焊接是最关键的质量控制环节之一。
  </p>

  <p>
    高强钢虽然具有较高强度，
    但焊接过程中的热循环会改变焊缝和热影响区组织，
    因而需要综合控制焊材、
    坡口形式、预热、
    焊接电流、电压、焊接速度、
    热输入、层间温度以及必要的焊后处理。
  </p>


  <?php if (!empty($images['welding_quality']['url'])): ?>

    <?php $image = $images['welding_quality']; ?>

    <figure class="my-10">

      <a
        href="<?= e($image['url']) ?>"
        class="article-image-zoom block overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
        data-pswp-width="<?= e((string)$image['width']) ?>"
        data-pswp-height="<?= e((string)$image['height']) ?>"
        aria-label="查看大图：<?= e($image['alt']) ?>"
      >

        <img
          src="<?= e($image['url']) ?>"
          alt="<?= e($image['alt']) ?>"
          class="h-auto w-full"
          loading="lazy"
          decoding="async"
        >

        <span class="zoom-hint">
          <i class="fa-solid fa-magnifying-glass-plus"></i>
          查看大图
        </span>

      </a>

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图4 高强钢压力钢管焊接质量控制关键环节

        <span class="mt-1 block text-xs text-gray-400">
          不同钢级、板厚和焊接方法的参数应以项目焊接工艺评定为准
        </span>
      </figcaption>

    </figure>

  <?php endif; ?>


  <p>
    一个很典型的例子是，
    不同研究中的高强钢预热条件并不相同。
  </p>

  <p>
    辽宁清原项目针对 N800CF 钢板开展的
    双丝埋弧自动焊研究中，
    使用了与其材料、板厚和焊接方法对应的预热和层间温度控制方案；
    而另一项针对 60 mm 厚 SX780CF 的
    熔化极气体保护自动焊研究，
    又采用了不同的预热条件。
  </p>

  <p>
    这说明工程中不能简单地从其他项目找到一个温度、
    电流或者焊速就直接照搬。
  </p>

  <div
    class="rounded-xl border border-amber-200 bg-amber-50 px-6 py-5 leading-8 text-amber-950"
  >
    <strong>工程提示：</strong>
    钢材牌号、板厚、焊接位置、焊接方法和焊材发生变化时，
    所适用的焊接参数也可能变化。
    具体项目应以设计文件、适用规范以及经验证的焊接工艺评定为依据。
  </div>


  <!-- =====================================================
       第九节
       ===================================================== -->

  <h2
    id="automatic-welding"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    九、自动焊正在改变压力钢管制造方式
  </h2>

  <p>
    大直径、厚壁高强钢压力钢管
    对焊接效率和稳定性提出了越来越高的要求。
  </p>

  <p>
    在加工厂环境中，
    纵缝和部分环缝具备较好的机械化焊接条件，
    双丝埋弧自动焊就是其中一种应用方式。
  </p>

  <p>
    这类工艺可以通过前后焊丝的参数匹配，
    分别兼顾熔深和焊缝成形，
    并借助自动行走和参数控制提高焊接过程的一致性。
  </p>

  <p>
    清原抽水蓄能压力钢管研究中，
    已经将自动化技术应用于纵缝、
    环缝和加劲环等制造环节，
    同时引入焊接参数监测，
    对电流、电压、焊接时间等数据进行记录和分析。
  </p>

  <p>
    对于现场立焊、仰焊等埋弧焊不易覆盖的位置，
    全位置熔化极气体保护自动焊也正在发展。
    针对 60 mm 厚 SX780CF 高强钢的研究表明，
    通过合理的坡口设计、焊道排布和参数控制，
    自动焊设备可以完成 3G 立焊和 4G 仰焊位置的焊接试验。
  </p>


  <!-- =====================================================
       第十节
       ===================================================== -->

  <h2
    id="ndt"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十、焊完以后为什么还要进行无损检测？
  </h2>

  <p>
    焊缝外观看起来平整，
    并不代表内部一定没有缺陷。
  </p>

  <p>
    压力钢管焊接完成以后，
    需要按照设计文件和适用技术要求，
    对焊缝进行外观检查及相应无损检测。
  </p>

  <p>
    在相关抽水蓄能工程研究中，
    UT、TOFD 和 MT 等检测方法均有实际应用。
  </p>

  <p>
    其中，
    TOFD 可以用于检测焊缝内部缺陷，
    MT 更适合发现铁磁性材料表面或近表面缺陷；
    不同部位具体采用什么方法，
    仍应根据结构、板厚和工程检测要求确定。
  </p>

  <p>
    对高强钢还需要特别注意
    <strong>延迟裂纹风险</strong>，
    某些焊缝并不是焊接完成以后立即检测就可以完全排除问题，
    工程上应按照相应工艺要求安排检测时机。
  </p>


  <!-- =====================================================
       第十一节
       ===================================================== -->

  <h2
    id="special-components"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十一、方变圆和钢岔管为什么比普通直管更难制作？
  </h2>

  <p>
    抽水蓄能输水系统并不是由标准圆管简单连接而成。
  </p>

  <p>
    在尾水系统与闸门结构衔接的位置，
    可能出现圆形断面向矩形断面过渡的
    <strong>方变圆</strong>；
    在高压水流分叉的位置，
    则需要使用
    <strong>钢岔管</strong>。
  </p>

  <p>
    方变圆同时具有直线段、
    曲面和局部小半径过渡区域，
    制作时需要经过精确展开放样、
    瓦片压制、组装和预组装，
    对成形精度的要求明显高于普通圆筒。
  </p>


  <?php if (!empty($images['transition_piece']['url'])): ?>

    <?php $image = $images['transition_piece']; ?>

    <figure class="my-10">

      <a
        href="<?= e($transitionProjectUrl) ?>"
        class="block"
      >

        <img
          src="<?= e($image['url']) ?>"
          alt="<?= e($image['alt']) ?>"
          class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
          loading="lazy"
          decoding="async"
        >

      </a>

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图5 湖北鄂重罗田平坦原抽水蓄能电站方变圆制作现场
      </figcaption>

    </figure>

  <?php endif; ?>


  <p>
    钢岔管则既要处理复杂几何形状，
    又需要承受分流位置复杂的内水压力和结构应力。
    月牙肋等加强结构进一步提高了制造、
    焊接和尺寸控制难度。
  </p>


  <?php if (!empty($images['branch_pipe']['url'])): ?>

    <?php $image = $images['branch_pipe']; ?>

    <figure class="my-10">

      <a
        href="<?= e($branchProjectUrl) ?>"
        class="block"
      >

        <img
          src="<?= e($image['url']) ?>"
          alt="<?= e($image['alt']) ?>"
          class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
          loading="lazy"
          decoding="async"
        >

      </a>

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图6 湖北鄂重江西奉新抽水蓄能电站钢岔管制作现场
      </figcaption>

    </figure>

  <?php endif; ?>


  <?php if (!empty($images['branch_rib']['url'])): ?>

    <?php $image = $images['branch_rib']; ?>

    <figure class="my-10">

      <img
        src="<?= e($image['url']) ?>"
        alt="<?= e($image['alt']) ?>"
        class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
        loading="lazy"
        decoding="async"
      >

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图7 湖北鄂重罗田平坦原抽水蓄能岔管及月牙板制作现场
      </figcaption>

    </figure>

  <?php endif; ?>


  <!-- =====================================================
       第十二节
       ===================================================== -->

  <h2
    id="1000mpa-branch"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十二、从800 MPa到1000 MPa，高强钢安装方法也在变化
  </h2>

  <p>
    当材料等级进一步提高以后，
    安装阶段也需要重新考虑传统施工方法是否仍然合适。
  </p>

  <p>
    浙江天台抽水蓄能电站
    1000 MPa 级高强钢岔管工程研究中，
    就特别关注了高强钢母材在安装过程中
    因临时支撑焊接产生热影响的问题。
  </p>

  <p>
    相关工程采用抱箍式免焊安装思路，
    通过机械抱箍、支撑和运输底座形成定位及加固体系，
    尽可能避免临时安装结构直接焊接在
    1000 MPa 级高强钢岔管管壁上。
  </p>

  <p>
    这说明高强钢技术的发展，
    已经不仅是把钢材强度从 600 MPa 提高到
    800 MPa 或 1000 MPa，
    而是会进一步影响
    <strong>制造、焊接、运输、定位和安装方法</strong>。
  </p>


  <!-- =====================================================
       第十三节
       ===================================================== -->

  <h2
    id="site-installation"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十三、压力钢管到现场以后如何安装？
  </h2>

  <p>
    工厂制作完成只是压力钢管工程的一半。
  </p>

  <p>
    管节出厂以后，
    还需要根据运输线路、
    施工支洞尺寸、
    斜井坡度、吊装能力和地下洞室条件，
    制定对应的运输与安装方案。
  </p>

  <p>
    典型现场过程包括：
    管节运输、洞内移运、定位、
    中心和高程调整、管节组对、
    现场环缝焊接、复检以及混凝土回填等。
  </p>

  <p>
    现场定位时，
    安装人员需要根据测量控制点持续调整管节的
    中心、高程、里程和轴线，
    同时控制相邻管节的对口间隙和错边。
  </p>

  <p>
    对方变圆、钢岔管等复杂构件，
    制作阶段进行预组装尤其重要，
    因为越多问题能够在加工厂提前发现和消除，
    现场调整工作量就越小。
  </p>


  <!-- =====================================================
       第十四节
       ===================================================== -->

  <h2
    id="ezhong-projects"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十四、湖北鄂重在抽水蓄能压力钢管领域有哪些工程实践？
  </h2>

  <p>
    湖北鄂重建设工程有限公司近年来持续参与
    抽水蓄能高强度压力钢管相关制造及安装项目。
  </p>


  <?php if (!empty($images['pingtanyuan']['url'])): ?>

    <?php $image = $images['pingtanyuan']; ?>

    <figure class="my-10">

      <a
        href="<?= e($pingtanyuanProjectUrl) ?>"
        class="block"
      >

        <img
          src="<?= e($image['url']) ?>"
          alt="<?= e($image['alt']) ?>"
          class="h-auto w-full rounded-2xl border border-gray-200 bg-gray-50 shadow-sm"
          loading="lazy"
          decoding="async"
        >

      </a>

      <figcaption
        class="mt-3 text-center text-sm leading-6 text-gray-500"
      >
        图8 湖北鄂重罗田平坦原抽水蓄能压力钢管项目现场
      </figcaption>

    </figure>

  <?php endif; ?>


  <p>
    公司官网目前公开展示的抽水蓄能相关工程案例，
    包括罗田平坦原抽水蓄能压力钢管制作及安装、
    罗田平坦原方变圆制作、
    罗田平坦原岔管及月牙板制作，
    以及江西奉新抽水蓄能钢岔管制作等。
  </p>

  <p>
    在制造装备方面，
    公司同时展示了用于抽水蓄能
    800 MPa 压力管道场景的
    三辊卷板设备和钢板板头预弯设备。
  </p>

  <p>
    这些工程实践说明，
    抽水蓄能压力钢管制造能力
    并不能仅用“有没有卷板机”来判断。
  </p>

  <p>
    真正完整的制造安装能力，
    需要将钢板成形、
    预弯、卷制、组圆、
    异形构件制作、焊接、
    质量检测以及现场施工
    作为一个完整工艺体系进行组织。
  </p>


  <!-- =====================================================
       第十五节 FAQ
       ===================================================== -->

  <h2
    id="faq"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    十五、关于抽水蓄能压力钢管的几个常见问题
  </h2>


  <h3
    class="pt-3 text-xl font-bold text-gray-900 md:text-2xl"
  >
    1. 抽水蓄能压力钢管是不是全部使用800 MPa高强钢？
  </h3>

  <p>
    不是。
    同一座抽水蓄能电站不同输水部位承受的压力和结构条件不同，
    可以采用不同强度等级和不同壁厚的钢材。
    材料选择应由工程设计计算和项目技术条件确定。
  </p>


  <h3
    class="pt-3 text-xl font-bold text-gray-900 md:text-2xl"
  >
    2. 高强钢压力钢管是不是强度越高越好？
  </h3>

  <p>
    不是。
    强度提高能够为控制壁厚和结构重量提供条件，
    但同时还要考虑韧性、可焊性、
    成形能力、焊接裂纹敏感性以及施工条件。
    材料等级必须与完整制造安装体系匹配。
  </p>


  <h3
    class="pt-3 text-xl font-bold text-gray-900 md:text-2xl"
  >
    3. 压力钢管纵缝和环缝有什么区别？
  </h3>

  <p>
    纵缝沿钢管轴线方向布置，
    通常由钢板卷圆后相邻的两条直边形成；
    环缝沿钢管圆周方向布置，
    用于将相邻的两个管节连接起来。
  </p>


  <h3
    class="pt-3 text-xl font-bold text-gray-900 md:text-2xl"
  >
    4. 高强钢焊接参数能不能直接参考其他抽水蓄能项目？
  </h3>

  <p>
    可以作为研究和方案论证的参考，
    但不应直接照搬。
    不同钢材、板厚、焊材、
    焊接方法和焊接位置对应的工艺条件可能明显不同，
    实际施工参数应以项目技术要求和焊接工艺评定为准。
  </p>


  <!-- =====================================================
       结语
       ===================================================== -->

  <h2
    id="conclusion"
    class="scroll-mt-28 pt-5 text-2xl font-extrabold text-gray-900 md:text-3xl"
  >
    结语
  </h2>

  <p>
    从一张高强钢板到最终安装在地下洞室中的压力钢管，
    中间并不是单一的卷板或焊接过程，
    而是一条完整的工程制造链。
  </p>

  <p>
    原材料性能决定了制造基础；
    板头预弯和三辊卷制决定筒体成形质量；
    组圆、纵缝和环缝焊接决定结构连接质量；
    无损检测承担质量验证；
    而运输、定位和现场安装
    最终决定设计结构能否准确落地。
  </p>

  <p>
    随着抽水蓄能工程向更高水头、
    更大容量和更高钢级发展，
    压力钢管制造也正在向
    <strong>
      高强钢材料、精密成形、自动焊接、
      数字化质量控制和高精度安装
    </strong>
    方向持续发展。
  </p>

  <p>
    湖北鄂重建设工程有限公司将继续围绕
    高强钢压力钢管、
    钢岔管、方变圆以及相关成形装备和施工工艺
    开展工程实践与技术积累。
  </p>


  <!-- =====================================================
       技术资料说明
       ===================================================== -->

  <div
    class="mt-12 rounded-2xl border border-gray-200 bg-gray-50 p-6"
  >

    <h2 class="text-xl font-bold text-gray-900">
      本文技术资料说明
    </h2>

    <p class="mt-4 text-sm leading-7 text-gray-600">
      本文结合湖北鄂重公开工程案例及以下公开技术研究资料整理，
      文章用于压力钢管制造安装技术科普与工程交流。
      文中涉及的具体钢级、板厚、焊接温度、
      焊接参数和检测要求不能替代具体项目设计文件、
      施工规范及焊接工艺评定。
    </p>

    <ol
      class="mt-5 list-decimal space-y-2 pl-5 text-sm leading-7 text-gray-600"
    >

      <li>
        高旭、赵伟、李在兴：
        《双丝埋弧自动焊技术在辽宁清原抽水蓄能电站压力钢管环缝焊接中的应用》，
        水利水电技术（中英文），2023。
      </li>

      <li>
        林宇、岳强、田晨：
        《严寒地区水电站压力钢管全自动智能化焊接施工技术研究》，
        水利水电技术（中英文），2023。
      </li>

      <li>
        朱树清、李小方：
        《抽水蓄能电站中压力钢管高强钢板的选用——以长龙山抽水蓄能电站为例》，
        人民长江，2019。
      </li>

      <li>
        高丽萍：
        《压力钢管方变圆段制作安装方法分析和运用》，
        水电站机电技术，2025。
      </li>

      <li>
        吉智勇等：
        《1000 MPa级高强钢岔管抱箍式免焊安装技术及应用》，
        水电站机电技术，2026。
      </li>

      <li>
        全俊豪等：
        《熔化极气体保护自动焊技术在厚壁高强钢SX780CF上的应用研究》，
        精密成形工程，2026。
      </li>

    </ol>

  </div>

</div>