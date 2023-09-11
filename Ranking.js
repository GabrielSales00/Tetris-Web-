const rankingData = [
    // ainda vou fazer isso aqui conectado com o banco de dados
    { position: 1, name: "Euler", score: 500},
    { position: 2, name: "Gino", score: 450},
    { position: 3, name: "Gabriel", score: 400},
    { position: 4, name: "Thomas", score: 350},
    { position: 5, name: "João", score: 300},
    { position: 5, name: "João", score: 300},
    { position: 5, name: "João", score: 300},
    { position: 5, name: "João", score: 300},
    { position: 5, name: "João", score: 300},
    
];

function fillRankingTable() {
    const rankingContainer = document.getElementById("ranking-container");
    const table = document.createElement("table");
    table.id = "ranking-table";
    
    table.innerHTML = `
        <tr id="ranking-head">
            <th>Posição</th>
            <th>Nome</th>
            <th>Pontuação</th>
        </tr>
    `;
    
    rankingData.forEach(entry => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td id="conteudo">${entry.position}</td>
            <td id="conteudo">${entry.name}</td>
            <td id="conteudo">${entry.score}</td>
        `;
        table.appendChild(row);
    });
    
    rankingContainer.appendChild(table);
}

window.onload = fillRankingTable;