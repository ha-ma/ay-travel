<section class="frontblog">
    <div class="frontblog-container">
      <h2 class="blog-heading">AY TRAVEL BLOG</h2>
      <?php query_posts('posts_per_page=3'); ?>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="blog-article">
          <div class="blog-article-container">

            <div class="blog-category">
              <div class="category-link"><?php the_category( ' ' ); ?></div>
            </div>

            <div class="blog-date">
              <p><?php the_time('Y年n月j日'); ?></p>
            </div>


            <a href="<?php the_permalink(); ?>" class="blog-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>');"></a>

            <div class="blog-title">
              <h2><a href="<?php the_permalink(); ?>" class="heading category-blog"><?php the_title(); ?></a></h2>
            </div> <!-- /.blog-title -->


          </div> <!-- /.blog-article-container -->
        </article> <!-- /.blog-article -->


      <?php endwhile; else : ?>


      <p><?php _e( 'Sorry, no blog-posts found.'); ?></p>

    <?php endif; ?>

    <div class="frontblog-readmore">
      <a class="frontblog-link-btn btn-outlined" href="<?php bloginfo( 'url' ); ?>/blog">記事一覧</a>
    </div>
    

  </div> <!-- /.frontblog-container -->
</section> <!-- /.frontblog -->