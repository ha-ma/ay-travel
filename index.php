<?php get_header(); ?>

  <main id="primary" class="content-area" role="main">

    <?php if ( have_posts() ) : ?>

      <div id="posts" class="posts">

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>

        <?php endwhile; ?>


      </div><!-- .posts -->

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <div id="posts" class="posts">
      </div>

    <?php endif; ?>

  </main><!-- #main -->

<?php get_footer(); ?>
