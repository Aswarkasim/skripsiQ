<?php
$this->load->view('home/auth/breadcromb');
?>

<!-- Form -->

<section class="jobguru-login-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Sign in</h3>
                    </div>
                    <?php
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo '<div class="text-danger">';
                        echo $msg;
                        echo '</div>';
                    }

                    ?>
                    <form action="<?= base_url('home/auth') ?>" method="post">
                        <div class="single-login-field">
                            <input type="username" placeholder="Username atau Email" name="username" value="<?= set_value('username') ?>">
                            <?= form_error('username', '<div class="text-danger">', '</div>') ?>
                        </div>
                        <div class="single-login-field">
                            <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password') ?>">
                            <?= form_error('password', '<div class="text-danger">', '</div>') ?>
                        </div>
                        <div class="remember-row single-login-field clearfix">
                            <p class="checkbox remember">
                                <input class="checkbox-spin" type="checkbox" id="Show-pw" data-show-pw="#password">
                                <label for="Show-pw"><span></span>Perlihatkan Password</label>
                            </p>
                            <p class="lost-pass">
                                <a href="#">Lupa password?</a>
                            </p>
                        </div>
                        <div class="single-login-field">
                            <button type="submit">Sign in</button>
                        </div>
                    </form>
                    <div class="dont_have">
                        Belum punya akun? <a href="<?= base_url('home/auth/register') ?>">Registrasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End Form -->

<script>
    document.addEventListener('click', function(event) {
        var selector = event.target.getAttribute('data-show-pw');
        if (!selector) return;
        var password = document.querySelectorAll(selector);

        Array.from(password).forEach(function(password) {
            if (event.target.checked === true) {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        })
    })
</script>