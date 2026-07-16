let nextId = 11;

function toggleStatus(button) {
    let row = button.parentElement.parentElement;
    let statusCell = row.querySelector(".status");

    if (statusCell.textContent === "0") {
        statusCell.textContent = "1";
    } else {
        statusCell.textContent = "0";
    }
}

document.getElementById("userForm").addEventListener("submit", function(e) {

    e.preventDefault();

    let name = document.getElementById("name").value;
    let age = document.getElementById("age").value;

    let row = document.createElement("tr");

    row.innerHTML = `
        <td>${nextId}</td>
        <td>${name}</td>
        <td>${age}</td>
        <td class="status">0</td>
        <td><button onclick="toggleStatus(this)">Toggle</button></td>
    `;

    document.getElementById("tableBody").appendChild(row);

    nextId++;

    this.reset();
});
