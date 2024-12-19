<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    header('Location: login/login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gravion Jet - Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('pages/index/style.css'); ?>">
</head>

<body>
    <header>
        <div class="logo">
            <h1>GRAVION</h1>
        </div>

        <nav>
            <a href="<?= site_url('index'); ?>" class="active">Discover</a>
            <a href="<?= site_url('about-us'); ?>">About Us</a>
            <a href="<?= site_url('contact'); ?>">Contact</a>

            <!-- Form Login jika belum login -->
            <?php if (!session()->get('username')): ?>
            <form action="<?= site_url('login'); ?>" method="GET" style="display: inline;">
                <button type="submit" name="login" class="sign-in">Sign In</button>
            </form>
            <?php else: ?>
            <!-- Jika sudah login, tampilkan username dan tombol logout -->
            <span>
                <a href="<?= site_url('/myprofile'); ?>">Welcome  <?= session()->get('username') ?>!</a>
            </span> 


            <!-- Form Logout -->
            <form action="<?= site_url('logout'); ?>" method="GET" style="display: inline;">
                <button type="submit" class="sign-in">Logout</button>
            </form>
            <?php endif; ?>
        </nav>

    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Personalized Aviation</h2>
            <p>Elevating Luxury Above the Clouds!</p>
            <img src="../images/airplane.png" alt="Airplane" class="jet-image">
            <div class="hero-buttons">
                <?php if (session()->get('username')): ?>
                    <a href="/checkout" class="button">Book an Aircraft</a>
                <?php else: ?>
                    <a href="<?= site_url('login'); ?>" class="button" onclick="alert('Anda tidak bisa memesan silahkan login terlebih dahulu.');">Book an Aircraft</a>
                <?php endif; ?>
                    <a href="#tours" class="button-outline">Explore Destinations</a>
            </div>
        </div>
    </section>

    <section id="flights">
        <h3 class="section-title">Popular Flights</h3>
        <div class="card-container">
            <div class="card">
                <div class="image">
                    <img src="../images/jakarta.png" alt="Jakarta to Bali">
                </div>
                <h4>Jakarta to Bali</h4>
                <p>2 hr 05 min</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="../images/paris.png" alt="Paris to Milan">
                </div>
                <h4>Paris to Milan</h4>
                <p>1 hr 30 min</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="../images/newyork.png" alt="New York to Tokyo">
                </div>
                <h4>New York to Tokyo</h4>
                <p>15 hr 30 min</p>
            </div>
        </div>
    </section>

    <section id="tours">
        <h3 class="section-title">Explore Tours</h3>
        <div class="card-container">
            <div class="card">
                <div class="image">
                    <img src="../images/paris2.png" alt="Paris night">
                </div>
                <h4>Paris City Lights</h4>
                <p>3 Days Tour</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="../images/kenya.png" alt="Kenya">
                </div>
                <h4>Safari in Kenya</h4>
                <p>7 Days Adventure</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="../images/mediteranian.png" alt="Mediterranean">
                </div>
                <h4>Mediterranean Cruise</h4>
                <p>10 Days Luxury</p>
            </div>
        </div>
    </section>

    <div class="cta-section">
        <h2>Where Precision Meets Prestige</h2>
        <h2>Book Your Exclusive Journey Today</h2>
        <a href="/checkout" class="cta-button">Book an Aircraft</a>
    </div>

    <footer>
        <div class="footer-logo">
            <h3>GRAVION</h3>
        </div>
        <nav>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="contact/contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>