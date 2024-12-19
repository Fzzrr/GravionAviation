<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('auth/register/register.css') ?>">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo-container">
        <h1 class="logo">GRAVION</h1>
    </div>
    <div class="container">
        <div class="sign-up-box">
            <h2>Register</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('register/store') ?>" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <button type="submit" class="btn-primary">Continue with email</button>
            </form>
            <div class="signin">
                Already have an account? <a href="<?= base_url('login') ?>">Sign in</a>
            </div>
        </div>
    </div>
</body>
</html>
