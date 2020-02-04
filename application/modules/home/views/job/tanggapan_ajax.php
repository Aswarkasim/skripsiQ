<div class="single-candidate-widget card">
    <h3 class="px-xl-3 pt-xl-1">Tanggapan</h3>
    <div class="single-work-history">
        <div class="single-candidate-list" id="targetData">
            <!-- tempat data -->
        </div>
    </div>
    <hr>
</div>
<div class="single-candidate-widget-2">
    <h3>Tulis Tanggapan</h3>
    <form action="<?= base_url('home/tanggapan/add') ?>" method="post">
        <p>
            <input type="hidden" name="id_post" value="<?= $this->uri->segment(4) ?>">
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

    readData();

    function readData() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() . "home/job/readTanggapan/JOB069551873164420" ?>',
            dataType: 'json',
            success: function(data) {
                var baris = '';

                for (var i = 0; i < data.length; i++) {
                    baris += '<div class="main-comment"></div>'
                }
                $('#targetData').html(baris);
            }
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/popper.min.js"></script>