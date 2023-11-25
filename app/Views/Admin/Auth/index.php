<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Administrator</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/favicon_io/favicon-16x16.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/logo/psb_login.png')?>" alt="Logo PPDB">
                    <p class="login-box-msg">Masuk dengan <b>Email</b> dan <b>Password</b> yang telah terdaftar.
                    </p>

                </div>
                <form action="#" id="login-form" method="post">
                    <?=csrf_field()?>
                    <div class="input-group mb-3">
                        <input type="text" name="xemail" id="xemail" class="form-control" placeholder="E-Mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="xpass" class="form-control" id="xpass" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text showpass">
                                <i class="far fa-eye-slash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" id="BtnLogin"
                                class="btn btn-default bg-gradient-teal btn-block shadow-sm"><i
                                    class="fas fa-sign-in-alt"></i> Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
        <div class="text-center mt-3">
            <strong>Copyright © 2023 <a href="./">ICT - MTIC</a>.</strong>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
    <script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan atau menyembunyikan password
        $(".showpass").click(function() {
            var input = $("#xpass");
            var icon = $(this).find("i");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("far fa-eye-slash text-danger").addClass("far fa-eye text-success");
            } else {
                input.attr("type", "password");
                icon.removeClass("far fa-eye text-success").addClass("far fa-eye-slash text-danger");
            }
        });
    });

    $('#login-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?=base_url('app-login')?>",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#BtnLogin').prop('disabled', true);
                $('#BtnLogin').html(
                    `<i class="fa fa-spin fa-spinner"></i>`
                );
            },
            complete: function() {
                // $('#BtnLogin').show();
                $('#BtnLogin').prop('disabled', false);
                $('#BtnLogin').html(`<i
                                    class="fas fa-sign-in-alt"></i> Login`);
            },
            success: function(response) {
                if (response.status === 'error') {
                    if (response.xemail) {
                        $('#xemail').addClass('is-invalid')
                        toastr.error(response.xemail)
                    } else {
                        $('#xemail').removeClass('is-invalid')
                        $('#xemail').addClass('is-valid')

                    }
                    if (response.xpass) {
                        toastr.error(response.xpass)
                        $('#xpass').addClass('is-invalid')
                    } else {
                        $('#xpass').removeClass('is-invalid')
                        $('#xpass').addClass('is-valid')

                    }
                } else if (response.status == "sukses") {
                    window.location = response.page;
                }
            }
        });

    });
    </script>
</body>

</html>