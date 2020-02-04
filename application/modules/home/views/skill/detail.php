<section class="">
    <div class="section_50"></div>
</section>
<div class="container">
    <div class="card card-white single-candidate-widget">
        <?php echo $this->session->userdata('id_skill'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-lg-12">
                    <div class="py-4">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="single-candidate-bottom-left">
                        <div class="single-candidate-widget">
                            <h3><?= $skill->nama_skill ?></h3>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url('assets/uploads/skill/' . $skill->gambar) ?>" alt="First slide">
                                    </div>
                                    <?php foreach ($gambar as $row) { ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="<?= base_url('assets/uploads/skill/' . $row->gambar) ?>" alt="First slide">
                                        </div>
                                    <?php } ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <p>
                                <?= $skill->deskripsi ?>
                            </p>
                        </div>

                        <hr>

                        <?php include('tanggapan.php') ?>

                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="single-candidate-bottom-right">
                        <div class="single-candidate-widget-2">
                            <a href="#" class="jobguru-btn-2">
                                <i class="fa fa-whatsapp"></i>
                                Hubungi WhatsApp
                            </a>
                        </div>
                        <div class="single-candidate-widget-2">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?= $profil->email ?></li><br>
                                <li><i class="fa fa-phone"></i> <?= $profil->hp ?></li><br>
                                <li><i class="fa fa-map"></i> <?= $profil->kota . ',' . $profil->kecamatan ?></li>
                            </ul>
                        </div>
                        <div class="single-candidate-widget-2">
                            <h3>Link Sosial Media</h3>
                            <ul class="candidate-social">
                                <li><a href="<?= $profil->fb ?>"><i class="fa fa-facebook" target="blank"></i></a></li>
                                <li><a href="<?= $profil->tw ?>"><i class="fa fa-twitter" target="blank"></i></a></li>
                                <li><a href="<?= $profil->linkedin ?>" target="blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="<?= $profil->ig ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>