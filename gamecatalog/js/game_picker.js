const gamelist = document.querySelector(".gamelist");
const filterSelect = document.getElementById("filter");

let storgeGames = [];

function displayGames(games) {
    gamelist.innerHTML = '';

    games.forEach((game, i) => {
        const info = document.createElement("div");
        info.classList.add("info-block","item");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.id = `game-${i}`;

        const textBox = document.createElement("div");
        textBox.classList.add("games-info");

        for (let key in game) {
            const div = document.createElement("div");
            div.textContent = `${key}: ${game[key]}`;
            textBox.appendChild(div);
        }

        info.appendChild(checkbox);
        info.appendChild(textBox);
        gamelist.appendChild(info);
    });
}

fetch('../json/games.json')
    .then(response => response.json())
    .then(data => {
        storgeGames = data;
        displayGames(storgeGames);
    });

filterSelect.addEventListener("change", () => {
    const filterValue = filterSelect.value;
    let filteredGames = storgeGames;

    if (filterValue === "gratis") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) === 0);
    } else if (filterValue === ">10") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) > 10);
    } else if (filterValue === ">20") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) > 20);
    }

    displayGames(filteredGames);
});