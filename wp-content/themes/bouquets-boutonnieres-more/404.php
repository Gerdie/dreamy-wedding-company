<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Sorry, this page has been moved!', 'test' ); ?></h1>
				</header><!-- .page-header -->

				<div class="fof-desc">
				<div class="page-content">
					<p><?php _e( 'But don\'t worry, we\'re still here. From your wedding ceremony, to cocktail hour and your reception, we\'re excited to make your decoration dreams come true!'); ?></p>

				</div>
				</div>
			</section>
			
			<img class="dwd-weddingparty" src="http://www.dreamyweddingcompany.com/wp-content/uploads/2016/05/weddingparty.jpg">
			
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

<?php get_footer();
