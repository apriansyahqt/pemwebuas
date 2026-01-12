// AUTO HILANG ALERT
setTimeout(() => {
  const alertBox = document.getElementById("alertBox");
  if (alertBox) {
    alertBox.style.opacity = "0";
    alertBox.style.transition = "0.5s";
    setTimeout(() => {
      alertBox.remove();
    }, 500);
  }
}, 3000); // 3 detik
