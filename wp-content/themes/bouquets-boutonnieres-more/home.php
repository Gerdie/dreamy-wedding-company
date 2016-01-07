<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="article-header">

							<h1 class="entry-title h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

							<p class="byline vcard"><?php printf(__('Posted <time class="updated" datetime="%1$s" pubdate><a href="%5$s">%2$s</a></time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bouquets-boutonnieres-more'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bouquets_boutonnieres_more_get_the_author_posts_link(), get_the_category_list(', '), get_permalink($np->ID),$np->post_title); ?></p>

						</header>

						<section class="entry-content clearfix">
							<?php the_content('Read More...'); ?>
						</section>

						<footer class="article-footer">

							<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bouquets-boutonnieres-more') . '</span> ', ', ', ''); ?></p>

						</footer>

					</article>

				<?php endwhile; ?>

				<?php get_template_part('includes/template','pager'); //wordpress template pager/pagination ?>

			<?php else : ?>

			<?php get_template_part('includes/template','error'); //wordpress template error message ?>

			<?php endif; ?>

<?php get_footer();
