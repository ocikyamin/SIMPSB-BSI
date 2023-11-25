<?= $this->extend('Landing/Template') ?>
<?= $this->section('content') ?>

<div class="container-fluid hero-header mb-5">
    <div class="container py-2">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 text-center">
                <!-- <h1 class="display-6 mb-3 animated slideInDown">Login
                </h1> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border-radius:20px">
                    <div class="card-body login-card-body">
                        <div class="text-center">
                            <img src="<?=base_url('assets/logo/login.png')?>" class="m-0 p-0" alt="Login Image">
                            <div>
                                <h3><em>Login</em> Calon Santri</h3>
                            </div>
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
                                <input type="password" name="xpass" class="form-control" id="xpass"
                                    placeholder="Password">
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
                            <button id="btn-install-app" class=" btn btn-dark bg-black btn-sm shadow-sm"
                                style="border-radius:50px">
                                <i class="fas fa-mobile-alt"></i> Install
                                Aplikasi</button>
                        </div>
                        <!-- /.social-auth-links -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Header End -->
<?= $this->endSection() ?>