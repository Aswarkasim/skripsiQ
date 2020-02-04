<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>



            <li class="treeview <?php if ($this->uri->segment(2) == "master") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-folder"></i> <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "kategori") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/master/kategori') ?>">Kategori</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "regional") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/master/regional') ?>">Regional</a></li>
                </ul>
            </li>
            <li class="<?php if ($this->uri->segment(2) == "job") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/job')
                                        ?>"><i class="fa fa-rocket"></i> <span>Job</span></a></li>
            <li class="<?php if ($this->uri->segment(2) == "skill") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/skill')
                                        ?>"><i class="fa fa-gavel"></i> <span>Skill</span></a></li>
            <li class="<?php if ($this->uri->segment(2) == "laporan") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/laporan')
                                        ?>"><i class="fa fa-gavel"></i> <span>Laporan</span></a></li>
            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-user"></i> <span>Manajemen User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user') ?>">List User</a></li>
                </ul>
            </li>

            <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/konfigurasi')
                                        ?>"><i class="fa fa-cogs"></i> <span>Konfigurasi</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">