<?php get_header(); ?>
<main id="primary" class="content-area main-about page-main" role="main">
  <div class="container-main">
    <section id="page-heading">
      <div class="container container-travelterms-heading">
        <h1 class="logo-h page-h">
          <?php the_title(); ?>
        </h1>
      </div> <!-- /.container-travelterms-heading -->
    </section> <!-- /.page-heading -->
    
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
