<div class="mobilemenu mobilemenu-overlay">
    <svg class="menuclose" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
        <g>
            <path d="M962.2,13.3l24.4,24.4L34.4,989.8L10,965.5L962.2,13.3z"/>
            <path d="M39.2,10L990,960.9L960.9,990L10.1,39.1L39.2,10L39.2,10z"/>
        </g>
    </svg>
    <div class="menu-content">
        <img src="<?php echo Wappz\Assets\asset_path( 'images/logo.svg' );?>"
             alt="Logo Jump Parks Europe"/>
		<?php
		if ( has_nav_menu( 'primary_navigation' ) ) :
			wp_nav_menu( [ 'theme_location' => 'primary_navigation', 'menu_class' => 'firstmobilemenu' ] );
		endif;
		?>
    </div>
</div>

