<table class="table DataTable">
    <thead>
        <tr>
            <td width="26px">No</td>
            <td>#</td>
            <td width="100px">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($job as $row) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><a href="" data-toggle="modal" data-target="#modal<?= $row->id_job ?>"><?= $row->nama_job ?></a></td>
                <td></td>
            </tr>
            <div class="modal fade" id="modal<?= $row->id_job ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?= $row->nama_job ?></h4>
                        </div>
                        <div class="modal-body">
                            <img src="<?= base_url('assets/uploads/job/' . $row->gambar) ?>" alt="" width="100%">
                            <?= $row->deskripsi ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>
    </tbody>
</table>


<a>
    Launch Default Modal
</a>