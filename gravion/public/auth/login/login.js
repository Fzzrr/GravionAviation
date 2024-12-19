function togglePasswordVisibility() {
  // Dapatkan elemen password dan ikon
  var passwordField = document.getElementById("password");
  var passwordIcon = document.querySelector(".show-password img");

  // Jalur gambar yang akan diubah
  var openedPasswordIcon = document.getElementById("opened-password-url").value;
  var hiddenPasswordIcon = document.getElementById("hidden-password-url").value;

  // Logika toggle visibility
  if (passwordField.type === "password") {
      passwordField.type = "text";
      passwordIcon.src = openedPasswordIcon; // Ikon untuk "show password"
  } else {
      passwordField.type = "password";
      passwordIcon.src = hiddenPasswordIcon; // Ikon untuk "hidden password"
  }
}
