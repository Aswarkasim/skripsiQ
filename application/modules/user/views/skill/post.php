<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="dashboard-right">
    <div class="earnings-page-box manage-jobs">
        <div class="manage-jobs-heading">
            <h3>Post Skill Baru</h3>
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
            echo form_open_multipart(base_url('user/skill/post'));
            ?>
            <form action="" method="post">
                <div class="resume-box">
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="j_title">Nama Skill</label>
                            <input placeholder="Nama Skill" type="text" id="j_title" name="nama_skill" value="<?= set_value('nama_skill') ?>">
                            <?= form_error('nama_skill', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="Location">Regional:</label>
                            <input type="text" placeholder="Lokasi" name="lokasi" id="Location" value="<?= set_value('lokasi') ?>">
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="j_reg">Status:</label>
                            <select id="j_reg" name="regional">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="single-input">
                            <label for="j_reg">Regional:</label>
                            <select id="j_reg" class="" name="regional">
                                <option value="">Pilih Region</option>
                                <?php foreach ($regional as $row) { ?>
                                    <option value="<?= $row->id_regional ?>"><?= $row->nama_regional ?></option>
                                <?php } ?>
                            </select>
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
                            <label for="External">Link Selengkapnya <span>(opsional)</span></label>
                            <input type="text" placeholder="http://" id="External" name="link" value="<?= set_value('link') ?>">
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="mn_salary">Imbalan Minimum (Rp):</label>
                            <input type="text" placeholder="Contoh: 20000" id="mn_salary" name="upah_min" value="<?= set_value('upah_min') ?>">
                        </div>
                        <div class="single-input">
                            <label for="mx_salary">Imbalan Maximum (Rp):</label>
                            <input type="text" placeholder="Contoh: 50000" id="mx_salary" name="upah_max" value="<?= set_value('upah_max') ?>">
                        </div>
                    </div>
                    <script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
                    <div class="single-resume-feild">
                        <div class="single-input">
                            <label for="j_desc">Deskripsi Job:</label>
                            <textarea id="editorSkill" name="deskripsi"><?= set_value('deskripsi') ?></textarea>
                        </div>
                    </div>
                    <div class="single-resume-feild upload_file">
                        <div class="product-upload">
                            <p>
                                <i class="fa fa-upload"></i>
                                Upload Files
                            </p>
                            <input type="file" id="w_screen" name="gambar">
                            <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <p>Gambar muncul di thumbnail kamu</p>
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



<script>
    CKEDITOR.replace("editorSkill");
</script>