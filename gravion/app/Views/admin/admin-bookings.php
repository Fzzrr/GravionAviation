<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Bookings</title>
  <link rel="stylesheet" href="<?= base_url('admin/admin-bookings.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
      <a href="#" class="logo">GRAVION</a>
      <nav>
        <a href="<?= site_url('admin/users'); ?>">Users</a>
        <a href="<?= site_url('admin/payments'); ?>">Payments</a>
        <a href="<?= site_url('admin/bookings'); ?>" class="active">Bookings</a>
        <a href="<?= site_url('admin/flights'); ?>">Flights</a>
        <a href="<?= site_url('logout'); ?>" id="sign-out-button">Sign Out</a>
      </nav>
    </header>

  <main>
    <h1>✈️ Bookings Management</h1>
    <h2>Manage user bookings</h2>

    <section class="booking-card">
      <table class="booking-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Delete</th>
          </tr>
        </thead>
          <?php $i = 1; ?>
          <?php foreach ($bookings as $row): ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->username; ?></td>
              <td><?= $row->departure_city; ?></td>
              <td><?= $row->arrival_city; ?></td>
              <td><?= $row->departure_date; ?></td>
              <td>
                <form action="<?= site_url('admin/deleteBooking/' . $row->booking_id) ?>" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit"
                    onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <script src="admin-bookings.js"></script>
</body>
</html>
