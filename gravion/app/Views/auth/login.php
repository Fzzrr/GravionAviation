<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('auth/login/login.css'); ?>">
    <script src="<?php echo base_url('auth/login/login.js'); ?>"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="logo-container">
        <h1 class="logo">GRAVION</h1>
    </div>
    <div class="container">
        <div class="sign-in-box">
            <h2>Sign in</h2>
            <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
            <form action="<?= base_url('/authenticate') ?>" method="POST">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <button type="button" class="show-password" onclick="togglePasswordVisibility()">
                        <img src="<?= base_url('auth/login/hidden-password.jpg') ?>" alt="Show Password">
                    </button>
                </div>
                <div class="options">
                    <div class="checkbox-group">
                        <input type="checkbox" id="keep-signed-in">
                        <label for="keep-signed-in"> Keep me signed in</label>
                    </div>
                </div>
                <button type="submit" class="btn-primary" onclick="return alert('Berhasil Login')">Continue with email</button>
            </form>
            <div class="register">
                <form id="registerForm" action="<?= base_url('register') ?>" method="GET">
                    Don't have an account?
                    <a href="#" onclick="document.getElementById('registerForm').submit(); return false;">Register</a>
                </form>
            </div>

        </div>
    </div>

    <input type="hidden" id="hidden-password-url" value="<?= base_url('auth/login/hidden-password.jpg') ?>">
    <input type="hidden" id="opened-password-url" value="<?= base_url('auth/login/oppened-password.jpg') ?>">

</body>

</html>