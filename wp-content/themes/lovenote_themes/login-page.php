<?php
/*

Template Name: login page

*/

get_header(); ?>

	<div class="bg-main">

		<div class="bg-login">
			<div class="container">				
				<div class="bg-login2">
					<h1>Đăng nhập</h1>

					<?php
						$args = array(
							'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
							'form_id'        => 'dangnhap', //Để dành viết CSS
							'label_username' => __( 'Tên tài khoản' ),
							'label_password' => __( 'Mật khẩu' ),
							'label_remember' => __( 'Ghi nhớ' ),
							'label_log_in'   => __( 'Đăng nhập' ),
						);
						wp_login_form($args);
					?>
				</div>


				<?php
					$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
					if ( $login === "failed" ) {
						echo '<p><strong>ERROR:</strong> Sai username hoặc mật khẩu.</p>';
					} elseif ( $login === "empty" ) {
						echo '<p><strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.</p>';
					} elseif ( $login === "false" ) {
						echo '<p><strong>ERROR:</strong> Bạn đã thoát ra.</p>';
					}
				?>
			</div>
		</div>


		<!-- flower main -->

		<img class="flower-main" src="<?php bloginfo('template_directory') ?>/images/img18.png">
	</div>

<?php get_footer(); ?>