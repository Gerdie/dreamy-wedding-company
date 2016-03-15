<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="article-header">
						</header>
						
						<div class="row">
						    <div class="col-sm-6 col-md-4">
						    <div id="dwd-fp-1">
						    <img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/boutonniere-300sq.jpg">
						    </div>
						    </div>
						    <div class="col-sm-6 col-md-4">
						    <div id="dwd-fp-2">
						    <img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/ceremony-300sq.jpg">
						    </div>
						    </div>
						    <div class="col-sm-0 col-md-4">
						    <div id="dwd-fp-3">
						    <img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/bouquet-pw-300sq.jpg">
						    </div>
						    </div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-4">
							<div id="dwd-fp-4">
							<img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/cake-top-300sq.jpg">
						    </div>
						    </div>
						    <div class="col-sm-6 col-md-4">
						    <div id="dwd-fp-5">
						    <img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/shoes-300sq.jpg">
						    </div>
						    </div>
						    <div class="col-sm-0 col-md-4">
						    <div id="dwd-fp-6">
						    <img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/white-bout-300sq.jpg">
						    </div>
						    </div>
						</div>
						
						<hr>

						<h1 class="dwd-who">Who We Are</h1>

						

						<section class="entry-content clearfix">
							<?php the_content(); ?>
							<?php wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bouquets-boutonnieres-more' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) ); ?>
						</section>
						
						<div class="dwd-button">CONTACT US</div>

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

<?php get_footer();