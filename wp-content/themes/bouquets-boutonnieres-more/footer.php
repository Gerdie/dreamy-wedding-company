<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 */
?>
		</div><?php //END #main ?>

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
		<div id="left-sidebar" class="sidebar col-sm-3 col-md-pull-9 clearfix" role="complementary">
			<?php dynamic_sidebar( 'left-sidebar' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		<div id="right-sidebar" class="sidebar col-sm-3 clearfix" role="complementary">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</div>
	<?php endif; ?>

		</div><?php //END #inner-content ?>

	</div><?php //END #content ?>

	<footer id="colophon" class="footer" role="contentinfo">
		
		<div id="inner-footer" class="wrap clearfix">
		
		<hr>
		
		<div id="footer-contact">
		    <p>dreamyweddingco@gmail.com<br />
		    703-859-6083</p>
		</div>

			<!--<nav role="navigation">
				<?php bouquets_boutonnieres_more_footer_nav(); ?>
			</nav> -->

			<ul id="social">
			    <li><a href="https://www.weddingwire.com/biz/dreamy-wedding-company-l-l-c-dumfries/bf40003a97a3e55e.html"><img src="http://localhost:8888/dreamy-wedding-company/wp-content/uploads/2016/03/weddingwire-60.jpg"></a></li>
			    <li><a href="http://www.facebook.com/Dreamy-Wedding-Decor-269348699755081/"><i class="fa fa-facebook fa-fw"></i></a></li>
			    <li><a href="http://pin.it/50c_4pS"><i class="fa fa-pinterest fa-fw"></i></a></li>
			    <li><a href="tel://1-703-859-6083"><i class="fa fa-phone fa-fw"></i></a></li>
			    <li><a href="mailto:dreamyweddingco@gmail.com"><i class="fa fa-envelope-o fa-fw"></i></a></li>
			</ul>
			<!--<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p> -->

		</div>

	</footer>

	<p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>

</div><?php //END #container ?>

<?php wp_footer(); ?>

</body>
</html>