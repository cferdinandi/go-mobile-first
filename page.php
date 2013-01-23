<?php get_header(); // Pulls in the header.php template ?>

<!-- This is the template for pages (like the About page) -->

<!-- Start of the page content -->
<article id="post-<?php the_ID(); // Insert the page ID ?>">

	<?php if (have_posts()) : while (have_posts()) : the_post(); // The WordPress post loop. If there's content for this page, do the following... ?>

		<!-- Start of the heading section -->
		<header>
			<!-- The page heading -->
			<h1><?php the_title(); // The post title ?></h1>
		</header>

		<!-- The page content -->
		<?php the_content(); ?>

	<?php endwhile; endif; // End the post loop ?>

</article><!-- End the page content -->

<?php get_footer(); // Pulls in the footer.php template ?>
