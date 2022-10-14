<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
			<?php woocommerce_breadcrumb(); ?>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<?php if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ): ?>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
				<?php echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) ); ?>
            </div>
        </div>
    </div>
	<?php return; ?>
<?php endif; ?>


<!-- Checkout Start -->
<div class="container-fluid">

    <div class="row px-xl-5 mb-3">
        <div class="col-12">
            <div class="bg-light p-30">
	            <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
            </div>
        </div>
    </div>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

        <div class="row px-xl-5">

			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php _e( 'Billing Address', 'woostudy' ); ?></span></h5>
                    <div class="bg-light p-30 mb-5">
		                <?php do_action( 'woocommerce_checkout_billing' ); ?>
		                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                    </div>

                </div><!-- ./col-lg-8 -->
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>

            <div class="col-lg-4">
                2
            </div><!-- ./col-lg-4 -->

        </div><!-- ./row px-xl-5 -->
    </form>
</div><!-- ./container-fluid -->
<!-- Checkout End -->

