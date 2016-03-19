<?php
/*
Template Name: Services Page
Description: Page template with Services menu
*/
?>

<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<!--<header class="article-header">

							<h1 class="entry-title page-title"><?php the_title(); ?></h1>

						</header> -->

						<section class="entry-content clearfix">
							<div class="service-desc">
							<?php the_content(); ?>
							</div>
							<?php wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bouquets-boutonnieres-more' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) ); ?>
						</section>

						<footer class="article-footer">

							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

						</footer>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					</article>

				<?php endwhile; ?>

			<?php else : ?>

			<?php get_template_part('includes/template','error'); // WordPress template error message ?>

			<?php endif; ?>
			
			<div>
			    <ul id="dwd-services">
			        <li><a href="http://localhost:8888/dreamy-wedding-company/bouquets/">Bouquets</a></li>
			        <li class="hide-sm">&bull;</li>
			        <li><a href="http://localhost:8888/dreamy-wedding-company/boutonnieres/">Boutonnieres</a></li>
			        <li class="hide-sm">&bull;</li>
			        <li><a href="http://localhost:8888/dreamy-wedding-company/ceremony/">Ceremony</a></li>
			        <li class="hide-sm">&bull;</li>
			        <li><a href="http://localhost:8888/dreamy-wedding-company/reception/">Reception</a></li>
			        <li class="hide-sm">&bull;</li>
			        <li><a href="http://localhost:8888/dreamy-wedding-company/more/">More!</a></li>
			    </ul>
			</div>

            <?php 
            
            if(get_field('quote'))
            {
                echo '<hr>';
                echo '<div class="row">';
                echo '<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">';
                echo '<div class="dwd-quote">' . get_field('quote') . '</div>';
                if (get_field('speaker'))
                {
                    echo '<p class="dwd-speaker">' . get_field('speaker') . '</p>';
                }
                echo '</div>';
                echo '<div class="col-sm-1 col-md-2">';
                echo '</div>';
                echo '</div>';
            }
            
            ?>

<?php get_footer();