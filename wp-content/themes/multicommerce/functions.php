<?php
/**
 * Multi Commerce functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */

/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ).'inc/init.php';


/**
 * Add the product's short description (excerpt) to the WooCommerce shop/category pages. The description displays after the product's name, but before the product's price.
 *
 * Ref: https://gist.github.com/om4james/9883140
 *
 * Put this snippet into a child theme's functions.php file
 */
function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;
	if ( ! $product->post->post_excerpt ) return;
	?>
	<div itemprop="description">
		<?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);