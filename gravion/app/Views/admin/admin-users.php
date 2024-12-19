<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Users</title>
  <link rel="stylesheet" href="<?= base_url('admin/admin-users.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <a href="#" class="logo">GRAVION</a>
    <nav>
      <a href="<?= site_url('admin/users'); ?>" class="active">Users</a>
      <a href="<?= site_url('admin/payments'); ?>">Payments</a>
      <a href="<?= site_url('admin/bookings'); ?>">Bookings</a>
      <a href="<?= site_url('admin/flights'); ?>">Flights</a>
      <a href="<?= site_url('logout'); ?>" id="sign-out-button">Sign Out</a>
    </nav>
  </header>


  <main>
    <h1>👤 Users Management</h1>
    <h2>All registered users</h2>

    <section class="user-card">
      <table class="user-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $index => $user): ?>
              <tr>
                <td><?= $index + 1; ?></td>
                <td>
                  <form action="<?= site_url('admin/update-user/' . $user['user_id']); ?>" method="post">
                    <input type="text" name="username" value="<?= esc($user['username']); ?>">
                </td>
                <td>
                  <input type="email" name="email" value="<?= esc($user['email']); ?>">
                </td>
                <td>
                  <button type="submit">Update</button>
                  </form>
                </td>
                <td>
                  <form action="<?= site_url('admin/delete-user/' . $user['user_id']); ?>" method="post">
                    <button type="submit"
                      onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5">No users found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </section>
  </main>

</body>

</html>