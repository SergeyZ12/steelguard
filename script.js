const phoneInput = document.getElementById("phone");

phoneInput.addEventListener("input", function () {
    let numbers = this.value.replace(/\D/g, "");

    if (numbers.startsWith("8")) {
        numbers = "7" + numbers.slice(1);
    }

    if (!numbers.startsWith("7")) {
        numbers = "7" + numbers;
    }

    numbers = numbers.slice(0, 11);

    let result = "+7";

    if (numbers.length > 1) {
        result += " (" + numbers.slice(1, 4);
    }

    if (numbers.length >= 4) {
        result += ") " + numbers.slice(4, 7);
    }

    if (numbers.length >= 8) {
        result += "-" + numbers.slice(7, 9);
    }

    if (numbers.length >= 10) {
        result += "-" + numbers.slice(9, 11);
    }

    this.value = result;
});

const filterButtons = document.querySelectorAll(".filter-button");
const productCards = document.querySelectorAll(".product-card");

filterButtons.forEach(function (button) {

    button.addEventListener("click", function () {

        const filter = this.dataset.filter;

        filterButtons.forEach(function (btn) {
            btn.classList.remove("active");
        });

        this.classList.add("active");

        productCards.forEach(function (card) {

            if (filter === "all" || card.dataset.material === filter) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });

    });
});

const contactForm = document.querySelector(".contact-form");

contactForm.addEventListener("submit", function (event) {

    const phone = phoneInput.value;
    const phoneNumbers = phone.replace(/\D/g, "");

    if (phoneNumbers.length !== 11) {
        event.preventDefault();

        alert("Пожалуйста, введите полный номер телефона.");

        phoneInput.value = "+7";
        phoneInput.focus();
    }
});