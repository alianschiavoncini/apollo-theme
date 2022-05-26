<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Apollo Hotel
 */
?>
<section class="footer-main">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
			<p class="copyright"><?php esc_html_e( '&copy; Copyright', 'apollo-hotel' ); ?> <?php echo date_i18n( esc_html__( 'Y', 'apollo-hotel' ) ); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'apollo-hotel' ); ?>.</p>
			<p class="credits"><?php esc_html_e( 'WordPress Theme by', 'apollo-hotel' ); ?> <a href="https://www.astrothemes.com" class="credits-link" target="_blank">AstroThemes</a></p>
          </div>
        </div>          
    </div>
</section>
