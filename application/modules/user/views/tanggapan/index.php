<style>
    .no-read {
        background-color: azure;
    }

    .icon-read {
        color: #25ad60;
    }

    .icon-no-read {
        color: #1c7ede;
    }
</style>
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
                                <tr class="<?php if ($row->is_read == '0') {
                                                echo 'no-read';
                                            } ?>">
                                    <td class="manage-jobs-title"><a href="<?php
                                                                            if ($row->nama_job) {
                                                                                echo base_url('user/tanggapan/detailJob/' . $row->id_post . '/' . $row->id_tanggapan);
                                                                            } else {
                                                                                echo base_url('user/tanggapan/detailSkill/' . $row->id_post . '/' . $row->id_tanggapan);
                                                                            }
                                                                            ?>">
                                            <?php
                                            // $tgp = $this->Crud_model->countTanggapan($row->id_post);
                                            // echo ($tgp);
                                            //echo $row->id_post;
                                            if ($row->nama_job) {
                                                echo $row->namalengkap . ' menanggapi ' . $row->nama_job;
                                            } else {
                                                echo $row->nama_skill;
                                            }
                                            ?>
                                        </a></td>
                                    <td class="action">
                                        <a href="#" class="action-edit"><i class="fa fa-envelope<?php if ($row->is_read == '1') {
                                                                                                    echo '-open icon-read';
                                                                                                } else {
                                                                                                    echo ' icon-no-read';
                                                                                                } ?>"></i></a>
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