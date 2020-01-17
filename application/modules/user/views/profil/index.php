<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="dashboard-right">
    <div class="candidate-profile">
        <?php echo form_open_multipart('user/profil') ?>
        <form action="" method="post">
            <div class="candidate-single-profile-info">
                <div class="single-resume-feild resume-avatar">
                    <div class="resume-image">
                        <img src="<?= base_url('assets/uploads/images/' . $profil->foto)  ?>" alt="resume avatar">
                        <div class="resume-avatar-hover">
                            <div class="resume-avatar-upload">
                                <p>
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </p>
                                <input type="file" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="candidate-single-profile-info">
                <?= validation_errors() ?>
                <div class="resume-box">
                    <h3><i class="fa fa-pencil"></i> Profil Saya <i class="fa fa-home fa-3x"></i> </h3>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="name">Nama Lengkap:</label>
                            <input type="text" value="<?= $profil->namalengkap ?>" name="namalengkap" id="name">
                            <?= form_error('namalengkap', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="p_title">Username:</label>
                            <input type="text" value="<?= $profil->username ?>" name="username" id="p_title">
                            <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="Region">Profesi:</label>
                            <input type="text" value="<?= $profil->profesi ?>" name="profesi" id="p_title">
                            <?= form_error('profesi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="Age">Tanggal Lahir:</label>
                            <input type="date" value="<?= $profil->tgl_lahir ?>" name="tgl_lahir" id="Age">
                            <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="single-resume-feild ">
                        <div class="single-input">
                            <label for="Bio">Introduce Yourself:</label>
                            <textarea id="Bio" name="deskripsi"><?= $profil->deskripsi ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="resume-box">
                    <h3>Informasi Kontak</h3>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="Phone">Phone:</label>
                            <input type="text" value="<?= $profil->hp ?>" name="hp" id="Phone">
                            <?= form_error('hp', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="Email">Email:</label>
                            <input type="text" value="<?= $profil->email ?>" name="email" id="Email">
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="contry">Kota:</label>
                            <select id="contry">
                                <option>Arab Amirats</option>
                                <option>America</option>
                                <option>Netherlands</option>
                                <option>Russia</option>
                                <option selected="">Bangladesh</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Brazil</option>
                                <option>Africa</option>
                            </select>
                            <?= form_error('kota', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="City">Kecamatan:</label>
                            <input type="text" name="kecamatan" value="<?= $profil->kecamatan ?>" id="City">
                            <?= form_error('kecamatan', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="Zip">Kode Pos:</label>
                            <input type="text" value="<?= $profil->kodepos ?>" name="kodepos" id="Zip">
                            <?= form_error('kodepos', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="Address22">Alamat:</label>
                            <input type="text" value="<?= $profil->alamat ?>" name="alamat" id="Address22">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="resume-box">
                    <h3>Sosial link</h3>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="twitter">
                                <i class="fa fa-twitter twitter"></i>
                                twitter
                            </label>
                            <input type="text" value="<?= $profil->fb ?>" id="twitter" name="tw">
                            <?= form_error('tw', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="single-input">
                            <label for="twitter">
                                <i class="fa fa-facebook facebook"></i>
                                facebook
                            </label>
                            <input type="text" value="<?= $profil->tw ?>" id="facebook" name="fb">
                        </div>
                    </div>
                    <div class="single-resume-feild feild-flex-2">
                        <div class="single-input">
                            <label for="google">
                                <i class="fa fa-google-plus google"></i>
                                Instagram
                            </label>
                            <input type="text" value="<?= $profil->ig ?>" id="google" name="ig">
                        </div>
                        <div class="single-input">
                            <label for="linkedin">
                                <i class="fa fa-linkedin linkedin"></i>
                                linkedin
                            </label>
                            <input type="text" value="<?= $profil->linkedin ?>" id="linkedin" name="linkedin">
                        </div>
                    </div>
                </div>
                <div class="submit-resume">
                    <button type="submit">Perbaharui</button>
                </div>
            </div>
        </form>
        <?= form_close()  ?>
    </div>
</div>