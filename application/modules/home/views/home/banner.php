<!-- <style>
    .slider-item-1 {
        background: url(<?= base_url('assets/fe/') ?>img/1000x700.png);
    }

    .slider-item-2 {
        background: url(<?= base_url('assets/fe/') ?>img/slider-1.jpeg);
    }

    .slider-item-3 {
        background: url(<?= base_url('assets/fe/') ?>img/slider-1.jpeg);
    }
</style> -->
<section class="jobguru-banner-area">
    <div class="banner-slider owl-carousel">
        <?php $no = 1;
        foreach ($banner as $row) { ?>
            <div class="banner-single-slider slider-item-<?= $no ?>">
                <style>
                    .slider-item-<?= $no ?> {
                        background: url(<?= base_url('assets/uploads/banner/' . $row->gambar) ?>);
                    }
                </style>
                <div class="slider-offset"></div>
            </div>
        <?php $no++;
        } ?>
        <!-- <div class="banner-single-slider slider-item-2">
            <div class="slider-offset"></div>
        </div>
        <div class="banner-single-slider slider-item-3">
            <div class="slider-offset"></div>
        </div> -->
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-search">
                        <h2>Cari orang yang kamu butuhkan</h2>
                        <!-- <h4>We have 1542 job offers for you! </h4> -->
                        <form action="<?= base_url('home/cari') ?>" method="post">
                            <div class="banner-form-box">
                                <div class="banner-form-input">
                                    <input type="text" name="keyword" required placeholder="Nama pekerjaan atau skill">
                                </div>
                                <div class="banner-form-input">
                                    <select class="banner-select" name="regional" required>
                                        <option selected>Pilih Regional</option>
                                        <?php foreach ($regional as $row) { ?>
                                            <option value="<?= $row->id_regional ?>"><?= $row->nama_regional ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="banner-form-input">
                                    <select class="banner-select" name="table" required>
                                        <option selected>Pilih Type</option>
                                        <option value="tbl_skill">Skill</option>
                                        <option value="tbl_job">Job</option>
                                    </select>
                                </div>
                                <div class="banner-form-input">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->