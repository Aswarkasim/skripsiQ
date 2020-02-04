<section class="jobguru-top-job-area browse-page">
    <div class="container">
        <div class="dashboard-right">
            <div class="manage-jobs">
                <div class="manage-jobs-heading">
                    <h3>Tanggapan</h3>
                </div>
                <div class="single-manage-jobs table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width=100px>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tanggapan as $row) { ?>
                                <tr>
                                    <td class="manage-jobs-title"><a href="#">
                                            <?php
                                            // $tgp = $this->Crud_model->countTanggapan($row->id_post);
                                            // echo ($tgp);
                                            echo $row->id_post;
                                            if ($row->nama_job) {
                                                echo $row->nama_job;
                                            } else {
                                                echo $row->nama_skill;
                                            }
                                            ?>
                                        </a></td>
                                    <td class="action">
                                        <a href="#" class="action-edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="#" class="action-delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="pagination-box-row">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>