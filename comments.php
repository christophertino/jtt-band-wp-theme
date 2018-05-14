<?php
/**
 * Template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to jtt_comments which is
 * located in includes/modules/comments-module.php
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="comments">
	<?php if (post_password_required()) : ?>
		<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
	<?php elseif (have_comments()) : ?>
		<h3 class="comments-title">
			<?php comments_number('No Responses', 'One Response', '% Responses');?> to &#8220;<?php the_title(); ?>&#8221;</strong>
		</h3>

		<ul class="comment-list no-bullet">
			<?php wp_list_comments(array(
				'callback' => 'jtt_comments'
			)); ?>
		</ul>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
			<div class="navigation grid-x">
				<div class="nav-previous cell small-6"><?php previous_comments_link('<i class="fa fa-angle-left"></i> Older Comments'); ?></div>
				<div class="nav-next cell small-6 text-right"><?php next_comments_link('Newer Comments <i class="fa fa-angle-right"></i>'); ?></div>
			</div>
		<?php endif; ?>

		<?php if (!comments_open() && get_comments_number()) : ?>
			<p class="nocomments">Comments are closed.'</p>
		<?php endif;  ?>

	<?php endif; ?>

	<?php comment_form(array(
		'class_submit' => 'button'
	)); ?>

</div>
