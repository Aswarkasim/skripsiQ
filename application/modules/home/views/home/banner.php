<style>
    .slider-item-1 {
        background: url(<?= base_url('assets/fe/') ?>img/1000x700.png);
    }

    .slider-item-2 {
        background: url(<?= base_url('assets/fe/') ?>img/slider-1.jpeg);
    }
</style>
<section class="jobguru-banner-area">
    <div class="banner-slider owl-carousel">
        <div class="banner-single-slider slider-item-1">
            <div class="slider-offset"></div>
        </div>
        <div class="banner-single-slider slider-item-2">
            <div class="slider-offset"></div>
        </div>
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-search">
                        <h2>Hire expert freelancers.</h2>
                        <h4>We have 1542 job offers for you! </h4>
                        <form>
                            <div class="banner-form-box">
                                <div class="banner-form-input">
                                    <input type="text" placeholder="Job Title, Keywords, or Phrase">
                                </div>
                                <div class="banner-form-input">
                                    <input type="text" placeholder="City, State or ZIP">
                                </div>
                                <div class="banner-form-input">
                                    <select class="banner-select">
                                        <option selected>Select Sector</option>
                                        <?php foreach ($kategori as $row) { ?>
                                            <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                        <?php } ?>
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