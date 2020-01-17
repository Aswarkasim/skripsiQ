<!-- Categories Area Start -->
<section class="jobguru-categories-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>top Trending <span>Categories</span></h2>
                    <p>A better career is out there. We'll help you find it. We're your first step to becoming everything you want to be.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($kategori as $row) {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="#" class="single-category-holder account_cat">
                        <div class="category-holder-icon">
                            <i class="<?= $row->icon ?>"></i>
                        </div>
                        <div class="category-holder-text">
                            <h3><?= $row->nama_kategori ?></h3>
                        </div>
                        <img src="<?= base_url() ?>assets/fe/img/account_cat.jpg" alt="category" />
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="load-more">
                    <a href="#" class="jobguru-btn">browse all categories</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Area End -->