<div class="modal fade" id="ModalEdit<?= $row->id_kategori ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <?= form_open(base_url($tombol['edit'] . '/' . $row->id_kategori)) ?>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Kode Kategori</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="id_kategori" required value="<?= 'KT' . random_string('numeric', '4') ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Nama Kategori</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="<?= $row->nama_kategori ?>" name="nama_kategori" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Icon</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="icon_kategori" value="<?= $row->icon ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Gambar</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="gambar" required>
                            <br>
                            <img width="50%" src="<?= base_url('assets/uploads/images/default.jpg') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->