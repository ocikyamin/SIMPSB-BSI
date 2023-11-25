<?= $this->extend('Landing/Template') ?>
<?= $this->section('content') ?>
<!-- Header Start -->
<div class="container-fluid hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-6 mb-3 animated slideInDown">Login
                </h1>
            </div>
        </div>
        <!-- Header End -->

        <div class="container">
            <div id="area-login-csb"></div>
        </div>


        <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            LoadLoginPage()
        });

        function LoadLoginPage() {
            $.ajax({
                type: "post",
                url: "<?=base_url('login/new')?>",
                data: "data",
                dataType: "json",
                success: function(response) {
                    $('#area-login-csb').html(response.login).show()
                    $('#csbModalogin').modal('show')
                }
            });
        }
        </script>
        <?= $this->endSection() ?>