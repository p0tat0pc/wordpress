<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Melissa_Portfolio
 */

get_header();
?>
<main id="content" class="site-main">
    <section class="w-50 offset-6">
        <?php melissa_portfolio_post_thumbnail(); ?>
    </section>
    <section class="px-50 w-50 offset-6">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
