// fungsi penyimpanan dan reset password
document.getElementById('details-form').addEventListener('submit', function (e) {
  e.preventDefault();
  alert('Your details have been saved successfully!');
});

document.getElementById('email-form').addEventListener('submit', function (e) {
  e.preventDefault();
  alert('Password reset link has been sent to your email!');
});

// Fungsi logout
document.getElementById('sign-out-button').addEventListener('click', function (e) {
  e.preventDefault();
  if (confirm('Are you sure you want to sign out?')) {
      localStorage.clear();
      window.location.href = '../index.html';
  }
});