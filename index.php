<?php
/**
 * Template Name: Index
 *
 * @package Wordpress Starter Template
 * @since 1.0.0
 */

get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("max-w-4xl mx-auto"); ?>>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-primary-dark"><?php the_title(); ?></h1>
                <div class="entry-content prose prose-lg max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
      endwhile;
    else:
       ?>
        <p class="text-center text-gray-600 py-12"><?php _e(
          "Aucun contenu trouvé.",
          "oceantherapist-secure",
        ); ?></p>
        <?php
    endif; ?>
</div>

<?php get_footer();
