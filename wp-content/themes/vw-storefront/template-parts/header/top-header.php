<?php
/**
 * The template part for top header
 *
 * @package VW Storefront 
 * @subpackage vw-storefront
 * @since vw-storefront 1.0
 */
?>

<?php if( get_theme_mod( 'vw_storefront_email_address') != '' || get_theme_mod( 'vw_storefront_location') != '' || get_theme_mod( 'vw_storefront_discount_text') != '') { ?>
  <div class="top-bar pt-2 pb-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <?php if( get_theme_mod( 'vw_storefront_email_address') != '') { ?>
            <p><i class="<?php echo esc_attr(get_theme_mod('vw_storefront_email_icon','fas fa-envelope')); ?>"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_storefront_email_address',''));?>"><?php echo esc_html(get_theme_mod('vw_storefront_email_address',''));?></a></p>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php if( get_theme_mod( 'vw_storefront_location') != '') { ?>
            <p><i class="<?php echo esc_attr(get_theme_mod('vw_storefront_location_icon','fas fa-map-marker-alt')); ?>"></i><?php echo esc_html(get_theme_mod('vw_storefront_location',''));?></p>
          <?php } ?>
        </div>
        <div class="col-lg-5 col-md-4">
          <?php if( get_theme_mod( 'vw_storefront_discount_text') != '') { ?>
            <p class="discount"><?php echo esc_html(get_theme_mod('vw_storefront_discount_text',''));?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>