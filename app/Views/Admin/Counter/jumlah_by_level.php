<div class="row">
    <div class="col-lg-4">
        <div class="info-box bg-teal">

            <span class="info-box-icon bg-white"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-bold">Semua Tingkat</span>
                <span class="info-box-number"><?=CountByLevelAndGender(null,$periode)?></span>

                <div class="progress">
                    <div class="progress-bar progress-bar-danger"
                        style="width: <?=CountByLevelAndGender(null,$periode)?>%">
                    </div>
                </div>
                <span class="progress-description">
                    L (<?=CountByLevelAndGender(null,$periode,'L')?>) P
                    (<?=CountByLevelAndGender(null,$periode,'P')?>)
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <?php
// var_dump($periode);
foreach (TabelMaster('master_school_level') as $j) {
    // var_dump();
    ?>
    <div class="col-lg-4">
        <div class="info-box bg-teal">
            <span class="info-box-icon bg-white"><i class="fa fa-graduation-cap"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-bold">Unit <?=$j['level_name']?></span>
                <span class="info-box-number"><?=CountByLevelAndGender($j['id'], $periode)?></span>

                <div class="progress">
                    <div class="progress-bar progress-bar-danger"
                        style="width: <?=CountByLevelAndGender($j['id'], $periode)?>%"></div>
                </div>
                <span class="progress-description">
                    L (<?=CountByLevelAndGender($j['id'], $periode,'L')?>) P
                    (<?=CountByLevelAndGender($j['id'], $periode,'P')?>)
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <?php } ?>
</div>