<!-- Categories Area Start -->
<section class="jobguru-categories-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>KATEGORI<span></span></h2>
                    <p>Temukan pembagian berdasarkan kategori. siapa tahu cocok!</p>
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
                        <img src="<?= base_url('assets/uploads/kategori/' . $row->gambar) ?>" alt="category" />
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