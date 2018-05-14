<?php
/**
 * Comment Module
 *
 * Called from comments.php::wp_list_comments()
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

function jtt_comments($comment, $args, $depth) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' : ?>
			<li <?php comment_class('comment-item'); ?>>
				<div class="pingback-entry"><span class="pingback-heading">Pingback:</span> <?php comment_author_link(); ?></div>
			<?php break;
		default : ?>
			<li <?php comment_class('comment-item'); ?>>
				<div <?php comment_class('comment-inner'); ?>>
					<div class="comment-author vcard">
						<?php echo get_avatar($comment, 45); ?>
					</div>
					<div class="comment-details">
						<div class="comment-meta">
							<div class="comment-author-name"><?php comment_author_link(); ?></div>
							<p class="comment-date"><?php echo get_comment_date(); ?> at <?php comment_time(); ?></p>
						</div>
						<?php if ($comment->comment_approved === '0') : ?>
							<p class="comment-awaiting-moderation">Your comment is awaiting moderation.</p>
						<?php endif; ?>
						<div class="comment-content entry">
							<?php comment_text(); ?>
						</div>
						<div class="reply comment-reply-link">
							<?php comment_reply_link(array_merge($args, array(
								'reply_text' => 'Reply to this message',
								'depth'      => $depth,
								'max_depth'	 => $args['max_depth'])
							)); ?>
						</div>
					</div>
				</div>
			</li>
		<?php break;
	endswitch;
} ?>
