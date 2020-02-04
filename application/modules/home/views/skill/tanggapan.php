<div class="single-candidate-widget card">
    <h3 class="px-xl-3 pt-xl-1">Tanggapan</h3>
    <?php foreach ($tanggapan as $row) { ?>
        <div class="single-work-history">
            <div class="single-candidate-list">
                <div class="main-comment">
                    <div class="candidate-image">
                        <img src="<?= base_url('assets/uploads/images/' . $row->foto) ?>" alt="author">
                    </div>
                    <div class="candidate-text">
                        <div class="candidate-info">
                            <div class="candidate-title">
                                <h3><a href="#"><?= $row->namalengkap ?></a></h3>
                            </div>
                            <p><i class="fa fa-calendar-check-o"></i><?= $row->date_created ?></p>
                        </div>
                        <div class="candidate-text-inner">
                            <p><?= $row->isi ?></p>
                        </div>
                        <div class="">
                            <hr>
                            <small>
                                <?php if (($row->id_user) == $this->session->userdata('id_user')) {
                                    echo '<a href="' . base_url('home/tanggapan/delete/' . $row->id_tanggapan) . '" class="tombol-hapus">Hapus</a>';
                                } ?>

                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>
<div class="single-candidate-widget-2">
    <h3>Tulis Tanggapan</h3>
    <form action="<?= base_url('home/tanggapan/addTanggapanSkill') ?>" method="post">
        <p>
            <input type="hidden" name="id_post" value="<?= $this->uri->segment(4) ?>">
            <input type="hidden" name="id_to" value="<?= $skill->id_user ?>">
            <textarea id="editorKomentar" name="isi" placeholder="Write here your message"></textarea>
        </p>
        <p>
            <button type="submit">Tanggapi</button>
        </p>
    </form>
</div>
<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editorKomentar");
</script>