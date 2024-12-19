<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="<?= base_url('pages/myprofile/myprofile.css'); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <a href="<?= site_url('/index') ?>" >← Back to Gravion website</a>
  <nav>
    <a href="myflights">My flights</a>
    <a href="myprofile.html" class="active">My profile</a>
    <a href= "logout" id="sign-out-button">Sign Out</a>
  </nav>
  </header>
  <main>
    <h1>Here you go</h1>
    <h2>My profile</h2>

    <form id="details-form" action="<?= site_url('myprofile/update') ?>" method="post">
    <div class="input-row">
        <div class="input-group">
            <label for="first-name">First name</label>
            <input type="text" id="first-name" name="first-name" value="<?= $bookings['first_name'] ?>" required>
        </div>
        <div class="input-group">
            <label for="last-name">Last name</label>
            <input type="text" id="last-name" name="last-name" value="<?= $bookings['last_name'] ?>" required>
        </div>
    </div>
    <div class="input-row">
        <div class="input-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" required>
        </div>
        <div class="input-group">
            <label for="mobile-number">Mobile number</label>
            <input type="text" id="mobile-number" name="mobile-number" value="<?= $bookings['phone_number'] ?>"  required>
        </div>
    </div>
    <div class="input-row">
        <div class="input-group">
            <label for="town-city">Town / city</label>
            <input type="text" id="town-city" name="town-city">
        </div>
        <div class="input-group">
            <label for="street-number">Street number</label>
            <input type="text" id="street-number" name="street-number">
        </div>
    </div>
    <div class="input-group">
        <label for="postal-code">Postal code</label>
        <input type="text" id="postal-code" name="postal-code">
    </ ```html
    </div>
    <button type="submit" class="save-button">Save changes</button>
</form>
  </main>

  <!-- <script src="myprofile.js"></script> -->
</body>
</html>
