<?php
$uri = $this->uri->segment('2');
?>
<div class="col-lg-3 col-md-12 dashboard-left-border">
    <div class="dashboard-left">
        <ul class="dashboard-menu">
            <li class="<?php if ($uri == 'dashboard') {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('user/dashboard') ?>">
                    <i class="fa fa-tachometer"></i>
                    Dashboard
                </a>
            </li>
            <li class="<?php if ($uri == 'profil') {
                            echo 'active';
                        } ?>"><a href="<?= base_url('user/profil') ?>"><i class="fa fa-user"></i>Profil Saya</a></li>
            <li class="<?php if ($uri == 'pesan') {
                            echo 'active';
                        } ?>"><a href="<?= base_url('user/pesan') ?>"><i class="fa fa-envelope-open"></i>Pesan</a></li>
            <li class="<?php if ($uri == 'skill') {
                            echo 'active';
                        } ?>"><a href="<?= base_url('user/skill') ?>"><i class="fa fa-pencil"></i>Skill</a></li>
            <!-- <li class="<?php if ($this->uri->segment('3') == 'post') {
                                echo 'active';
                            } ?>"><a href="<?= base_url('user/job/post') ?>"><i class="fa fa-rocket"></i>Post Job</a></li> -->
            <li class="<?php if ($uri == 'job') {
                            echo 'active';
                        } ?>">
                <a href="<?= base_url('user/job') ?>">
                    <i class="fa fa-briefcase"></i>
                    Job
                </a>
            </li>
            <li class="<?php if ($this->uri->segment('3') == 'ubahPassword') {
                            echo 'active';
                        } ?>"><a href="<?= base_url('user/profil/ubahPassword') ?>"><i class="fa fa-lock"></i>Ubah password</a></li>
            <li><a href="<?= base_url('home/auth/logout') ?>" class="tombol-logout"><i class="fa fa-power-off"></i>LogOut</a></li>
        </ul>
    </div>
</div>