<button type="button" class="btn btn-success btn-sx" data-toggle="modal" data-target="#modal-default">
    <i class="fa fa-plus"></i>Tambah
</button>

<?= form_open_multipart(base_url('admin/konfigurasi/banner/index')) ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Banner</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Posisi</label>
                        </div>
                        <div class="col-md-9">
                            <select name="posisi" class="form-control">
                                <option value="">Posisi</option>
                                <option value="home">Home</option>
                                <option value="job">Job</option>
                                <option value="skill">Skill</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Urutan</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="urutan">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Gambar</label>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="bantuan" value="aa">
                            <input type="file" class="form-control" name="gambar" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= form_close() ?>
<!-- /.modal -->