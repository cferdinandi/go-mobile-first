<?php get_header(); // Pulls in the header.php template ?>

<!-- This is the template for posts by category, tag, etc. -->

<div class="main">

	<?php if (have_posts()) : // if posts for that category, tag, etc. exist... ?>

		<!-- Start of the heading section -->
		<header>

			<!-- Inserts the appropriate heading based on type (category, tag, etc.) -->
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1>On <?php single_cat_title(); ?>...</h1>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>On <?php single_tag_title(); ?>...</h1>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>On <?php the_time('F jS, Y'); ?>...</h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>From <?php the_time('F, Y'); ?>...</h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1>From <?php the_time('Y'); ?>...</h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1>Author Archive</h1>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
			<?php } ?>

			<!-- Insert a line between category/tag/etc. heading and list of posts -->
			<hr>
		</header><!-- End of the heading section -->

		<?php while (have_posts()) : the_post(); // The WordPress post loop. If posts exist, for each post, do the following... ?>

			<!-- Start of the Archives content -->
			<article id="post-<?php the_ID(); // insert post ID ?>">

				<!-- Start of the heading section -->
				<header>
					<!-- The page heading. Small-space-bottom class provides a small margin between the heading the post date. -->
					<h1 class="small-space-bottom">
						<!-- Link to the article -->
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php the_title(); // The post title ?>
						</a>
					</h1>

					<!-- Start the meta information section -->
					<aside>
						<!-- Lightened text with a bottom margin -->
						<p class="muted">
							<?php the_time('F j, Y') // The date ?>
						</p>
					</aside><!-- End the meta information section -->
				</header><!-- End of the heading section -->

				<!-- The post content. If using the "more" tag, display "Keep reading..." with link to full post. -->
				<?php the_content('<p>Keep reading...</p>'); ?>

				<!-- Link to the comments section, with a bottom margin and extra padding up top -->
				<p class="padding-top">
					<!-- The link to the comments section -->
					<a href="<?php comments_link(); ?>">
						<!-- Text to display ('NO_COMMENTS', '1_COMMENT', 'MANY_COMMENTS') -->
						<?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?>
					</a>
				</p>

			</article><!-- End of the archives content -->

			<!-- Inserts a line between posts -->
			<hr>

		<?php endwhile; // End of the post loop ?>

		<!-- Start of the next/previous page navigation -->
		<nav>
			<!-- Text with a bottom margin -->
			<p>
				<!-- The navigation links and text. ('DIVIDER_BETWEEN_LINKS', 'NEWER_POSTS_TEXT', 'OLDER_POSTS_TEXT') -->
				<?php posts_nav_link( '<span class="muted">&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;</span>', 'Newer', 'Older' ); ?>
			</p>
		</nav><!-- End of the next/previous page navigation -->


	<?php else : // If no posts for that catgory, tag, etc. exist, display this error message... ?>
		<!-- Start of the error message content -->
		<article>

			<!-- Start of the heading section -->
			<header>
				<!-- The page heading -->
				<h1>Ooops!</h1>
			</header><!-- End of the heading section -->

			<!-- This is the error message, obviously -->
			<p>The page you're looking for can't be found. Sorry about that!</p>

			<p>Maybe try searching for it?</p>

		</article><!-- End of the error message content -->
	<?php endif; // End if statement ?>

</div>

<?php get_sidebar(); // Pulls in the sidebar.php template ?>

<?php get_footer(); // Pulls in the footer.php template ?>
