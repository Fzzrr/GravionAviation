<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Book On-demands</title>
    <link rel="stylesheet" href="pages/checkout/checkout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>


    <header>
        <h1>Book On-demands</h1>
    </header>

    <form id="checkout-form" action="<?= route_to('checkout/submit'); ?>" method="post">
        <!-- Personal Information -->
        <section class="personal-info">
            <h2><span>👤</span> Personal Information</h2>
            <div class="firstname">
                <label for="first-name">First name</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            
            <div>
                <label for="last-name">Last name</label>
                    <input type="text" id="last-name" name="last-name" required>
            </div>
            
            <label for="mobile-number">Mobile number</label>
            <div class="mobile-input">
                <select id="country-code" name="country-code">
                    <option value="+62">IDN +62</option>
                    <!-- Tambahkan kode negara lainnya di sini -->
                </select>
                <input type="tel" id="mobile-number" name="mobile-number" required>
            </div>

            <div class="privacy-policy">
                <input type="checkbox" id="accept-policy" required>
                <label for="accept-policy">I have read and accepted the Privacy Policy</label>
            </div>
        </section>

        <!-- Flights -->
        <section class="flights">
            <h2><span>✈️</span> Flights</h2>
            <div class="trip-type">
                <input type="radio" id="one-way" name="trip-type" value="one-way" checked>
                <label for="one-way">One way</label>
                <input type="radio" id="round-trip" name="trip-type" value="round-trip">
                <label for="round-trip">Round Trip</label>
            </div>

            <div>
                <label for="from">From</label>
                <select name="departure_city" id="from" required>
                    <?php foreach ($departureCities as $city): ?>
                        <option value="<?= esc($city['departure_city']); ?>">
                            <?= esc($city['departure_city']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
                        
            <div>
                <label for="to">To</label>
                <select name="arrival_city" id="to" required>
                    <?php foreach ($arrivalCities as $city): ?>
                        <option value="<?= esc($city['arrival_city']); ?>">
                            <?= esc($city['arrival_city']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <label for="passengers">Passengers</label>
                <input type="number" id="passengers" name="passengers" min="1" required>
            </div>
            
            <div>
                <label for="departure-date">Date (departure)</label>
                <input type="date" id="departure-date" name="departure-date" required>
            </div>
            
            <label for="departure-time">Time (departure)</label>
            <input type="time" id="departure-time" name="departure-time" required>
        </section>

        <!-- Payment Options -->
        <section class="payment-options">
            <h2><span>💳</span> Payment options</h2>
            <div class="tab">
                <button class="tablinks active" onclick="openPaymentOption(event, 'credit-card')">Debit/Credit Card</button>
                <button class="tablinks" onclick="openPaymentOption(event, 'paypal')">Paypal</button>
                <button class="tablinks" onclick="openPaymentOption(event, 'bank-transfer')">Bank transfer</button>
            </div>

            <div id="credit-card" class="tabcontent active">
                <div>
                    <label for="card-name">Name on card</label>
                    <input type="text" id="card-name" name="card-name" required>
                </div>
                
                <div>
                    <label for="card-number">Card number</label>
                    <input type="text" id="card-number" name="card-number" required>
                </div>
                

                <div class="card-details">
                    <div class="exp-date">
                        <label for="exp-month">Exp. Date</label>
                        <select id="exp-month" name="exp-month" required>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <select id="exp-year" name="exp-year" required>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>

                    <div class="security">
                        <label for="security-code">CVC</label>
                        <input type="text" id="security-code" name="security-code" required>
                    </div>
                </div>

                <label for="zip-code">Billing Zip Code</label>
                <input type="text" id="zip-code" name="zip-code" required>
            </div>
        </section>

        <!-- Submit Button -->
        <div class="button-container">
            <button id="proceed-btn" type="submit" 
            onclick="return alert('Proses booking berhasil dibuat')">Proceed</button>
        </div>
    </form>

    <!-- <script src="pages/checkout.js"></script> -->
</body>

</html>
