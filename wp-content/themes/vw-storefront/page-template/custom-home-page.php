<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">  
  <?php do_action( 'vw_storefront_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_storefront_slider_arrows', false) != '' || get_theme_mod( 'vw_storefront_resp_slider_hide_show', true) != '') { ?>
    <section id="slider">
      <?php if(get_theme_mod('vw_storefront_slider_type', 'Default slider') == 'Default slider' ){ ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $vw_storefront_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_storefront_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_storefront_pages[] = $mod;
            }
          }
          if( !empty($vw_storefront_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_storefront_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('vw_storefront_slider_small_title') != '' ){ ?>
                    <div class="mb-1 wow zoomInDown" data-wow-duration="3s">
                      <span class="slider-badge mb-1"><?php echo esc_html(get_theme_mod('vw_storefront_slider_small_title',''));?></span>
                    </div>
                  <?php }?>
                  <h1 class="wow zoomInDown" data-wow-duration="3s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow zoomInDown" data-wow-duration="2s"><?php $vw_storefront_excerpt = get_the_excerpt(); echo esc_html( vw_storefront_string_limit_words( $vw_storefront_excerpt, esc_attr(get_theme_mod('vw_storefront_slider_excerpt_number','8')))); ?></p>
                  <?php if( get_theme_mod('vw_storefront_topbar_btn_text','SHOP NOW') != '' || get_theme_mod('vw_storefront_topbar_btn_link') != ''){ ?>
                    <div class="more-btn mt-4 mb-4 wow zoomInDown" data-wow-duration="2s">
                      <a href="<?php echo esc_url(get_theme_mod('vw_storefront_topbar_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('vw_storefront_topbar_btn_text',__('SHOP NOW','vw-storefront')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_storefront_topbar_btn_text',__('SHOP NOW','vw-storefront')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-storefront' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-storefront' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
      <?php } else if(get_theme_mod('vw_storefront_slider_type', 'Advance slider') == 'Advance slider'){?>
          <?php echo do_shortcode(get_theme_mod('vw_storefront_advance_slider_shortcode')); ?>
        <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'vw_storefront_after_slider' ); ?>

  <section id="product-sec" class="pt-5 pb-5 wow bounceInUp delay-1000" data-wow-duration="2s">
    <div class="container">
      <?php $vw_storefront_product_page = array();
        $mod = absint( get_theme_mod( 'vw_storefront_product_settings','vw-storefront'));
        if ( 'page-none-selected' != $mod ) {
          $vw_storefront_product_page[] = $mod;
        }
        if( !empty($vw_storefront_product_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_storefront_product_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="heading-txt mb-4 text-center">
                <p class="mb-0"><?php echo esc_html(get_theme_mod('vw_storefront_section_text',''));?></p>
                <h2><?php the_title(); ?></h2>
              </div>
              <?php the_content(); ?>
            <?php $count++; endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata()
      ?>
    </div>
  </section>

  <?php do_action( 'vw_storefront_after_service' ); ?>

  <div id="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>