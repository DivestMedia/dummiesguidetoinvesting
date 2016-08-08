<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>

<table id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies table table-hover">

	<thead class="bbp-header">
		<tr>
			<th class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></th><!-- .bbp-reply-author -->

			<th class="bbp-reply-content">

				<?php if ( !bbp_show_lead_topic() ) : ?>

					<?php _e( 'Posts', 'bbpress' ); ?>

					<?php bbp_topic_subscription_link(); ?>

					<?php bbp_user_favorites_link(); ?>

				<?php else : ?>

					<?php _e( 'Replies', 'bbpress' ); ?>

				<?php endif; ?>

			</th><!-- .bbp-reply-content -->
		</tr>
	</thead><!-- .bbp-header -->

	<tbody class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>

			<?php bbp_list_replies(); ?>

		<?php else : ?>

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</tbody><!-- .bbp-body -->

	<tfoot class="bbp-footer">
		<tr>
			<th class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></th>

			<th class="bbp-reply-content">

				<?php if ( !bbp_show_lead_topic() ) : ?>

					<?php _e( 'Posts', 'bbpress' ); ?>

				<?php else : ?>

					<?php _e( 'Replies', 'bbpress' ); ?>

				<?php endif; ?>

			</th><!-- .bbp-reply-content -->
		</tr>
	</tfoot><!-- .bbp-footer -->

</table><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
