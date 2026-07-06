  <!-- 顶部信息栏 -->
  <div class="bg-primary text-white text-sm py-2 px-4 flex justify-between items-center">
    <div class="flex items-center space-x-4">
      <span><i class="fas fa-phone-alt mr-2"></i>咨询电话：13972950821</span>
      <span><i class="fas fa-phone mr-2"></i>公司座机：0711-3611618</span>
    </div>
    <div>
      <a href="weixin://" class="flex items-center hover:text-secondary">
        <i class="fab fa-weixin mr-2"></i>微信同手机号
      </a>
    </div>
  </div>

  <!-- 导航栏（注意链接指向路由而不是锚点页） -->
  <nav id="navbar" class="sticky top-0 inset-x-0 z-50 relative bg-white/60 backdrop-blur-md border-b border-white/20 py-1 md:py-2">
    <div class="container mx-auto px-4 flex items-center gap-6 md:gap-8">
      <div class="inline-flex items-center bg-gray-100 rounded-xl px-3 py-1.5 md:px-4 md:py-2">
        <img src="https://static.ezhong.co/assets/images/logo-ezhong.png" alt="湖北鄂重建设工程有限公司 Logo"
             class="w-12 h-12 md:w-14 md:h-14 rounded-xl object-contain bg-white p-1 shadow-inner shrink-0"/>
        <div class="ml-4">
          <h1 class="text-2xl font-bold text-primary">湖北鄂重建设工程有限公司</h1>
          <p class="text-gray-600 text-sm">专业压力钢管制造与安装</p>
        </div>
      </div>

    <?php /* header.php 片段 —— 导航 */ ?>
    <div class="hidden md:flex items-center gap-8 ml-auto">
      <a href="/?p=home#home"
         class="nav-link text-gray-800 font-medium <?= $current_page==='home' ? 'active-link' : '' ?>"
         data-section="home">网站首页</a>
    
      <a href="/?p=home#about"
         class="nav-link text-gray-800 font-medium <?= $current_page==='about' ? 'active-link' : '' ?>"
         data-section="about">关于我们</a>
    
      <!-- 下面这两项是首页里的锚点，后端无法高亮，交给 JS 处理 -->
      <a href="/?p=home#products"
        class="nav-link text-gray-800 font-medium <?= ($current_section ?? '')==='products' ? 'active-link' : '' ?>"
        data-section="products">产品中心</a>
    
      <!-- 这些是独立页面，继续用 $current_page 控制高亮 -->
      <a href="/?p=home#projects"
         class="nav-link text-gray-800 font-medium <?= ($current_section ?? '')==='projects' ? 'active-link' : '' ?>"
         data-section="projects">案例展示</a>
    
      <a href="/?p=home#news"
         class="nav-link text-gray-800 font-medium <?= ($current_section ?? '')==='news' ? 'active-link' : '' ?>"
         data-section="news">新闻动态</a>
    
      <a href="/?p=home#factory"
         class="nav-link text-gray-800 font-medium <?= $current_page==='factory' ? 'active-link' : '' ?>"
         data-section="factory">厂区展示</a>
    
      <!-- 首页里的锚点，交给 JS -->
      <a href="/?p=home#contact" class="nav-link text-gray-800 font-medium" data-section="contact">联系我们</a>
    </div>

      <div class="ml-auto md:hidden">
        <button id="mobile-menu-btn" class="text-gray-800 p-2">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>

    <!-- 移动端菜单 -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md py-4 px-4 absolute w-full left-0 top-full shadow-lg z-50">
      <div class="flex flex-col space-y-3">
        <a href="/?p=home#home" class="py-2 px-4 bg-gray-100 rounded font-medium">网站首页</a>
        <a href="/?p=about" class="py-2 px-4 rounded font-medium">关于我们</a>
        <a href="/?p=home#products" class="py-2 px-4 rounded font-medium">产品中心</a>
        <a href="/?p=home#projects" class="py-2 px-4 rounded font-medium">案例展示</a>
        <a href="/?p=home#news" class="py-2 px-4 rounded font-medium">新闻动态</a>
        <a href="/?p=home#factory" class="py-2 px-4 rounded font-medium">厂区展示</a>
        <a href="/?p=home#contact" class="py-2 px-4 rounded font-medium">联系我们</a>
      </div>
    </div>
  </nav>

