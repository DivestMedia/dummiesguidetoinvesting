<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<table id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics table table-hover">

	<thead class="bbp-header">

		<tr class="forum-titles">
			<th class="bbp-topic-title"><?php _e( 'Topic', 'bbpress' ); ?></th>
			<th class="bbp-topic-voice-count"><?php _e( 'Voices', 'bbpress' ); ?></th>
			<th class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></th>
			<th class="bbp-topic-freshness"><?php _e( 'Freshness', 'bbpress' ); ?></th>
		</tr>

	</thead>

	<tbody class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</tbody>

	<tfoot class="bbp-footer">

		<tr class="tr">
			<td colspan="4">
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</td>
		</tr><!-- .tr -->

	</tfoot>

</table><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
