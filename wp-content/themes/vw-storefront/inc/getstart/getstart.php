<?php
//about theme info
add_action( 'admin_menu', 'vw_storefront_gettingstarted' );
function vw_storefront_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Storefront', 'vw-storefront'), esc_html__('About VW Storefront', 'vw-storefront'), 'edit_theme_options', 'vw_storefront_guide', 'vw_storefront_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_storefront_admin_theme_style() {
   wp_enqueue_style('vw-storefront-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-storefront-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_storefront_admin_theme_style');

//guidline for about theme
function vw_storefront_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-storefront' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Storefront Theme', 'vw-storefront' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-storefront'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Storefront at 20% Discount','vw-storefront'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-storefront'); ?> ( <span><?php esc_html_e('vwpro20','vw-storefront'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-storefront' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_storefront_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-storefront' ); ?></button>
			<button class="tablinks" onclick="vw_storefront_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-storefront' ); ?></button>
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-storefront' ); ?></button>
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-storefront' ); ?></button>  
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'storefront_pro')"><?php esc_html_e( 'Get Premium', 'vw-storefront' ); ?></button>
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-storefront' ); ?></button>
		</div>

		<?php
			$vw_storefront_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_storefront_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Storefront_Plugin_Activation_Settings::get_instance();
				$vw_storefront_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-storefront-recommended-plugins">
				    <div class="vw-storefront-action-list">
				        <?php if ($vw_storefront_actions): foreach ($vw_storefront_actions as $key => $vw_storefront_actionValue): ?>
				                <div class="vw-storefront-action" id="<?php echo esc_attr($vw_storefront_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_storefront_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_storefront_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_storefront_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-storefront'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_storefront_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Free Storefront WordPress Theme is good to go for your upcoming Woocommerce project. It will also help you to create a market place where you will be able to list down all your products whether they are digital or physical. You will love the layout that is crafted to establish an online space for markets and stores. Creating an online store has become a lot easier using this theme as it allows professional developers and novices to use this theme without getting involved in the cumbersome coding part. It has an extensible code base that facilitates the incredible functioning of your website. By using the right set of plugins and add-ons, you can create an online store where your audience can find the products they are looking for. Establish your brand identity by uploading the store logo so that people could easily recognize your brand. This theme is extensively documented that serves as a reference for designers and users of this theme while hammering out a website.','vw-storefront'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-storefront' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-storefront' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-storefront' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-storefront'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-storefront'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-storefront'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-storefront'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-storefront'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-storefront'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-storefront' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-storefront'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-grid-view"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_product_section') ); ?>" target="_blank"><?php esc_html_e('Featured Product','vw-storefront'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-storefront'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-storefront'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-share"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons Settings','vw-storefront'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-storefront'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-storefront'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-storefront'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-storefront'); ?></span><?php esc_html_e(' Go to ','vw-storefront'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-storefront'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-storefront'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-storefront'); ?></span><?php esc_html_e(' Go to ','vw-storefront'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-storefront'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-storefront'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-storefront'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-storefront/" target="_blank"><?php esc_html_e('Documentation','vw-storefront'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Storefront_Plugin_Activation_Settings::get_instance();
			$vw_storefront_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-storefront-recommended-plugins">
				    <div class="vw-storefront-action-list">
				        <?php if ($vw_storefront_actions): foreach ($vw_storefront_actions as $key => $vw_storefront_actionValue): ?>
				                <div class="vw-storefront-action" id="<?php echo esc_attr($vw_storefront_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_storefront_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_storefront_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_storefront_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-storefront'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_storefront_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-storefront' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-storefront'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','vw-storefront'); ?></span></b></p>
	              	<div class="vw-storefront-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-storefront'); ?></a>
				    </div>
				    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','vw-storefront'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-storefront' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-storefront'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-storefront'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-storefront'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-storefront'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-storefront'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-storefront'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-storefront'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Storefront_Plugin_Activation_Settings::get_instance();
			$vw_storefront_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-storefront-recommended-plugins">
				    <div class="vw-storefront-action-list">
				        <?php if ($vw_storefront_actions): foreach ($vw_storefront_actions as $key => $vw_storefront_actionValue): ?>
				                <div class="vw-storefront-action" id="<?php echo esc_attr($vw_storefront_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_storefront_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_storefront_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_storefront_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-storefront-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-storefront'); ?></a>
			   </div>
			<?php } ?>
		</div>	

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Storefront_Plugin_Activation_Woo_Products::get_instance();
				$vw_storefront_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-storefront-recommended-plugins">
					    <div class="vw-storefront-action-list">
					        <?php if ($vw_storefront_actions): foreach ($vw_storefront_actions as $key => $vw_storefront_actionValue): ?>
					                <div class="vw-storefront-action" id="<?php echo esc_attr($vw_storefront_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_storefront_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_storefront_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_storefront_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-storefront-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-storefront'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-storefront'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-storefront'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-storefront'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-storefront'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-storefront'); ?></span></b></p>
	              	<div class="vw-storefront-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-storefront'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-storefront'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="storefront_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-storefront' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This Storefront WordPress Theme is an intuitive and smartly designed theme that manages to make your store website look simply amazing. You can not only craft a website for single stores but also use it for making multiple vendor websites as well. It has so many useful elements using which you will be able to add so many shopping options for your website. WP Storefront WordPress Theme has a nicely crafted header and top bar with shopping options such as login or sign up options for users. There are plenty of pagination options and its sticky navigation will make your audience stay on your page for a little longer and explore more products. The theme also allows you to manage the content of different sections and adjust the order according to your priority. You can list all your products category wise and start selling them online through your website.','vw-storefront'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_STOREFRONT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-storefront'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-storefront'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-storefront'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-storefront'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-storefront'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-storefront'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-storefront'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-storefront'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-storefront'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-storefront'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-storefront'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-storefront'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-storefront'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-storefront'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-storefront'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-storefront'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-storefront'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-storefront'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-storefront'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>