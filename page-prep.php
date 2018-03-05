<?php 
/**
 * Template Name: 準備中
**/

?>

<?php get_header(); ?>
<main id="primary" class="content-area main-about page-main" role="main">
  <div class="container-main">

    <section id="hero" class="hero" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/hero-prep.jpg'); background-size: cover; background-position: center">
      <div class="container container-hero">
        <div class="hero-text">
          <h2 class="no-style ts">準備中</h2>
        </div> <!--/.hero-text -->
      </div> <!-- /.container-hero -->
    </section> <!-- /#hero -->

    <section id="prep-content">
      <div class="container prep-content-container">
        <h2>このページは現在準備中です。</h2>
        <p>大変申し訳ありませんが、このページは現在準備中です。</p>
        <p>お待ちの間、下記コンテンツをご覧ください:</p>
        <div class="prep-list">
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">TOPページ</a></li>
            <li>
              <a href="<?php bloginfo( 'url' ); ?>/overseas">団体海外教育研修</a>
              <ul>
                <li><a href="<?php bloginfo( 'url' ); ?>/overseas#studyplan" class="">団体海外教育研修</a></li>
                <li><a href="<?php bloginfo( 'url' ); ?>/overseas#depflow" class="">ご出発までの流れ</a></li>
              </ul>
            </li>
            <li><a href="<?php bloginfo( 'url' ); ?>/about" rel="home">会社概要</a></li>
          </ul>
        </div> <!-- /.prep-list -->
      </div> <!-- /.prep-content-container -->
    </section> <!-- /.prep-content -->

  </div> <!-- /.container-main -->
</main><!-- #main -->


<?php get_footer(); ?>
