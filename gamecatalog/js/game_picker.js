const container = document.querySelector(".container");

fetch('../json/games.json')
    .then(response => response.json())
    .then(data => {
        for (let i = 0; i < data.length; i++) {
            const info = document.createElement("div");
            info.classList.add("info-block","item");

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.id = `game-${i}`;

            const textBox = document.createElement("div");
            textBox.classList.add("games-info");
            
            for (let key in data[i]) {
                const div = document.createElement("div");
                div.textContent = `${key}: ${data[i][key]}`;
                textBox.appendChild(div);
            }


            info.appendChild(checkbox);
            info.appendChild(textBox);
            container.appendChild(info);
        }
    });