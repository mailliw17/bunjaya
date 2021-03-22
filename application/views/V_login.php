<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if (!empty($page_title)) echo $page_title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url() ?>vendor/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>



    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url() ?>vendor/login/images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    BUN JAYA SERVICES
                </span>

                <!-- INI FLASHMESSAGE -->
                <?php if ($this->session->flashdata('gagal_login')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username / Password salah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Password Berhasil Diganti <br>
                        Silahkan Login Ulang !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form class="login100-form validate-form p-b-33 p-t-5" action="<?= base_url() ?>auth" method="POST">
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" id="username" placeholder="Username" autocomplete="off" autofocus>
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>vendor/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>vendor/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/login/js/main.js"></script>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php if ($this->session->flashdata('penyusup')) : ?>
    <script>
        Swal.fire(
            'Error',
            'Silahkan login sebagai Owner!',
            'warning'
        )
    </script>
<?php endif; ?>