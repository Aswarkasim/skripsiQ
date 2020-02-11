<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
        </p>

        <table class="table table-hover DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th width='150px'>Tanggal</th>
                    <th width="">Nama Skill</th>
                    <th width="">User</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($skill as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <?= $row->date_created ?>
                        </td>
                        <td>
                            <?= $row->nama_skill ?>
                        </td>
                        <td>
                            <?= $row->namalengkap . ' (@' . $row->username . ')'; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('$edit' . $row->id_skill)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url('$delete' . $row->id_skill)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>