<!-- The content of this template is what appears at the bottom of each page. -->

		<!-- Start the footer section. Class tags center and lighten text, and reduce font size. -->
		<footer class="small muted text-center">

			<!-- Add a line at the top of the footer -->
			<hr>

			<!-- 
			  Pulls in the search form. This is controlled in the functions.php template.
			  If you'd prefer to move this to a dedicated serach page, you can insert
			  a search form into the WordPress editor using [searchform] shortcode.
			-->
			<?php echo gmf_wpsearch(); ?>

			<!-- Copyright Info -->
			<p>Copyright &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>.</p>

			<!-- Theme info. You don't have to keep this in, but I'd appreciate if you did. -->
			<p><a href="http://gomakethings.com/go-mobile-first/">Go Mobile First theme by Chris Ferdinandi</a>.</p>
			
		</footer><!-- End footer section -->

	</section><!-- End the main section (started in the header) -->

	<?php wp_footer(); // WordPress footer info. Used to include javascript files in the footer. DO NOT DELETE. ?>

	<!-- JAVASCRIPT FILES -->
	<!-- If you're using Google Analytics or some other analytics script, add it here. -->

</body><!-- End the Body tag -->

</html><!-- End the HTML tag -->
