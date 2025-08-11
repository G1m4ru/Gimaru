const languageSwitcher = document.getElementById("languageSwitcher");

languageSwitcher.addEventListener("change", (e) => {
  const lang = e.target.value;
  alert(`Language switched to: ${lang.toUpperCase()}`);
});

document.addEventListener("DOMContentLoaded", function () {
  const joinButton = document.getElementById("joinButton");

  if (joinButton) {
    joinButton.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("popupModal");
  const openBtn = document.querySelector(".cta-button");
  const closeBtn = document.querySelector(".close-btn");

  // Show modal when button is clicked
  openBtn.addEventListener("click", function (e) {
    e.preventDefault();
    modal.style.display = "flex";
  });

  // Close modal on close button
  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // Close modal when clicking outside content
  window.addEventListener("click", function (e) {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });

  // Optional: Handle form submission
  document.getElementById("membershipForm").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Thank you for signing up! We'll contact you soon.");
    modal.style.display = "none";
    this.reset();
  });
});