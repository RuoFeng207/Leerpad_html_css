const gamelist = document.querySelector(".gamelist");
const filter_price = document.getElementById("filter_price");
const filter_genre = document.getElementById("filter_genre");
const button = document.querySelector(".submit_button");
let storgeGames = [];

function displayGames(gamesWithIndex, checkedIndices = []) {
    gamelist.innerHTML = '';
    const form = document.createElement("form");
    gamelist.appendChild(form);
    let sum = 0;
    gamesWithIndex.forEach(({ game, index }) => {
        const info = document.createElement("div");
        info.classList.add("info-block", "item");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.classList.add("checkbox");
        checkbox.dataset.index = index;

        if (checkedIndices.includes(index)) {
            checkbox.checked = true;
            sum += parseFloat(game.price);
        }

        const textBox = document.createElement("div");
        textBox.classList.add("games-info");

        for (let key in game) {
            const div = document.createElement("div");
            div.textContent = `${key}: ${game[key]}`;
            textBox.appendChild(div);
        }

        info.appendChild(checkbox);
        info.appendChild(textBox);
        form.appendChild(info);
    });

    const totalprice = document.createElement("div");
    totalprice.textContent = `Totaalprijs: €${sum.toFixed(2)}`;
    totalprice.style.fontWeight = "bold";
    totalprice.style.marginTop = "10px";
    gamelist.appendChild(totalprice);
}

fetch('../json/games.json')
    .then(response => response.json())
    .then(data => {
        storgeGames = data;
        const gamesWithIndex = storgeGames.map((game, i) => ({ game, index: i }));
        displayGames(gamesWithIndex);
    });

filter_price.addEventListener("change", () => {
    const filterValue = filter_price.value;
    let filteredGames = storgeGames;

    if (filterValue === "gratis") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) === 0);
    } else if (filterValue === ">10") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) > 10);
    } else if (filterValue === ">20") {
        filteredGames = storgeGames.filter(game => parseFloat(game.price) > 20);
    }

    const gamesWithIndex = filteredGames.map(game => ({ game, index: storgeGames.indexOf(game) }));
    displayGames(gamesWithIndex);
});

filter_genre.addEventListener("change", () => {
    const filterValue = filter_genre.value;
    let filteredGames = storgeGames;

    if (filterValue === "fps") {
        filteredGames = storgeGames.filter(game => (game.genre) === "FPS");
    } else if (filterValue === "moba") {
        filteredGames = storgeGames.filter(game => (game.genre === "MOBA"));
    } else if (filterValue === "action") {
        filteredGames = storgeGames.filter(game => (game.genre === "Action"));
    } else if (filterValue === "rpg") {
        filteredGames = storgeGames.filter(game => (game.genre === "RPG"));
    } else if (filterValue === "sim") {
        filteredGames = storgeGames.filter(game => (game.genre === "Simulation"));
    } else if (filterValue === "shooter") {
        filteredGames = storgeGames.filter(game => (game.genre === "Loot-Shooter"));
    } else if (filterValue === "sport") {
        filteredGames = storgeGames.filter(game => (game.genre === "Sport"));
    } else if (filterValue === "sandbox") {
        filteredGames = storgeGames.filter(game => (game.genre === "Sandbox"));
    } else if (filterValue === "rougelike") {
        filteredGames = storgeGames.filter(game => (game.genre === "Rougelike"));
    } else if (filterValue === "advanture") {
        filteredGames = storgeGames.filter(game => (game.genre === "Advanture"));
    }

    const gamesWithIndex = filteredGames.map(game => ({ game, index: storgeGames.indexOf(game) }));
    displayGames(gamesWithIndex);
});

// button.addEventListener("click", () => {
//     const selectedIndices = [];
//     const checkboxes = document.querySelectorAll(".gamelist input[type='checkbox']");

//     let sum = 0;
//     checkboxes.forEach((checkbox) => {
//         if (checkbox.checked) {
//             const index = parseInt(checkbox.dataset.index);
//             selectedIndices.push(index);
//             sum += parseFloat(storgeGames[index].price);
//         }
//     });

//     const selectedGamesWithIndex = selectedIndices.map(i => ({ game: storgeGames[i], index: i }));

//     displayGames(selectedGamesWithIndex, selectedIndices);
//     console.log(displayGames);
//     console.log("Totaalprijs:", sum);
// });