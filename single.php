<?php get_header(); // Pulls in the header.php template ?>

<!-- This is the template for individual blog posts -->

<div class="main">

    <!-- Start of the post content -->
    <article id="post-<?php the_ID(); // Insert the post ID ?>">

	    <?php if (have_posts()) : while (have_posts()) : the_post(); // If the post exists, do the following... ?>

		    <!-- Start of the heading section -->
		    <header>
			    <!-- The page heading. Small-space-bottom class provides a small margin between the heading the post date. -->
			    <h1 class="small-space-bottom">
				    <?php the_title(); // The post title ?>
			    </h1>

			    <!-- Start the meta information section -->
			    <aside>
				    <!-- Lightened text with a bottom margin -->
				    <p class="muted">
					    <?php the_time('F j, Y') // The date ?>
				    </p>
			    </aside><!-- End the meta information section -->
		    </header><!-- End of the heading section -->

		    <!-- The post content -->
		    <?php the_content(); ?>


		    <!-- Pulls in the comment template -->
		    <?php comments_template(); ?>

	
	    <?php endwhile; else: // If no post exists, display this error message... ?>
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
	    <?php endif; // End of error message ?>
	
    </article><!-- End of the post content -->

</div>

<?php get_sidebar(); // Pulls in the sidebar.php template ?>
	
<?php get_footer(); // Pulls in the footer.php template ?>
