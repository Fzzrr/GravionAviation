document.addEventListener("DOMContentLoaded", function () {
    // Mengambil data dari localStorage yang disimpan dari laman checkout
    const fromCity = localStorage.getItem("fromCity") || "";
    const toCity = localStorage.getItem("toCity") || "";
    const departureDate = localStorage.getItem("departureDate") || "";
    const departureTime = localStorage.getItem("departureTime") || "";
    const passengers = localStorage.getItem("passengers") || "";
    const departureAirport = localStorage.getItem("departureAirport") || "";
    const arrivalAirport = localStorage.getItem("arrivalAirport") || "";
    const aircraftCategory = localStorage.getItem("aircraftCategory") || "";
    const pricePerHour = localStorage.getItem("pricePerHour") || "";
    const seats = localStorage.getItem("seats") || "";
    const maxFlightLength = localStorage.getItem("maxFlightLength") || "";
    const tripType = localStorage.getItem("tripType") || "One way";

    // Update elemen dengan data dari localStorage
    document.getElementById("from-city").textContent = fromCity;
    document.getElementById("to-city").textContent = toCity;
    document.getElementById("departure-date").textContent = departureDate;
    document.getElementById("departure-time").textContent = departureTime;
    document.getElementById("passengers").textContent = passengers;
    document.getElementById("departure-airport").textContent = departureAirport;
    document.getElementById("arrival-airport").textContent = arrivalAirport;
    document.getElementById("trip-type").textContent = tripType

    // Perbarui rute perjalanan jika ada dari dan ke kota
    if (fromCity && toCity) {
        document.getElementById("route").textContent = `✈️ ${fromCity} ➔ ${toCity}`;
    }

    // Update informasi pesawat
    document.getElementById("aircraft-category").textContent = aircraftCategory;
    document.getElementById("price-per-hour").textContent = pricePerHour;
    document.getElementById("seats").textContent = seats;
    document.getElementById("max-flight-length").textContent = maxFlightLength;
});

function proceedToPayment() {
    alert("Proceeding to payment...");
    // Alihkan ke halaman pembayaran
    window.location.href = "../pages/index.php";
}

// Fungsi logout
document.getElementById('sign-out-button').addEventListener('click', function (e) {
    e.preventDefault();
    if (confirm('Are you sure you want to sign out?')) {
        localStorage.clear();
        window.location.href = '../index.html';
    }
});