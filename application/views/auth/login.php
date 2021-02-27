

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?=base_url('assets_2/')?>img/hukum.jpg);">
					<span class="login100-form-title-1">
						Login
					</span>
				</div>
				<?= $this->session->flashdata('message');?>
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth')?>">
				
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Enter username" value="<?= set_value('email')?>">
						<span class="focus-input100"></span>
						<?php echo form_error('email','<small class="text-danger">','</small>');?>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<h6 class="mt-4">Don't have an account yet? <a href="<?=base_url('auth/register')?>"
							class="text-success font-weight-bold">Register</a></h6>
				</form>
			</div>
		</div>
	</div>

