<?php
$this->load->view('home/auth/breadcromb');
?>

<section class="jobguru-login-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Register</h3>
                    </div>
                    <form action="<?= base_url('home/auth/register') ?>" method="post">
                        <div class="single-login-field">
                            <input type="text" placeholder="Nama Lengkap" name="namalengkap" value="<?= set_value('namalengkap') ?>">
                            <?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                        <div class="single-login-field">
                            <input type="text" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                        <div class="single-login-field">
                            <input type="text" placeholder="Alamat Email" name="email" value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                        <div class="single-login-field">
                            <input type="password" placeholder="Password" name="password" class="password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                        <div class="single-login-field">
                            <input type="password" placeholder="Konfirmasi Password" name="re_password" class="password">
                            <?= form_error('re_password', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                        <p class="checkbox remember">
                            <input class="checkbox-spin" type="checkbox" id="Show-pw" data-show-pw=".password">
                            <label for="Show-pw"><span></span>Perlihatkan Password</label>
                        </p>
                        <!-- <div class="remember-row single-login-field clearfix">
                            <p class="checkbox remember">
                                <input class="checkbox-spin" type="checkbox" id="Freelance">
                                <label for="Freelance"><span></span>accept terms &amp; condition</label>
                            </p>
                        </div> -->
                        <div class="single-login-field"><br>
                            <button type="submit">Register</button>
                        </div>
                    </form><br>
                    <div class="dont_have">
                        <p>Sudah memiliki akun? <a href="<?= base_url('home/auth') ?>"> Silakan masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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