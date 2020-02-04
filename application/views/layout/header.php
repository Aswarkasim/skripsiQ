<?php
$uri_home = $this->uri->segment('1');
$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

$sektor = $this->Crud_model->listing('tbl_kategori');
?>
<!-- Header Area Start -->
<header class="jobguru-header-area stick-top forsticky <?php if ($uri_home != '') {
                                                            if ($uri_home != 'home') {
                                                                echo 'page-header';
                                                            } else if ($this->uri->segment('2') != '') {
                                                                echo 'page-header';
                                                            }
                                                        } ?>">
    <div class="menu-animation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="site-logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/fe/img/logo.png" alt="jobguru" class="non-stick-logo" />
                            <img src="<?= base_url() ?>assets/fe/img/logo-2.png" alt="jobguru" class="stick-logo" />
                        </a>
                    </div>
                    <!-- Responsive Menu Start -->
                    <div class="jobguru-responsive-menu"></div>
                    <!-- Responsive Menu Start -->
                </div>
                <div class="col-lg-5">
                    <div class="header-menu">
                        <nav id="navigation">
                            <ul id="jobguru_navigation">
                                <li><a href="<?= base_url() ?>">Beranda</a></li>
                                <li><a href="<?= base_url('home/job') ?>">Job</a></li>
                                <li><a href="<?= base_url('home/skill') ?>">Skill</a></li>
                                <li class="has-children">
                                    <a href="#">Sektor</a>
                                    <ul>
                                        <?php foreach ($sektor as $row) { ?>
                                            <li><a href="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></a></li>
                                        <?php } ?>
                                        <!-- <li class="has-inner-child">
                                            <a href="#">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single blog</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header-right-menu">
                        <ul>
                            <li><a href="<?= base_url('user/skill/post') ?>" class="post-jobs"><i class="fa fa-gavel"></i> Post Skill</a></li>
                            <li><a href="<?= base_url('user/job/post') ?>" class="post-jobs"><i class="fa fa-rocket"></i> Post jobs</a></li>
                            <?php
                            if ($id_user == '') { ?>
                                <li><a href="<?= base_url('home/auth/register') ?>"><i class="fa fa-user"></i>Register</a></li>
                                <li><a href="<?= base_url('home/auth') ?>"><i class="fa fa-lock"></i>login</a></li>
                            <?php
                            } else { ?>
                                <li><a href="<?= base_url('user/dashboard') ?>"><i class="fa fa-user"></i><?= $user->namalengkap ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->