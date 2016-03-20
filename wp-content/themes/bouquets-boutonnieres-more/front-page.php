<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="article-header">
						</header>
						
						<div class="row">
						    <div class="col-sm-6 col-md-4">
						        <a href="http://localhost:8888/dreamy-wedding-company/boutonnieres/">
						            <img id="dwd-fp-1-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/boutonniere-300sq.jpg">
						            <p id="dwd-fp-1-0">boutonnieres</p>
						        </a>
						    </div>
						    <div class="col-sm-6 col-md-4">
						        <a href="http://localhost:8888/dreamy-wedding-company/ceremony/">
						            <img id="dwd-fp-2-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/ceremony-300sq.jpg">
						            <p id="dwd-fp-2-0">ceremony</p>
						        </a>
						    </div>
						    <div class="col-md-4 hide-sm">
						        <a href="http://localhost:8888/dreamy-wedding-company/bouquets/">
						            <img id="dwd-fp-3-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/bouquet-pw-300sq.jpg">
						            <p id="dwd-fp-3-0">bouquets</p>
						        </a>
						    </div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-4 col-md-push-4">
								<a href="http://localhost:8888/dreamy-wedding-company/more/">
						            <img id="dwd-fp-5-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/shoes-300sq.jpg">
						            <p id="dwd-fp-5-0">&</p>
						        </a>
						    </div>
						    <div class="col-sm-6 col-md-4 col-md-pull-4">
						        <a href="http://localhost:8888/dreamy-wedding-company/reception/">
							        <img id="dwd-fp-4-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/cake-top-300sq.jpg">
						            <p id="dwd-fp-4-0">reception</p>
						        </a>
						    </div>
						    <div class="hide-sm col-md-4">
						        <a href="http://localhost:8888/dreamy-wedding-company/more/">
						            <img id="dwd-fp-6-m" src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/white-bout-300sq.jpg">
						            <p id="dwd-fp-6-0">more</p>
						        </a>
						    </div>
						</div>
						
						<div id="dwd-services-hp">
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
						
						<hr>
						
						<div class="hp-mid">

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
						
						</div>

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