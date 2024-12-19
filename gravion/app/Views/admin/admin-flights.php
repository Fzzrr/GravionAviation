<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Flights</title>
  <link rel="stylesheet" href="<?= base_url('admin/admin-flights.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
  <header>
    <a href="../index.html" class="logo">GRAVION</a>
    <nav>
      <a href="<?= site_url('admin/users'); ?>">Users</a>
      <a href="<?= site_url('admin/payments'); ?>">Payments</a>
      <a href="<?= site_url('admin/bookings'); ?>">Bookings</a>
      <a href="<?= site_url('admin/flights'); ?>" class="active">Flights</a>
      <a href="<?= site_url('logout'); ?>" id="sign-out-button">Sign Out</a>
    </nav>
  </header>

  <main>
    <h1>✈️ Flights Management</h1>
    <h2>Manage flight data</h2>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFlightModal">Tambahkan Flight</button>

    <!-- Modal Form untuk Tambahkan Flight -->
    <div class="modal fade" id="addFlightModal" tabindex="-1" aria-labelledby="addFlightModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addFlightModalLabel">Tambah Flight Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('admin/addFlight') ?>" method="post">
              <div class="mb-3">
                <label for="departure_city" class="form-label">Kota Asal:</label>
                <input type="text" class="form-control" name="departure_city" id="departure_city" required>
              </div>

              <div class="mb-3">
                <label for="arrival_city" class="form-label">Kota Tujuan:</label>
                <input type="text" class="form-control" name="arrival_city" id="arrival_city" required>
              </div>

              <div class="mb-3">
                <label for="aircraft_category" class="form-label">Kategori Pesawat:</label>
                <input type="text" class="form-control" name="aircraft_category" id="aircraft_category" required>
              </div>

              <div class="mb-3">
                <label for="avg_price_per_flight_hour" class="form-label">Harga per Jam:</label>
                <input type="number" step="0.01" class="form-control" name="avg_price_per_flight_hour"
                  id="avg_price_per_flight_hour" required>
              </div>

              <div class="mb-3">
                <label for="avg_number_of_seats" class="form-label">Jumlah Kursi:</label>
                <input type="number" class="form-control" name="avg_number_of_seats" id="avg_number_of_seats" required>
              </div>

              <div class="mb-3">
                <label for="max_flight_length" class="form-label">Panjang Maksimal Penerbangan:</label>
                <input type="number" step="0.01" class="form-control" name="max_flight_length" id="max_flight_length"
                  required>
              </div>

              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal untuk Edit Flight -->
<div class="modal fade" id="editFlightModal" tabindex="-1" aria-labelledby="editFlightModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFlightModalLabel">Edit Flight</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/updateFlight') ?>" method="post">
        <input type="hidden" name="flight_id" id="flight_id">
        <div class="mb-3">
            <label for="departure_city" class="form-label">Kota Asal:</label>
            <input type="text" class="form-control" name="departure_city" id="departure_city" required>
          </div>

          <div class="mb-3">
            <label for="arrival_city" class="form-label">Kota Tujuan:</label>
            <input type="text" class="form-control" name="arrival_city" id="arrival_city" required>
          </div>

          <div class="mb-3">
            <label for="aircraft_category" class="form-label">Kategori Pesawat:</label>
            <input type="text" class="form-control" name="aircraft_category" id="aircraft_category" required>
          </div>

          <div class="mb-3">
            <label for="avg_price_per_flight_hour" class="form-label">Harga per Jam:</label>
            <input type="number" step="0.01" class="form-control" name="avg_price_per_flight_hour" id="avg_price_per_flight_hour" required>
          </div>

          <div class="mb-3">
            <label for="avg_number_of_seats" class="form-label">Jumlah Kursi:</label>
            <input type="number" class="form-control" name="avg_number_of_seats" id="avg_number_of_seats" required>
          </div>

          <div class="mb-3">
            <label for="max_flight_length" class="form-label">Panjang Maksimal Penerbangan:</label>
            <input type="number" step="0.01" class="form-control" name="max_flight_length" id="max_flight_length" required>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>


    <section class="flight-card">
      <table class="flight-table">
        <thead>
          <tr>
            <th>No</th>
            <th>From</th>
            <th>To</th>
            <th>Aircraft Category</th>
            <th>Price per Flight Hour</th>
            <th>Number of Seats</th>
            <th>Maximum Flight Length</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="flightTable">
          <?php if (!empty($flights)): ?>
            <?php foreach ($flights as $index => $flights): ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $flights['departure_city'] ?></td>
                <td><?= $flights['arrival_city'] ?></td>
                <td><?= $flights['aircraft_category'] ?></td>
                <td><?= $flights['avg_price_per_flight_hour'] ?></td>
                <td><?= $flights['avg_number_of_seats'] ?></td>
                <td><?= $flights['max_flight_length'] ?></td>
                <td>
                  <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editFlightModal"
                    data-flight-id="<?= $flights['flight_id'] ?>" data-departure-city="<?= $flights['departure_city'] ?>"
                    data-arrival-city="<?= $flights['arrival_city'] ?>"
                    data-aircraft-category="<?= $flights['aircraft_category'] ?>"
                    data-price="<?= $flights['avg_price_per_flight_hour'] ?>"
                    data-seats="<?= $flights['avg_number_of_seats'] ?>"
                    data-max-length="<?= $flights['max_flight_length'] ?>">Edit</a>
                </td>
                <td>
                  <form action="<?= site_url('admin/deleteFlights/' . $flights['flight_id']); ?>" method="post">
                    <button type="submit"
                      onclick="return confirm('Are you sure you want to delete this flight?');">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="9">No Flights Found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
  const editFlightModal = document.getElementById('editFlightModal');
  editFlightModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const flightId = button.getAttribute('data-flight-id');
    const departureCity = button.getAttribute('data-departure-city');
    const arrivalCity = button.getAttribute('data-arrival-city');
    const aircraftCategory = button.getAttribute('data-aircraft-category');
    const price = button.getAttribute('data-price');
    const seats = button.getAttribute('data-seats');
    const maxLength = button.getAttribute('data-max-length');

    editFlightModal.querySelector('#flight_id').value = flightId;
    editFlightModal.querySelector('#departure_city').value = departureCity;
    editFlightModal.querySelector('#arrival_city').value = arrivalCity;
    editFlightModal.querySelector('#aircraft_category').value = aircraftCategory;
    editFlightModal.querySelector('#avg_price_per_flight_hour').value = price;
    editFlightModal.querySelector('#avg_number_of_seats').value = seats;
    editFlightModal.querySelector('#max_flight_length').value = maxLength;
  });
</script>

</body>

</html>