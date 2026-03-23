const gamelist = document.querySelector(".gamelist");
const filter_price = document.getElementById("filter_price");
const filter_genre = document.getElementById("filter_genre");
const toCartButton = document.querySelector(".to_shopping_car");
const filterLabels = document.querySelectorAll('label[for="filter_price"], label[for="filter_genre"]');

const shopping_cart = document.querySelector(".shopping_cart");
const cart_items = document.querySelector(".cart_items");
const total_price_div = document.querySelector(".total_price");
const back_button = document.querySelector(".back_button");

let storgeGames = [];
let cartGames = [];

function createGameInfo(game) {
    const textBox = document.createElement("div");
    textBox.classList.add("games-info");

    for (let key in game) {
        const div = document.createElement("div");
        div.textContent = `${key}: ${game[key]}`;
        textBox.appendChild(div);
    }

    return textBox;
}

function displayGames(gamesWithIndex) {
    gamelist.innerHTML = '';
    const form = document.createElement("form");
    gamelist.appendChild(form);

    gamesWithIndex.forEach(({ game, index }) => {
        const info = document.createElement("div");
        info.classList.add("info-block", "item");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.classList.add("checkbox");
        checkbox.dataset.index = index;

        const textBox = createGameInfo(game);

        info.appendChild(checkbox);
        info.appendChild(textBox);
        form.appendChild(info);
    });
}

fetch('../json/games.json')
    .then(response => response.json())
    .then(data => {
        storgeGames = data;
        const gamesWithIndex = storgeGames.map((game, i) => ({ game, index: i }));
        displayGames(gamesWithIndex);
    });

function applyFilters() {
    const priceValue = filter_price.value;
    const genreValue = filter_genre.value;

    let filteredGames = [];

    for (let i = 0; i < storgeGames.length; i++) {
        const game = storgeGames[i];
        let valid = true;

        if (priceValue === "gratis" && parseFloat(game.price) !== 0) valid = false;
        if (priceValue === ">10" && parseFloat(game.price) <= 10) valid = false;
        if (priceValue === ">20" && parseFloat(game.price) <= 20) valid = false;

        if (genreValue !== "all" && game.genre.toLowerCase() !== genreValue.toLowerCase()) valid = false;

        if (valid) {
            filteredGames.push({ game, index: i });
        }
    }

    displayGames(filteredGames);
}

filter_price.addEventListener("change", applyFilters);
filter_genre.addEventListener("change", applyFilters);

function renderCart() {
    cart_items.innerHTML = "";
    let sum = 0;

    cartGames.forEach((game, index) => {
        const info = document.createElement("div");
        info.classList.add("info-block", "item");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.checked = true;

        checkbox.addEventListener("change", () => {
            if (!checkbox.checked) {
                cartGames.splice(index, 1);
                renderCart();
            }
        });

        const textBox = createGameInfo(game);

        sum += parseFloat(game.price);

        info.appendChild(checkbox);
        info.appendChild(textBox);
        cart_items.appendChild(info);
    });

    total_price_div.textContent = `Totaalprijs: €${sum.toFixed(2)}`;
}

function showCart() {
    gamelist.style.display = "none";
    filter_price.style.display = "none";
    filter_genre.style.display = "none";
    filterLabels.forEach(label => label.style.display = "none");
    toCartButton.style.display = "none";
    shopping_cart.style.display = "block";
}

function showGamePicker() {
    shopping_cart.style.display = "none";
    gamelist.style.display = "block";
    filter_price.style.display = "inline-block";
    filter_genre.style.display = "inline-block";
    filterLabels.forEach(label => label.style.display = "inline-block");
    toCartButton.style.display = "block";
}

toCartButton.addEventListener("click", () => {
    const checkboxes = document.querySelectorAll(".checkbox");
    cartGames = [];

    checkboxes.forEach(cb => {
        if (cb.checked) {
            const index = parseInt(cb.dataset.index);
            cartGames.push(storgeGames[index]);
        }
    });

    renderCart();
    showCart();
});

back_button.addEventListener("click", () => {
    showGamePicker();
});