<?php
/**
 * The Template for displaying the Help tab.
 *
 * @var array  $options         Array of options.
 * @var string $current_tab     The current tab.
 * @var string $current_sub_tab The current sub-tab.
 * @var array  $latest_articles Latest HC articles.
 *
 * @package YITH\PluginFramework\Templates
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$current_locale       = get_user_locale();
$the_title            = $options['title'];
$the_description      = $options['description'];
$show_articles        = $options['show_hc_articles'] && ! empty( $latest_articles );
$show_submit_ticket   = $options['show_submit_ticket'] && $options['submit_ticket_url'];
$has_video            = $options['main_video'] && ! empty( $options['main_video']['url'] );
$show_view_all_faq    = ! ! $options['hc_url'];
$has_any_playlist     = ! ! $options['playlists'];
$has_additional_links = $has_any_playlist || ! ! $options['doc_url'] || $show_view_all_faq;
$has_default_playlist = $options['playlists'] && ! empty( $options['playlists'] );

// search for correct video url.
$video_url = false;

if ( $has_video ) {
	if ( is_array( $options['main_video']['url'] ) ) {
		if ( ! empty( $options['main_video']['url'][ $current_locale ] ) ) {
			$video_url = $options['main_video']['url'][ $current_locale ];
		} elseif ( ! empty( $options['main_video']['url']['en_US'] ) ) {
			$video_url = $options['main_video']['url']['en_US'];
		}
	} else {
		$video_url = $options['main_video']['url'];
	}
}

// search for correct playlist.
$default_playlist = false;

if ( $has_default_playlist ) {
	if ( is_array( $options['playlists'] ) ) {
		if ( ! empty( $options['playlists'][ $current_locale ] ) ) {
			$default_playlist = $options['playlists'][ $current_locale ];
		} elseif ( ! empty( $options['playlists']['en_US'] ) ) {
			$default_playlist = $options['playlists']['en_US'];
		}
	} else {
		$default_playlist = $options['playlists'];
	}
}
?>

<div id='yith_plugin_fw_panel_help_tab' class='yith-plugin-fw-panel-help-tab-container'>
	<div class="yith-plugin-fw-panel-help-tab-content">
		<?php if ( $the_title ) : ?>
			<h2 class="yith-plugin-fw-panel-help-tab-title"><?php echo wp_kses_post( $the_title ); ?></h2>
		<?php endif; ?>

		<?php if ( $the_description ) : ?>
			<p class="yith-plugin-fw-panel-tab-description">
				<?php echo wp_kses_post( $the_description ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $has_video || $has_additional_links ) : ?>
			<div class="row">
				<?php if ( $video_url ) : ?>
					<div class="yith-plugin-fw-help-tab-video <?php echo $has_additional_links ? 'column-left' : 'full-width'; ?>">
						<?php if ( isset( $options['main_video']['desc'] ) ) : ?>
							<p class="video-description"><?php echo wp_kses_post( $options['main_video']['desc'] ); ?></p>
						<?php endif; ?>

						<div class="video-container">
							<iframe src="<?php echo esc_url( $video_url ); ?>"></iframe>
						</div>

						<?php if ( $has_any_playlist ) : ?>
							<div class="video-caption">
								<?php if ( $default_playlist ) : ?>
									<p>
										<?php
										// translators: 1. Url to EN playlist.
										echo wp_kses_post( sprintf( _x( 'Check the full <a href="%s" target="_blank">Playlist on Youtube</a> to learn more >', 'Help tab view all video link', 'yit-plugin-fw' ), $default_playlist ) );
										?>
									</p>
								<?php endif; ?>

								<p>
									<b>
										<?php echo esc_html_x( 'Videos are also available in:', 'Help tab Watch Videotutorials link', 'yit-plugin-fw' ); ?>
									</b>
									<?php $first = true; ?>
									<?php foreach ( $options['playlists'] as $lang => $url ) : ?>
										<?php
										if ( $url === $default_playlist ) {
												continue;
										}
										?>
										<?php if ( ! $first ) : ?>
											<span class="separator">|</span>
										<?php endif; ?>

										<a target="_blank" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( yit_get_language_from_locale( $lang, true ) ); ?></a>

										<?php $first = false; ?>
									<?php endforeach; ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $has_additional_links ) : ?>
					<ul class="yith-plugin-fw-help-tab-actions <?php echo $has_video ? 'column-right' : 'full-width'; ?>">

						<?php if ( $options['doc_url'] ) : ?>
							<li class="read-documentation box-with-shadow">
								<a target="_blank" href="<?php echo esc_url( $options['doc_url'] ); ?>">
									<h4>
										<?php echo esc_html_x( 'Read the documentation', 'Help tab Read Documentation link', 'yit-plugin-fw' ); ?>
									</h4>
									<p class="description">
										<?php echo esc_html_x( 'to learn from basics how it works', 'Help tab Read Documentation link', 'yit-plugin-fw' ); ?>
									</p>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( $has_any_playlist ) : ?>
							<li class="watch-videotutorials box-with-shadow">
								<a target="_blank" href="<?php echo esc_url( $options['playlists']['en_US'] ); ?>">
									<h4>
										<?php echo esc_html_x( 'Watch our videotutorials', 'Help tab Watch Videotutorials link', 'yit-plugin-fw' ); ?>
									</h4>
									<p class="description">
										<?php echo esc_html_x( 'We show you some case uses', 'Help tab Watch Videotutorials link', 'yit-plugin-fw' ); ?>
									</p>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( $show_view_all_faq ) : ?>
							<li class="check-faqs box-with-shadow">
								<a target="_blank" href="<?php echo esc_url( $options['hc_url'] ); ?>">
									<h4>
										<?php echo esc_html_x( 'Check the FAQs', 'Help tab view FAQs link', 'yit-plugin-fw' ); ?>
									</h4>
									<p class="description">
										<?php echo esc_html_x( 'to find answers to your doubts', 'Help tab view FAQs link', 'yit-plugin-fw' ); ?>
									</p>
								</a>
							</li>
						<?php endif; ?>

					</ul>
				<?php endif; ?>
			</div>
		<?php endif; ?>


		<?php if ( $show_articles || $show_submit_ticket ) : ?>
			<div class="row">
				<?php if ( $show_articles ) : ?>
					<div class="yith-plugin-fw-hc-articles <?php echo $show_submit_ticket ? 'column-left' : 'full-width'; ?>">
						<h3 class="yith-plugin-fw-hc-articles-title"><?php echo esc_html_x( 'Last FAQs in our Help Center', 'Help tab FAQ title', 'yit-plugin-fw' ); ?></h3>

						<ul class="yith-plugin-fw-hc-articles-list">
							<?php foreach ( $latest_articles as $article ) : ?>
								<li>
									<a target="_blank" href="<?php echo esc_url( $article['url'] ); ?>">
										<?php echo esc_html( $article['title'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>

						<?php if ( $show_view_all_faq ) : ?>
							<a target="_blank" class="button button-secondary" href="<?php echo esc_url( $options['hc_url'] ); ?>">
								<?php echo esc_html_x( 'View all FAQs >', 'Help tab FAQ link', 'yit-plugin-fw' ); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $show_submit_ticket ) : ?>
					<div class="yith-plugin-fw-submit-ticket <?php echo $show_articles ? 'column-right' : 'full-width'; ?>">
						<div class="box-with-shadow">
							<h3><?php echo esc_html_x( 'Need help?', 'Help tab submit ticket title', 'yit-plugin-fw' ); ?></h3>
							<p>
								<?php
									echo esc_html_x(
										'If you are experiencing some technical issue ask help to our developers. Submit a ticket in our support desk and we will help you as soon as possible.',
										'Help tab submit ticket description',
										'yit-plugin-fw'
									);
								?>
							</p>
							<a target="_blank" href="<?php echo esc_url( $options['submit_ticket_url'] ); ?>" class="yit-plugin-fw-submit-ticket-button button button-primary">
								<?php echo esc_html_x( 'Submit a ticket', 'Help tab submit ticket button', 'yit-plugin-fw' ); ?>
							</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
