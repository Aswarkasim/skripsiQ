<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive thumbnail" src="<?= base_url('assets/uploads/images/' . $profil->foto) ?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?= $profil->namalengkap ?></h3>

                    <p class="text-muted text-center"><?= $profil->profesi ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Job</b> <a class="pull-right"><?= count($job) ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Skill</b> <a class="pull-right"><?= count($skill) ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Username</b> <a class="pull-right"><?= $profil->username ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?= $profil->email ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Telepon</b> <a class="pull-right"><?= $profil->hp ?></a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tentang Saya</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-tag margin-r-5"></i> Username</strong>
                    <p class="text-muted">
                        <?= $profil->username ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-globe margin-r-5"></i> Tanggal Lahir</strong>
                    <p class="text-muted">
                        <?= $profil->tgl_lahir ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                    <p class="text-muted">
                        <?= $profil->alamat ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-building margin-r-5"></i> Kota/Kabupaten</strong>
                    <p class="text-muted">
                        <?= $profil->kota ?>
                    </p>
                    <hr>
                    <a href="" data-toggle="modal" data-target="#modalProfil">Deskripsi</a>
                    <hr>



                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#job" data-toggle="tab">Job</a></li>
                    <li><a href="#skill" data-toggle="tab">Skill</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="job">
                        <?php include('job.php') ?>
                    </div>
                    <div class="tab-pane" id="skill">
                        <?php include('skill.php') ?>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>


<div class="modal fade" id="modalProfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= $profil->namalengkap ?></h4>
            </div>
            <div class="modal-body">
                <?= $profil->deskripsi ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>