<link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
<!-- Modal -->
<div class="modal fade" id="csbModalogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="csbModaloginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="csbModaloginLabel"><i class="fas fa-user-lock"></i> <em>LOGIN</em>
                    CALON SANTRI
                </h1>
                <a href="<?=base_url()?>" class="btn-close"></a>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?=base_url('assets/logo/login.png')?>" class="m-0 p-0" alt="Login Image">
                    <!-- <div>
                        <h3><em>Login</em> Calon Santri</h3>
                    </div> -->
                    <div class="login-box-msg mb-2">Masuk dengan <b>NISN</b> atau <b>Nomor Registrasi</b> yang
                        telah
                        terdaftar.
                    </div>
                </div>
                <form action="<?=base_url('login')?>" id="login-form" method="post">
                    <?=csrf_field()?>



                    <div class="input-group mb-3">
                        <input type="text" name="xnisn" id="xnisn" class="form-control"
                            placeholder="NISN / Nomor Registrasi">
                        <div class="input-group-text">
                            <span class="fas fa-graduation-cap"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="xpass" class="form-control" id="xpass" placeholder="Password">
                        <div class="input-group-text showpass">
                            <i class="far fa-eye-slash"></i>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" id="BtnLogin" class="btn btn-primary btn-block shadow-sm"><i
                                class="fas fa-sign-in-alt"></i> Login</button>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3 mt-3">
                    Saya belum punya Nomor Registrasi ? <a href="<?=base_url('register')?>"> Buat Nomor</a>
                </div>
                <div class="mt-1 text-center">
                    <!-- <button id="btn-install-app" class=" btn btn-dark bg-black btn-sm shadow-sm"
                        style="display:none;border-radius:50px">
                        <i class="fas fa-mobile-alt"></i> Install
                        Aplikasi</button> -->
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
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
        url: $(this).attr('action'),
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
                if (response.xnisn) {
                    $('#xnisn').addClass('is-invalid')
                    toastr.error(response.xnisn)
                } else {
                    $('#xnisn').removeClass('is-invalid')
                    $('#xnisn').addClass('is-valid')

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

                // Swal.fire({
                //     icon: 'success',
                //     title: 'Login Berhasil',
                //     showConfirmButton: false,
                //     text: response.message,
                //     timer: 1500
                // }).then((result) => {
                // })
            }
        }
    });

});
</script>