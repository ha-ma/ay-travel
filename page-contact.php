<?php 
/**
 * Template Name: お問合せ
**/

?>

<?php get_header(); ?>
<main id="primary" class="content-area main-about page-main" role="main">
  <div class="container-main">

    <section id="hero" class="hero" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/hero-contact.jpg'); background-size: cover; background-position: center">
      <div class="container container-hero">
        <div class="hero-text">
          <h2 class="no-style ts">お問合せ</h2>
          <p class="ts">サイト内フォームからのお問合せはこちら。</p>
        </div> <!--/.hero-text -->
      </div> <!-- /.container-hero -->
    </section> <!-- /#hero -->

    <section id="page-content">
      <div class="container container-page-content">
        <?php while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div> <!-- /.container-page-content -->
    </section>

  </div> <!-- /.container-main -->
</main><!-- #main -->


<?php get_footer(); ?>
