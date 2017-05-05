<?php
/*
@package sunsettheme
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
  <main idea="main" class="site-main" role="main">
    <div class="container">
      <?php
      if (have_posts()):

        while (have_posts()) : the_post();
          get_template_part('template-parts/content', get_post_format());
      	endwhile;

      else:

      endif;
      ?>
    </div>
  </main>
</div> <!-- primary -->

<?php get_footer(); ?>
