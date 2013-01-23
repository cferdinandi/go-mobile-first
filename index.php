<?php get_header(); // Pulls in the header.php template ?>

<!-- This is the temlpate for the page that displays all of your blog posts -->



	<?php if (have_posts()) : // If you have any blog posts ?>

		<?php while (have_posts()) : the_post(); // The WordPress post loop. For each post, do the following... ?>

			<!-- Start of the post content -->
			<article id="post-<?php the_ID(); // Insert the post ID ?>">

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

			</article><!-- End the post content -->

			<!-- Inserts a line between posts -->
			<hr>

		<?php endwhile; // End the post loop ?>


		<!-- Start of the next/previous page navigation -->
		<nav>
			<!-- Text with a bottom margin -->
			<p>
				<!-- The navigation links and text. ('DIVIDER_BETWEEN_LINKS', 'NEWER_POSTS_TEXT', 'OLDER_POSTS_TEXT') -->
				<?php posts_nav_link( '<span class="muted">&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;</span>', 'Newer', 'Older' ); ?>
			</p>
		</nav><!-- End of the next/previous page navigation -->


	<?php else : // If no posts exist, display this error message... ?>
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


<?php get_footer(); // Pulls in the footer.php template ?>
