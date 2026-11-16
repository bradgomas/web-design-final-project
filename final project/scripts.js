// Simple client-side form validation reminder
document.addEventListener("DOMContentLoaded", () => {
    const bookingForm = document.querySelector("form");
    if (bookingForm) {
        bookingForm.addEventListener("submit", (e) => {
            const nameInput = document.querySelector("#client_name");
            if (nameInput && nameInput.value.trim() === "") {
                alert("Please enter your name before submitting.");
                e.preventDefault();
            }
        });
    }
});