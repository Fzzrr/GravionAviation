<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Flights</title>
  <link rel="stylesheet" href="<?= base_url('pages/myflights/myflights.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

  <header>
    <a href="../index.html" class="back-link">← Back to Gravion website</a>
    <nav>
      <a href="<?= site_url('myflights'); ?>" class="active">My flights</a>
      <a href="<?= site_url('myprofile'); ?>">My profile</a>
      <a href="<?= site_url('logout'); ?>" id="sign-out-button">Sign Out</a>
    </nav>
  </header>

  <main>
    <h1>Welcome back</h1>
    <h2>My flight requests</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('danger')): ?>
      <div class="alert danger"><?= session()->getFlashdata('danger'); ?></div>
    <?php endif; ?>

    <?php if (!empty($flights_info) && is_array($flights_info)): ?>
    <?php foreach ($flights_info as $flight): ?>
        <section class="flight-card">
            <div class="flight-header">
                <span id="route">✈️ <?= esc($flight['departure_date']); ?></span>
            </div>
            <div class="flight-info">
                <div class="flight-from">
                    <h3>From</h3>
                    <p id="from-city"><?= esc($flight['departure_city']); ?></p>
                    <p><span class="icon">📅</span> <?= esc($flight['departure_date']); ?></p>
                    <p><span class="icon">⏰</span> <?= esc($flight['departure_time']); ?></p>
                    <p><span class="icon">📍</span> <?= esc($flight['departure_city']); ?></p>
                    <p><span class="icon">👥</span> <?= esc($flight['passenger_amount']); ?></p>
                </div>
                <div class="flight-to">
                    <h3>To</h3>
                    <p id="to-city"><?= esc($flight['arrival_city']); ?></p>
                    <p><span class="icon">📍</span> <?= esc($flight['arrival_city']); ?></p>
                </div>
                <div class="flight-status">
                    <h3>Inquiry Status</h3>
                    <p class="status"><?= esc($flight['inquiry_status']); ?></p>
                </div>
            </div>
            <!-- Display "Proceed" button only if status is Incomplete -->
            <?php if ($flight['inquiry_status'] === 'Incomplete'): ?>
            <form action="<?= site_url('myflights/confirmAction'); ?>" method="post">
                <input type="hidden" name="flight_id" value="<?= esc($flight['flight_info_id']); ?>">
                <button class="proceed-button" name="proceed-button" type="submit" onclick="return alert('Status updated to Complete!')">Proceed</button>
            </form>
            <?php else: ?>
            <p class="status-message">This flight has been completed.</p>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
    <a href="<?= site_url('/'); ?>" class="home-button">Back to Home</a>
    <?php else: ?>
    <p>No flight data available.</p>
    <a href="<?= site_url('/'); ?>" class="home-button">Back to Home</a>
    <?php endif; ?>
  </main>
</body>

</html>
