<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Password</title>
  <link rel="stylesheet" href="<?= base_url('auth/create-password.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="logo-container">
    <h1 class="logo">GRAVION</h1>
  </div>
  <div class="container">
    <div class="create-password-box">
      <h2>Create password</h2>
      <p style="margin-top: 10px;">Use a minimum of 10 characters, including letters,<br> lowercase letters, and numbers.</p>
      <form action="<?= base_url('create-password/store') ?>" method="POST">
        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <input type="password" name="password" placeholder="Password" required>
            <span class="toggle-password">&#128065;</span>
          </div>
        </div>
        <div class="input-group">
          <label for="confirm-password">Confirm Password</label>
          <div class="input-wrapper">
            <input type="password" name="confirm-password" placeholder="Confirm Password" required>
            <span class="toggle-password">&#128065;</span>
          </div>
        </div>
        <button type="submit" class="btn-primary">Create account</button>
      </form>
      <div class="terms">
        By creating an account, you agree with our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Statement</a>.
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/create-password.js') ?>"></script>
</body>
</html>
