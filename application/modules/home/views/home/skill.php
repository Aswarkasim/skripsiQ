<!-- Categories Area Start -->
<section class="jobguru-categories-area section_70">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>Skill</h2>
                    <p>Pilih orang yang dapan membantu kamu</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($skill as $row) { ?>
                <div class="col-md-10 col-lg-3 thumbnail">
                    <div class="sigle-top-job">
                        <div class="top-job-company-image">
                            <div class="jobThumnail">
                                <a href="#">
                                    <img src="<?= base_url('assets/uploads/skill/' . $row->gambar) ?>" alt="company image">
                                </a>
                            </div>
                            <h3><a href="#"><?= $row->nama_skill ?></a></h3>
                        </div>
                        <div class="top-job-company-desc">
                            <!-- <ul>
                                <li>Lokasi <span class="company-state"><i class="fa fa-map-marker"></i> Brisbane</span></li>
                                <li>Upah <span class="open-icon"><i class="fa fa-credit-card-alt"></i><?= 'Rp. ' . $row->upah_min . ' - Rp. ' . $row->upah_max ?></span></li>
                                <li>Status <span class="varify"><i class="fa fa-check"></i>part time</span></li>
                            </ul> -->
                            <div class="top-job-company-btn">
                                <a href="<?= base_url('home/skill/detail/' . $row->id_skill) ?>" class="jobguru-btn-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="load-more">
                    <a href="<?= base_url('home/skill') ?>" class="jobguru-btn">Lihat semua skill</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Area End -->