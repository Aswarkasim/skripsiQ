<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-10">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manajemen Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <p>
                    <?php include('add.php') ?>
                </p>

                <?php
                if (isset($error)) {
                    echo $error;
                }
                echo validation_errors();
                ?>

                <table class="table DataTable">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Gambar</th>
                            <th>Icon</th>
                            <th>Nama</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="targetData">
                        <?php $no = 1;
                        foreach ($kategori as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img width="100px" src="<?= base_url('assets/uploads/kategori/' . $row->gambar) ?>"></td>
                                <td><i class="<?= $row->icon ?>"></i> <?= $row->icon ?></td>
                                <td><?= $row->nama_kategori ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalEdit<?= $row->id_kategori ?>">
                                        <i class="fa fa-edit"></i>Edit
                                    </button>

                                    <a href="<?= base_url('admin/master/kategori/delete/' . $row->id_kategori) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php echo include('edit.php') ?>
                        <?php
                        } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>