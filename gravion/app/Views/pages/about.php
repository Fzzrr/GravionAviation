<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Gravion</title>
  <link rel="stylesheet" href="<?= base_url('pages/about/about.css'); ?>">
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
            <a href="<?= site_url('about-us'); ?>" class="active">About Us</a>
            <a href="<?= site_url('contact'); ?>" >Contact</a>

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
    <section class="about-section">
      <h2>About Gravion</h2>
      <p>
         Technology, extensive industry knowledge, and a design-thinking approach. Few reasons why Gravion is 
         disrupting the private jet charter business. We deliver experiences that are smart, transparent, 
         customizable, and most of all, unforgettable.
      </p>
    </section>
  </main>

  <script>
    document.getElementById('logo-text').addEventListener('click', function() {
      window.location.href = '../index.html';
    });
  </script>

</body>
</html>
