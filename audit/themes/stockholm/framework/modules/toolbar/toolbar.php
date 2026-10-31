<?php
$stockholm_qode_toolbar = stockholm_qode_return_toolbar_variable();

if ( isset( $stockholm_qode_toolbar ) ) { ?>
	<div id="panel" class="default left" style="margin-left: -245px;">
		<div id="panel-admin">
			<h6><?php esc_html_e( 'Theme Options', 'stockholm' ); ?></h6>
			<div class="panel-admin-box">
				<div class="accordion_toolbar">
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Header Type ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_header_type" class="choose_option">
							<li data-value="normal"><?php esc_html_e( 'Normal', 'stockholm' ); ?></li>
							<li data-value="big"><?php esc_html_e( 'Big', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Header Top Menu ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_header_top_menu" class="choose_option">
							<li data-value="yes"><?php esc_html_e( 'Yes', 'stockholm' ); ?></li>
							<li data-value="no"><?php esc_html_e( 'No', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Ajax Animation', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_page_transitions" class="choose_option">
							<li data-value="no"><?php esc_html_e( 'No', 'stockholm' ); ?></li>
							<li data-value="2"><?php esc_html_e( 'Yes', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Boxed Layout ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_boxed" class="choose_option">
							<li data-value="boxed"><?php esc_html_e( 'Yes', 'stockholm' ); ?></li>
							<li data-value=""><?php esc_html_e( 'No', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Choose Background ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_background">
							<li data-value="background1"><?php esc_html_e( 'Background 1', 'stockholm' ); ?></li>
							<li data-value="background2"><?php esc_html_e( 'Background 2', 'stockholm' ); ?></li>
							<li data-value="background3"><?php esc_html_e( 'Background 3', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Choose Pattern ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_pattern">
							<li data-value="pattern11"><?php esc_html_e( 'Retina Wood', 'stockholm' ); ?></li>
							<li data-value="pattern12"><?php esc_html_e( 'Retina Wood Grey', 'stockholm' ); ?></li>
							<li data-value="pattern1"><?php esc_html_e( 'Transparent', 'stockholm' ); ?></li>
							<li data-value="pattern3"><?php esc_html_e( 'Cubes', 'stockholm' ); ?></li>
							<li data-value="pattern4"><?php esc_html_e( 'Diamond', 'stockholm' ); ?></li>
							<li data-value="pattern5"><?php esc_html_e( 'Escheresque', 'stockholm' ); ?></li>
							<li data-value="pattern10"><?php esc_html_e( 'Whitediamond', 'stockholm' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Pick a Color ', 'stockholm' ); ?><i class="fa fa-angle-down"></i></p>
					<div class="accordion_toolbar_content">
						<div id="tootlbar_colors">
							<ul>
								<li>
									<div class="color active color1" data-color="#ecad81" style="background-color:#ecad81;"></div>
								</li>
								<li>
									<div class="color color2" data-color="#79bc90" style="background-color:#79bc90;"></div>
								</li>
								<li>
									<div class="color color3" data-color="#63a69f" style="background-color:#63a69f;"></div>
								</li>
								<li>
									<div class="color color4" data-color="#7e8aa2" style="background-color:#7e8aa2;"></div>
								</li>
								<li>
									<div class="color color5" data-color="#c84564" style="background-color:#c84564;"></div>
								</li>
								<li>
									<div class="color color6" data-color="#363f46" style="background-color:#363f46;"></div>
								</li>
							</ul>
						</div>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Footer type ', 'stockholm' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_footer_type" class="choose_option">
							<li data-value="regular"><?php esc_html_e( 'Regular', 'stockholm' ); ?></li>
							<li data-value="unfold"><?php esc_html_e( 'Unfold', 'stockholm' ); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<a class="open" href="#"><span><i class="fa fa-cog"></i></span></a>
	</div>
<?php } ?>