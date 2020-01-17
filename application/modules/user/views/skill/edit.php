<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="dashboard-right">
    <div class="earnings-page-box manage-jobs">
        <div class="row">
            <div class="col-md-11">
                <p>
                    <a href="<?= base_url('user/skill/detail/' . $skill->id_skill) ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i><b> Kembali</b></a>
                </p>
            </div>
        </div>
        <hr>
        <div class="manage-jobs-heading">
            <h3>Edit Skill <?= $skill->nama_skill ?></h3>
            <!-- <div class="pull-left">
                <a href="" class="btn btn-success">Manajemen Job</a>
            </div> -->
        </div>
        <div class="new-job-submission">
            <?php
            echo validation_errors();

            if (isset($error)) {

                echo $error;
            }
            ?>
            <?php
            echo form_open_multipart(base_url('user/skill/edit/' . $skill->id_skill));
            ?>
            <form action="" method="post">
                <div class="resume-box">
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="j_title">Nama Skill</label>
                            <input placeholder="Nama Skill" type="text" id="j_title" name="nama_skill" value="<?= $skill->nama_skill ?>">
                            <?= form_error('nama_skill', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="Location">Regional:</label>
                            <input type="text" placeholder="Lokasi" name="lokasi" id="Location" value="<?= $skill->nama_skill ?>">
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="j_category">Skill Kategori:</label>
                            <select id="j_category" name="id_kategori">
                                <?php foreach ($kategori as $row) { ?>
                                    <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="single-input">
                            <label for="j_type">Skill Tipe:</label>
                            <select id="j_type" name="job_tipe">
                                <option value="">Select Region</option>
                            </select>
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="mn_salary">Imbalan Minimum (Rp):</label>
                            <input type="text" placeholder="Contoh: 20000" id="mn_salary" name="upah_min" value="<?= $skill->upah_min ?>">
                        </div>
                        <div class="single-input">
                            <label for="mx_salary">Imbalan Maximum (Rp):</label>
                            <input type="text" placeholder="Contoh: 50000" id="mx_salary" name="upah_max" value="<?= $skill->upah_max ?>">
                        </div>
                    </div>
                    <script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
                    <div class="single-resume-feild">
                        <div class="single-input">
                            <label for="j_desc">Deskripsi Job:</label>
                            <textarea id="editorSkill" name="deskripsi"><?= $skill->deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="single-resume-feild upload_file">
                        <div class="text-center">
                            <p>
                                <img src="<?= base_url('assets/uploads/skill/' . $skill->gambar) ?>" alt="" class="img-thumb" width="200px">
                            </p><br>
                            <div class="product-upload">
                                <p>
                                    <i class="fa fa-upload"></i>
                                    Upload Files
                                </p>
                                <input type="file" id="w_screen" name="gambar">
                                <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <p>Gambar akan membantu mendeskripsikan job kamu</p>
                        </div>
                    </div>

                    <div class="single-resume-feild">
                        <div class="single-input">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-picture-o"></i><b> Tambah gambar</b>
                            </button><br>
                            <label for="j_desc">Gambar:</label>
                            <div class="row">
                                <?php foreach ($gambar as $row) { ?>
                                    <div class="col-lg-3">
                                        <div class="hovereffect">
                                            <img class="img-responsive" src="<?= base_url('assets/uploads/skill/' . $row->gambar) ?>" alt="">
                                            <!-- <img class=" img-responsive" src="http://placehold.it/350x200" alt=""> -->
                                            <div class="overlay">
                                                <a class="info tombol-hapus" href="<?= base_url('user/skill/deletePict/' . $row->id_gambar) ?>">hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="single-input submit-resume">
                    <button type="submit">Post Job</button>
                </div>
            </form>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('user/skill/addPict') ?>
            <form method="post">
                <input type="hidden" value="<?= $skill->id_skill ?>" name="id_skill">
                <div class="modal-body">
                    <div class="single-resume-feild upload_file">
                        <div class="text-center">
                            <div class="product-upload">
                                <p>
                                    <i class="fa fa-upload"></i>
                                    Upload Files
                                </p>
                                <input type="file" id="w_screen" name="gambar">
                                <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <p>Gambar ini akan membantu mendeskripsikan skill kamu</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </div>
            </form>
            <?= form_close() ?>
        </div>
    </div>

</div>

<script>
    CKEDITOR.replace("editorSkill");
</script>