<!-- This is the template for your comments section -->

<?php // DO NOT DELETE THIS LINES. WORDPRESS NEEDS THEM.
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

?>

<!-- YOU CAN START EDITING HERE -->

<!-- Anchor for links to comments section to point to -->
<a name="comments"></a>

<?php if ($comments) : // If there are comments ?>

	<!-- Section heading -->
	<h2>Comments</h2>

	<!-- Start an unstyled list -->
	<ul class="unstyled">

	<?php foreach ($comments as $comment) : // For each comment, do the following... ?>

		<!-- Sort comments from trackbacks -->
		<?php $comment_type = get_comment_type(); // Get comment type ?>
		<?php if($comment_type == 'comment') { // If comment type is an actual comment... ?>

		<!-- Open a list item -->
		<li id="comment-<?php comment_ID() // Insert comment ID ?>">

			<!-- Adds a line between comments, with no margin beneath it -->
			<hr class="no-space-bottom">

			<!-- If the comment is not approved -->
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em>Your comment is being held for moderation.</em></p>
			<?php endif; ?>

			<!-- Start comment content -->
			<article>

				<!-- Start comment heading. Group class clears image floats after header. -->
				<header class="group">
					<!-- Section for commentor avatar -->
					<figure>
						<!-- Paragraph tag provides bottom margin on image -->
						<p>
							<?php echo get_avatar( $comment, $size = '60' ); // Insert avatar, size of 60 pixels. ?>
						</p>
					</figure>

					<!-- Author name as a heading with no margins or padding -->
					<h3 class="no-space">
						<?php comment_author_link() // Insert name and, if provided, link to their website ?>
					</h3>

					<!-- Section for comment date -->
					<aside>
						<!-- Small, lightened text with a bottom margin -->
						<p class="small muted">
							<?php comment_date('F jS, Y') // Insert the comment date ?>
						</p>
					</aside>

				</header><!-- End comment heading -->

				<?php comment_text() // Insert comment text ?>

			<article><!-- End comment content -->
			
		</li><!-- Close list item -->


		<!-- If the comment is a trackback link, NOT an actual comment -->
		<?php } else { $trackback = true; } // End of is_comment statement ?>
		<?php endforeach; // end for each comment ?>

	</ul><!-- End unstyled list -->

	<!-- Display Trackbacks -->
	<?php if ($trackback == true) { ?>

		<!-- Heading for trackback section -->
		<h3>Places that have linked here</h3>

		<!-- Start ordered list -->
		<ol>
			<?php foreach ($comments as $comment) : // For each comment ?>
				<?php $comment_type = get_comment_type(); // Get post type ?>
				<?php if($comment_type != 'comment') { // If it's a trackback... ?>
					<!-- Start list item -->
					<li>
						<?php comment_author_link() // Insert link back to the referring post ?>
					</li>
				<?php } ?>
			<?php endforeach; ?>
		</ol><!-- End ordered list -->
	<?php } // End of trackback section ?>


<!-- If there are no comments yet -->
<?php else : ?>

	<!-- If comments are allowed but there aren't any -->
	<?php if ('open' == $post->comment_status) : ?>
		<!-- Add your text here if you want -->

	<!-- If comments aren't allowed -->
	<?php else : ?>
		<p>Comments are closed for this post.</p>

	<?php endif; // End "if comments are allowed" if statement ?>

<?php endif; // End "if there are comments" if statement ?>


<!-- Comment Form Section -->
<?php if ('open' == $post->comment_status) : // If comments are allowed ?>

	<!-- Comment Form heading -->
	<h2>Leave a Reply</h2>

	<!-- If user must be logged in to comment... -->
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<!-- Add your text here. -->

	<!-- If anyone can comment... -->
	<?php else : ?>

		<!-- Start the comment form -->
		<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

			<!-- If user is logged in, use their registration info -->
			<?php if ( $user_ID ) : ?>
				<p class="muted"><em>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></em></p>

			<!-- If they're not logged in, let them add their information -->
			<?php else : ?>

				<!-- Name label with small text -->
				<label class="small" for="author">Your Name</label>
				<!-- Name input. Required tag validates field in modern browsers. -->
				<input type="text" name="author" id="author" class="input-medium" value="<?php echo $comment_author; ?>" tabindex="1" required>

				<!-- Email label with small text -->
				<label class="small" for="email">Your Email</label>
				<!-- Email input. Required tag validates field in modern browsers. -->
				<input type="email" name="email" id="email" class="input-medium" value="<?php echo $comment_author_email; ?>" tabindex="2" required>

				<!-- Your Website label with small text -->
				<label class="small" for="url">Your Website (optional)</label>
				<!-- Your Website input. -->
				<input type="url" name="url" id="url" class="input-medium" value="<?php echo $comment_author_url; ?>" tabindex="3" >

			<?php endif; // End if logged in or not statement ?>

				<!-- Comment text area -->
				<textarea name="comment" id="comment" tabindex="4" required></textarea>

				<!-- Submit button. Btn class adds button styling. -->
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="btn" />

				<!-- Hidden field adds ID to the comment -->
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

				<!-- Submit comment on click -->
				<?php do_action('comment_form', $post->ID); ?>

		</form><!-- End the form -->

<?php endif; // If comments are not allowed ?>

<?php endif; // if you delete this the sky will fall on your head ?>
