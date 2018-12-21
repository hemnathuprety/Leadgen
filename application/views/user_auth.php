<!DOCTYPE html>
<html lang="en">
<head>
    <title>Go Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= assets_uri("images/survey.png", "admin") ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= assets_uri("vendor/bootstrap/css/bootstrap.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_uri("fonts/font-awesome-4.7.0/css/font-awesome.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_uri("fonts/Linearicons-Free-v1.0.0/icon-font.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_uri("fonts/iconic/css/material-design-iconic-font.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css" href="<?= assets_uri("vendor/animate/animate.css", "login") ?>">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_uri("vendor/css-hamburgers/hamburgers.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_uri("vendor/animsition/css/animsition.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css" href="<?= assets_uri("vendor/select2/select2.min.css", "login") ?>">
    <link rel="stylesheet" type="text/css" href="<?= assets_uri("css/util.css", "login") ?>">
    <link rel="stylesheet" type="text/css" href="<?= assets_uri("css/main.css", "login") ?>">
</head>

<body style="background-color: #999999;">

<div class="limiter">
    <div class="container-login100">
        <div class="login100-more"
             style="background-image: url('<?= assets_uri("images/bg-01.jpg", "login") ?>');"></div>

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form action="<?= base_url("UserAuth/process_login") ?>" class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-59">
						Sign In
					</span>

                <div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">Email/Username</span>
                    <input class="input100" type="text" name="email" placeholder="Email/Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-m w-full p-b-33">
                    <div class="contact100-form-checkbox">
                        <span class="txt1">
                            <a href="#" class="txt2 hov1">
                                Forgot password?
                            </a>
                        </span>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <div>

                    </div>
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Sign In
                        </button>
                    </div>
                </div>
                <div class="flex-m w-full p-b-33">
                </div>
                <div class="contact100-form">
                        <span class="txt4">
                           <?= @$this->session->flashdata("err_msg"); ?>
                        </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= assets_uri("vendor/jquery/jquery-3.2.1.min.js", "login") ?>"></script>
<script src="<?= assets_uri("vendor/animsition/js/animsition.min.js", "login") ?>"></script>
<script src="<?= assets_uri("vendor/bootstrap/js/popper.js", "login") ?>"></script>
<script src="<?= assets_uri("vendor/bootstrap/js/bootstrap.min.js", "login") ?>"></script>
<script src="<?= assets_uri("vendor/select2/select2.min.js", "login") ?>"></script>
<script src="<?= assets_uri("js/main.js", "login") ?>"></script>

</body>
</html>