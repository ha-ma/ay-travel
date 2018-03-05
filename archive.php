
<?php get_header(); ?>


<div class="home-container">
  <section class="hero-img home-hero">
    <div class="hero-img-container">

      <div class="hero-img-description">
        <h1 class="heading">BLOG</h1>
        <h2><?php wp_title(''); ?>の投稿</h2>
      </div> <!-- /.hero-img-description -->

    </div> <!--/.hero-img-container -->
  </section> <!-- /.hero-img -->
  <section class="blog-section">
    <div class="blog-post-contents">
      <?php query_posts('posts_per_page=6'); ?>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="blog-article">
          <div class="blog-article-container">
            <a href="<?php the_permalink(); ?>" class="thumbnail">
              <?php if( get_the_post_thumbnail() ): ?>
                <?php the_post_thumbnail(); ?>
              <?php endif; ?>
            </a> <!-- /.thumbnail -->
            <div class="blog-title">
              <h2><a href="<?php the_permalink(); ?>" class="heading category-blog"><?php the_title(); ?></a></h2>
              </div> <!-- /.blog-title -->
            <div class="blog-meta">
              <div class="blog-meta-category">
                <div class="category-link"><?php the_category( ' ' ); ?></div>
              </div>
              <div class="blog-meta-date">
                <p><?php the_time('Y年n月j日'); ?></p>
              </div>
              <div class="blog-meta-author">
                <p>by: <?php the_author_posts_link(); ?></p>
              </div>
            </div> <!-- /.blog-meta -->
            <div class="blog-excerpt">
              <p class="blog-exerpt-content"><?php the_excerpt(); ?></p>
            </div> <!-- /.blog-excerpt -->
            <div class="read-more">
              <a class="read-more-btn category-blog" href="<?php the_permalink(); ?>">続きを読む</a>
            </div> <!-- /.read-more -->
          </div> <!-- /.blog-article-container -->
        </article> <!-- /.blog-article -->


      <?php endwhile; else : ?>


      <p><?php _e( 'Sorry, no blog-posts found.'); ?></p>

    <?php endif; ?>

  </div> <!-- /.blog-posts-contents -->
</section> <!-- /.blog-section -->
  

  <?php get_template_part('template/parts', 'pagination') ?>

</div>
<?php get_footer(); ?>