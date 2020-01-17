<section class="candidate-dashboard-area section_70">
    <div class="container">
        <div class="row">
            <?php
            include('nav.php')
            ?>
            <div class="col-lg-9 col-md-12">

                <?php
                if ($content) {
                    $this->load->view($content);
                } else {
                    echo 'Halaman tidak ditemukan';
                }

                ?>
            </div>
        </div>
    </div>
</section>