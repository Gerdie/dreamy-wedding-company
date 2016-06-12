<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="article-header">
						</header>
						
						<div class="row">
						    <div class="col-sm-6 col-md-4">
						        <a href="/boutonnieres">
						            <img id="dwd-fp-1-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/boutonniere-300sq.jpg">
						            <p id="dwd-fp-1-0">boutonnieres</p>
						        </a>
						    </div>
						    <div class="col-sm-6 col-md-4">
						        <a href="/ceremony">
						            <img id="dwd-fp-2-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/ceremony-300sq.jpg">
						            <p id="dwd-fp-2-0">ceremony</p>
						        </a>
						    </div>
						    <div class="col-md-4 hide-sm">
						        <a href="/bouquets">
						            <img id="dwd-fp-3-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/bouquet-pw-300sq.jpg">
						            <p id="dwd-fp-3-0">bouquets</p>
						        </a>
						    </div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-4 col-md-push-4">
								<a href="/more">
						            <img id="dwd-fp-5-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/shoes-300sq.jpg">
						            <p id="dwd-fp-5-0">&</p>
						        </a>
						    </div>
						    <div class="col-sm-6 col-md-4 col-md-pull-4">
						        <a href="/reception">
							        <img id="dwd-fp-4-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/cake-top-300sq.jpg">
						            <p id="dwd-fp-4-0">reception</p>
						        </a>
						    </div>
						    <div class="hide-sm col-md-4">
						        <a href="/more">
						            <img id="dwd-fp-6-m" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/white-bout-300sq.jpg">
						            <p id="dwd-fp-6-0">more</p>
						        </a>
						    </div>
						</div>
						
						<div id="dwd-services-hp">
			                <ul id="dwd-services">
			                    <li><a href="/bouquets">Bouquets</a></li>
			                    <li class="hide-sm">&bull;</li>
			                    <li><a href="/boutonnieres">Boutonnieres</a></li>
			                    <li class="hide-sm">&bull;</li>
			                    <li><a href="/ceremony">Ceremony</a></li>
			                    <li class="hide-sm">&bull;</li>
			                    <li><a href="/reception">Reception</a></li>
			                    <li class="hide-sm">&bull;</li>
			                    <li><a href="/more">More!</a></li>
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
						
						<div class="dwd-button"><a href="/contact">CONTACT US</a></div>
						
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