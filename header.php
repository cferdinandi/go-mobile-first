<!DOCTYPE html><!-- Set the doc type as HTML5 -->
<!-- The content in this template is what appears at the top of each page -->


<!-- Set the language. Important for screen readers. -->
<html lang="en">

<!-- Start Head section. Contains information for browsers. -->
<head>

	<!-- Define the character set (WordPress uses UTF-8) -->
	<meta charset="<?php bloginfo('charset'); // Character set value added by WordPress ?>">

	<!-- Blog title (Displays in browser menu bar) -->
	<title><?php bloginfo('name'); // Insert blog name ?></title>

	<!-- HTML5 Shim. Adds HMTL5 semantic element support to older browsers. -->
	<!--[if lt IE 9]>    
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Call the stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">

	<!-- Tell mobile devices that content is mobile friendly -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Icons -->
	<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-144.png">

	<!-- RSS for browsers that autodetect it. If you use Feedburner or an alternative, change it here. -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">

	<!-- The pingback URL -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- WordPress Header Info. DO NOT DELETE. -->
	<?php wp_head(); ?>

</head><!-- End Header section -->


<!-- Start the body section -->
<body>

	<!-- Warning for people using IE7 or lower -->
	<!--[if lte IE 7]>
		<div class="container">
			<p>Did you know that your web browser (<em>the program you're using to access the internet</em>) is a bit old? Some of the content on this site might look a bit funny as a result. <a href="http://browsehappy.com/">Upgrade your browser</a> for a faster, better, and safer web experience.</p>
			<hr>
		</div>
	<![endif]-->


	<!-- Start Header content. Sets max width for content and centers text. -->
	<header class="container text-center">

		<!-- Logo Text. Removes top padding and margin. Reduces bottom margin. -->
		<h1 class="no-space-top small-space-bottom">
			<!-- Link to homepage. Logo class overrides default link hover behavior. -->
			<a class="logo" href="<?php echo get_option('home'); // Homepage URL ?>/">
				<?php bloginfo( 'name' ); // Insert site title ?>
			</a>
		</h1>

		<!-- Description of site with lightened text and bottom margin. -->
		<p class="muted">
			<?php bloginfo( 'description' ); // Insert site description ?>
		</p>

		<!-- Skip Navigation link for screen readers. Hidden off-screen. -->
		<a class="screen-reader" href="#skipnav">Skip over navigation</a>


		<!-- Start site navigation -->
		<nav>

			<!-- Menu button for small screen drop-down menu. Hidden on bigger screens and browsers without javascript. -->
			<ul class="nav muted responsive-nav">
				<li>
					<a data-toggle="collapse" href="#menu">Menu</a>
				</li>
			</ul>

			<!-- The navigation links. Extra div neccessary for drop-down behavior on small screens. -->
			<div class="nav-mobile" id="menu">

				<!-- Navigation list, with "lightened" text. Muted links display black. Remove "muted" tag to show default link colors. -->
				<ul class="nav muted">
					<li>
						<!-- Link to homepage -->
						<a href="<?php echo get_option('home'); ?>/">Home</a>
					</li>
					<li>
						<!-- Link to about page -->
						<a href="<?php echo get_option('home'); ?>/about/">About</a>
					</li>
					<li>
						<!-- Link to RSS feed -->
						<a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a>
					</li>
					<!-- Add additional links as needed -->
				</ul>
			</div>
		</nav><!-- End site navigation -->


	</header><!-- End Header content -->


	<!-- 
	  Start the main section (closed in footer). 
	  Container class sets max width for the whole page.
	  ID tag tells Skip Navigation link where to jump to. 
	-->
	<section class="container" id="skipnav">
