<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Gravion</title>
    <link rel="stylesheet" href="<?= base_url('pages/contact/contact.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <h1 id="logo-text">GRAVION</h1>
        </div>
        <nav>
            <a href="<?= site_url('index'); ?>">Discover</a>
            <a href="<?= site_url('about-us'); ?>">About Us</a>
            <a href="<?= site_url('contact'); ?>" class="active">Contact</a>

            <!-- Form Login jika belum login -->
            <?php if (!session()->get('username')): ?>
            <form action="<?= site_url('login'); ?>" method="GET" style="display: inline;">
                <button type="submit" name="login" class="sign-in">Sign In</button>
            </form>
            <?php else: ?>
            <!-- Jika sudah login, tampilkan username dan tombol logout -->
            <span class="welcome-message">Welcome, <?= session()->get('username') ?>!</span>

            <!-- Form Logout -->
            <form action="<?= site_url('logout'); ?>" method="GET" style="display: inline;">
                <button type="submit" class="sign-in">Logout</button>
            </form>
            <?php endif; ?>
        </nav>

    </header>
    <main>
        <section class="contact-section">
            <h2>Contact Gravion</h2>
            <div class="contact-methods">
                <div class="contact-box">
                    <div class="icon">@</div>
                    <h3>E-mail us</h3>
                    <p>Please email to gravion@gmail.com</p>
                </div>
                <div class="contact-box">
                    <div class="icon">📍</div>
                    <h3>Find us</h3>
                    <p>Astha Distric 8<br>Jl. Senopati No.83, Senayan,<br> Kec. Kby. Baru, Kota Jakarta Selatan</p>
                </div>
                <div class="contact-box">
                    <div class="icon">📞</div>
                    <h3>Call us</h3>
                    <p>Please call to +62xxxxxxxx</p>
                </div>
            </div>
        </section>
    </main>

    <script>
    document.getElementById('logo-text').addEventListener('click', function() {
        window.location.href = 'index.html';
    });
    </script>

</body>

</html>