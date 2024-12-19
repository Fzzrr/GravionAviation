<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Payments</title>
  <link rel="stylesheet" href="<?= base_url('admin/admin-payments.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <a href="#" class="logo">GRAVION</a>
    <nav>
      <a href="<?= site_url('admin/users'); ?>">Users</a>
      <a href="<?= site_url('admin/payments'); ?>" class="active">Payments</a>
      <a href="<?= site_url('admin/bookings'); ?>">Bookings</a>
      <a href="<?= site_url('admin/flights'); ?>">Flights</a>
      <a href="<?= site_url('logout'); ?>" id="sign-out-button">Sign Out</a>
    </nav>
  </header>

  <main>
    <h1>💳 Payments Management</h1>
    <h2>Manage payment records</h2>

    <section class="payment-card">
      <table class="payment-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Status Payment</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($user_inquiry_status as $row): ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $row->username; ?></td>
              <form action="<?= site_url('admin/updateInquiryStatus/' . $row->user_id . '/' . $row->flight_info_id) ?>"
              method="post">
              <td>
                  <input type="hidden" name="_method" value="PUT"> <!-- To handle PUT requests -->
                  <select name="inquiry_status">
                    <option value="Incomplete" <?= $row->inquiry_status == 'Incomplete' ? 'selected' : '' ?>>Incomplete
                    </option>
                    <option value="Complete" <?= $row->inquiry_status == 'Complete' ? 'selected' : '' ?>>Complete</option>
                  </select>
                </td>
                <td>
                  <button type="submit">Update</button>
                </td>
                </form>
              <td>
                <form action="<?= site_url('admin/deleteInquiry/' . $row->flight_info_id) ?>" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit"
                    onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</button>
                </form>
              </td>


            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <!-- <script src="admin-payments.js"></script> -->
</body>

</html>