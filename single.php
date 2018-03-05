<?php get_header(); ?>
<section class="single-container">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="single-heading single-section" style="background-image: url(
<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)">
      <div class="single-profile-img">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
      </div> <!-- /.single-profile-img -->
      <div class="single-heading-container">
        <div class="single-heading-wrapper">
          <h1 class="heading"><?php the_title(); ?></h1>
        </div> <!-- /.single-heading-wrapper -->
      </div> <!--/.single-heading-container -->
    </section> <!-- /.single-heading -->

    <section class="single-main">
      <div class="single-meta">
        <p><?php the_author_posts_link(); ?></p>
        <p><?php the_time('Y年n月j日'); ?></p>
        <div class="single-main-category">
          <div class="category-link"><?php the_category( ' ' ); ?></div>
        </div> <!-- /.single-main-category -->
      </div> <!-- /.single-meta -->

      <div class="single-post">
        <?php the_content(); ?>
      </div> <!-- /.single-post -->

      <div class="single-pagenation">
        <div class="single-pagenation-container">
          <span class="previous-post"><?php previous_post_link(); ?></span>
          <span class="next-post"><?php next_post_link(); ?></span>
          
        </div> <!-- /.single-pagenation-container -->
      </div> <!-- /.single-pagenation -->

    </section> <!-- /.single-main -->

  <?php endwhile; else : ?>
  <section class="no-post">
    <p><?php _e( 'Sorry, No posts here..' ); ?></p>
  </section>
<?php endif; ?>


</section> <!-- /.single-container -->


<?php get_footer(); ?>