<div class="dashboard-right">
    <div class="change-pass manage-jobs">
        <div class="manage-jobs-heading">
            <h3>Change Password</h3>
        </div>
        <form action="<?= base_url('user/profil/ubahPassword') ?>" method="post">
            <p>
                <label for="old_pass">Old Password</label>
                <input type="password" name="old_pass" placeholder="*******" class="password" id="old_pass">
                <?php
                if (isset($pesan_er)) {
                    echo '<div class="text-danger">';
                    echo $pesan_er;
                    echo '</div>';
                }
                echo form_error('old_pass', '<div class="text-danger">', '</div>')
                ?>
            </p>
            <p>
                <label for="new_pass">New Password</label>
                <input type="password" name="new_pass" placeholder="*******" class="password" id="new_pass">
                <?= form_error('new_pass', '<div class="text-danger">', '</div>') ?>
            </p>
            <p>
                <label for="confirm_pass">confirm Password</label>
                <input type="password" name="confirm_pass" placeholder="*******" class="password" id="confirm_pass">
                <?= form_error('confirm_pass', '<div class="text-danger">', '</div>') ?>
            </p>
            <p class="checkbox remember">
                <input class="checkbox-spin" type="checkbox" id="Show-pwA" data-show-pw=".password">
                <label for="Show-pwA"><span></span>Perlihatkan Password</label>
            </p>
            <p>
                <button type="submit">Update</button>
            </p>
        </form>
    </div>
</div>

<script>
    document.addEventListener('click', function(event) {
        var selector = event.target.getAttribute('data-show-pw');
        if (!selector) return;

        var passwords = document.querySelectorAll(selector);

        Array.from(passwords).forEach(function(password) {
            if (event.target.checked === true) {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
    }, false);
</script>