<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114612653-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114612653-1');
  </script>

</head>


<body <?php body_class(); ?>>
  <!-- Pushy Menu -->
  <nav class="pushy pushy-right">
    <ul>

      <li class="pushy-link pushy-parent-link-li">
        <a id="pushy-parent-link">海外/国内ツアー</a>
        <ul>
          
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/domestic">- 団体国内研修・旅行</a>
          </li>
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/solo">- 個人旅行</a>
          </li>
        </ul>
      </li>

      <li class="pushy-link pushy-parent-link-li">
        <a id="pushy-parent-link">留学</a>
        <ul>
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/overseas">- 団体海外教育研修</a>
          </li>
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/solostudy">- 個人留学</a>
          </li>
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/jizen">- 事前学習</a>
          </li>
          <li class="pushy-sub-link">
            <a href="<?php bloginfo( 'url' ); ?>/ephrases">- 英会話フレーズ</a>
          </li>

        </ul>
      </li>

      <li class="pushy-link"><a href="<?php bloginfo( 'url' ); ?>/about">会社概要</a></li>
      <li class="pushy-link"><a href="<?php bloginfo( 'url' ); ?>/contact">お問合せ</a></li>
      <li class="pushy-link"><a href="<?php bloginfo( 'url' ); ?>/blog">ブログ</a></li>
    </ul>
  </nav>

  <!-- Site Overlay -->
  <div class="site-overlay"></div>

  <!-- Desktop Header Content -->
  <div id="container" class="container container-all">
    <header>
      <div class="container container-header cf">
        <div class="header-top cf">
          <h1 id="site-title" class="logo-h"><a id="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/img/logo-wide.png"></a></h1>

          <!-- Menu Button -->
          <div id="menu-btn" class="menu-btn btn-solid"><i class="fa fa-bars" aria-hidden="true"></i> Menu</div>

          <!-- sns -->
          <ul id="menu-sns">
            <li><a href="https://ay-study.com" target="_brank"><img class="aytravelstudy-btn" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/aytravelstudy-btn.png"></a></li>
            <li><a href="https://www.facebook.com/ayprojectyokohama/" target="_brank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/icons/fb.png"></a></li>
            <li><a href="https://www.youtube.com/channel/UC1CMx9KIgvarJdT3gwq4JeQ" target="_brank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/icons/yt.png"></a></li>
            <li><a href="https://www.instagram.com/ay_travel_2011/" target="_brank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/icons/instagram.png"></a></li>

            
          </ul>
        </div>

        <!-- Desktop Header Content -->
        <nav id="desktop-header" class="header-menu desktop-header">
          <ul id="fade-in" class="dropmenu">

            <li class="">
              <a href="">
                <span class="desktop-menu-word">海外/国内ツアー</span>
                <img class="desktop-menu-img desktop-menu-img-jizen" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/tour.png">
              </a>
              <ul class="desktop-sub-ul">
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/domestic">団体国内研修・旅行</a>
                </li>
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/solo">個人旅行</a>
                </li>
              </ul>
            </li>

            <li class="">
              <a href="">
                <span class="desktop-menu-word">留学</span>
                <img class="desktop-menu-img desktop-menu-img-jizen" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/jizen.png">
              </a>
              <ul class="desktop-sub-ul">
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/overseas">団体海外教育研修</a>
                </li>
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/solostudy">個人留学</a>
                </li>
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/jizen">事前学習</a>
                </li>
                <li class="desktop-menu-sub-link">
                  <a href="<?php bloginfo( 'url' ); ?>/ephrases">英会話フレーズ</a>
                </li>
              </ul>
            </li>

            <li class="">
              <a href="<?php bloginfo( 'url' ); ?>/about">
                <span class="desktop-menu-word">会社概要</span>
                <img class="desktop-menu-img desktop-menu-img-about" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/about.png">
              </a>
            </li>
            <li class="">
              <a href="<?php bloginfo( 'url' ); ?>/contact">
                <span class="desktop-menu-word">お問合せ</span>
                <img class="desktop-menu-img" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/contact.png">
              </a>
            </li>
            <li class="">
              <a href="<?php bloginfo( 'url' ); ?>/blog" class="">
                <span class="desktop-menu-word">BLOG</span>
                <img class="desktop-menu-img" src="<?php bloginfo( 'template_directory' ); ?>/img/icons/blog.png">
              </a>
            </li>
          </ul>

        </nav>


      </div> <!-- /.container container-header -->

    </header>








