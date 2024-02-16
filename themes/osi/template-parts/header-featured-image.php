<?php

if ( function_exists( 'Sugar_Calendar\AddOn\Ticketing\Settings\get_setting' ) ) {

	$recepit_page_id = Sugar_Calendar\AddOn\Ticketing\Settings\get_setting( 'receipt_page' );

	if ( get_the_ID() === absint( $recepit_page_id ) ) {
		$page_title = __( 'Confirmation', 'osi' );
	}
}

if ( ! isset( $page_title ) ) {
	$page_title = get_the_title();
}

?>

<?php if ( has_post_thumbnail() ) : ?>
	<header class="entry-header cover--header">
		<div class="wp-block-cover alignfull">
			<img class="wp-block-cover__image-background" alt="" src="<?php the_post_thumbnail_url(); ?>" data-object-fit="cover"/>
			<div class="wp-block-cover__inner-container">
			</div>
		</div>
	</header>
<?php else : ?>
	<header class="entry-header cover--header no-thumbnail">
		<div class="wp-block-cover alignfull has-neutral-dark-background-color has-background-dim-100 has-background-dim">
			<div class="wp-block-cover__inner-container">
				<?php echo ( ! empty( $page_title ) && ! is_singular( 'sc_event' ) ) ? '<h1 class="entry-title page--title">' . esc_html( $page_title ) . '</h1>' : ''; ?>
				<?php osi_the_page_dates(); ?>
			</div>
		</div>
	</header>
<?php endif; ?>
