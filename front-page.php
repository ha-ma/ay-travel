<?php get_header(); ?>

<main id="primary" class="content-area main-front" role="main">
  
  <?php get_template_part('template/front', 'hero') ?>

  <?php get_template_part('template/front', 'blog') ?>

  <?php get_template_part('template/front', 'planned') ?>

  <?php get_template_part('template/front', 'domestic') ?>

  <?php get_template_part('template/front', 'studyprogram') ?>

  <?php get_template_part('template/front', 'media') ?>


  <?php get_template_part('template/front', 'snsbar') ?>



  <?php get_template_part('template/content', 'ask') ?>


  <?php get_template_part('template/front', 'address') ?>


</main><!-- #main -->


<?php get_footer(); ?>
