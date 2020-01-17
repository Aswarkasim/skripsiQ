<section class="jobguru-top-job-area browse-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="browse-job-head-option">
                    <div class="job-browse-search">
                        <form>
                            <input type="search" placeholder="Search Jobs Here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="job-browse-action">
                        <!-- <div class="email-alerts">
                            <input type="checkbox" class="styled" id="b_1">
                            <label class="styled" for="b_1">email alerts for this search</label>
                        </div> -->
                        <div class="dropdown">
                            <button class="btn-dropdown dropdown-toggle" type="button" id="dropdowncur" data-toggle="dropdown" aria-haspopup="true">Short By</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdowncur">
                                <li>Newest</li>
                                <li>Oldest</li>
                                <li>Random</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <?php foreach ($job as $row) { ?>
                <div class="col-md-12 col-lg-4">
                    <div class="sigle-top-job">
                        <div class="top-job-company-image">
                            <div class="">
                                <a href="#">
                                    <img src="<?= base_url('assets/uploads/job/' . $row->gambar) ?>" alt="company image">
                                </a>
                            </div>
                            <h3><a href="#"><?= $row->nama_job ?></a></h3>
                        </div>
                        <div class="top-job-company-desc">
                            <!-- <ul>
                                <li>Lokasi <span class="company-state"><i class="fa fa-map-marker"></i> Brisbane</span></li>
                                <li>Upah <span class="open-icon"><i class="fa fa-credit-card-alt"></i><?= 'Rp. ' . $row->upah_min . ' - Rp. ' . $row->upah_max ?></span></li>
                                <li>Status <span class="varify"><i class="fa fa-check"></i>part time</span></li>
                            </ul> -->
                            <div class="top-job-company-btn">
                                <a href="<?= base_url('user/job/detail/' . $row->id_job) ?>" class="jobguru-btn-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</section>