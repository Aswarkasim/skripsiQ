<div class="single-candidate-widget card">
    <h3 class="px-xl-3 pt-xl-1">Tanggapan</h3>
    <div class="single-work-history">
        <div class="single-candidate-list">
            <div class="main-comment">
                <div class="candidate-image">
                    <img src="assets/img/a_logo.png" alt="author">
                </div>
                <div class="candidate-text">
                    <div class="candidate-info">
                        <div class="candidate-title">
                            <h3><a href="#">Lead UX/UI Designer</a></h3>
                        </div>
                        <p><i class="fa fa-calendar-check-o"></i>September 2017 - Present</p>
                    </div>
                    <div class="candidate-text-inner">
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam eu velit cursus, tempor ipsum in, tempus lectus. Nullam tempus nisi id nisl luctus, non tempor justo molestie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-candidate-widget-2">
    <h3>Quick Contacts</h3>
    <form action="<?= base_url('home/komentar') ?>" method="post">
        <p>
            <textarea id="editorKomentar" placeholder="Write here your message"></textarea>
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