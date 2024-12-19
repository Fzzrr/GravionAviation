document.addEventListener("DOMContentLoaded", function () {
    const oneWay = document.getElementById("one-way");
    const roundTrip = document.getElementById("round-trip");
  
    const returnDateLabel = document.createElement("label");
    returnDateLabel.setAttribute("for", "return-date");
    returnDateLabel.textContent = "Date (return)";
  
    const returnDateInput = document.createElement("input");
    returnDateInput.setAttribute("type", "date");
    returnDateInput.setAttribute("id", "return-date");
    returnDateInput.setAttribute("name", "return-date");
    returnDateInput.required = true;
  
    const flightForm = document.getElementById("flight-info-form");
  
    // Fungsi untuk menampilkan / menyembunyikan return date
    function toggleReturnDate() {
      if (roundTrip.checked) {
        flightForm.appendChild(returnDateLabel);
        flightForm.appendChild(returnDateInput);
      } else {
        if (flightForm.contains(returnDateLabel)) {
          flightForm.removeChild(returnDateLabel);
          flightForm.removeChild(returnDateInput);
        }
      }
    }
  
    oneWay.addEventListener("change", toggleReturnDate);
    roundTrip.addEventListener("change", toggleReturnDate);
  
    // Panggil fungsi saat halaman pertama kali dimuat
    toggleReturnDate();
  });

  function openPaymentOption(evt, paymentType) {
    const tabcontents = document.querySelectorAll(".tabcontent");
    tabcontents.forEach((content) => content.classList.remove("active"));
  
    const tablinks = document.querySelectorAll(".tablinks");
    tablinks.forEach((link) => link.classList.remove("active"));
  
    document.getElementById(paymentType).classList.add("active");
    evt.currentTarget.classList.add("active");
  }

document.getElementById("proceed-btn").addEventListener("click", function () {
    // Alihkan ke halaman My Flights
    window.location.href = "../myflights/myflights.html";
  });