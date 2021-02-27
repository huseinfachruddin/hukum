

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(img/hukum.jpg);">
                    <span class="login100-form-title-1">
                        Register
                    </span>
                </div>

                <form class="login100-form validate-form" method="post" action="<?= base_url('auth/register');?>">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="name" placeholder="Enter username" value="<?= set_value('name')?>">
                        <span class="focus-input100"></span>
                        <?php echo form_error('name','<small class="text-danger">','</small>');?>
                    </div>
                     <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="text" name="email" placeholder="Enter email" value="<?= set_value('email')?>">
                            <span class="focus-input100"></span>
                            <?php echo form_error('email','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                        <?php echo form_error('password','<small class="text-danger">','</small>');?>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Re-Password</span>
                        <input class="input100" type="password" name="password2" placeholder="Enter password">
                        <span class="focus-input100"></span>
                        <?php echo form_error('password2','<small class="text-danger">','</small>');?>
                    </div>

                  

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="cb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="cb1">
                                I agree with terms and conditions
                            </label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn"><a href=""></a>Register
                        </button>
                    </div>

                    <h6 class="mt-4">Already have an account? <a href="<?= base_url('auth');?>"
                            class="text-success font-weight-bold">Login</a></h6>

                </form>
            </div>
        </div>
    </div>

