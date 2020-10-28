var fields = [];
var displayData = [];
var arrayData = [];

function submitForm() {
    var form = document.getElementById("theForm");
    fields = document.querySelectorAll("input");
    fields.forEach(d => {
        displayData.push(d.value);
    });
    arrayData.push(displayData);
    displayData = [];
    console.log(arrayData);
    form.reset();
}

function showData() {
    if (document.getElementById("td")) {
        document.getElementById("td").remove();
    }
    var td = document.createElement("td");
    td.setAttribute("id", "td");
    console.log(td);
    arrayData.forEach(row => {
        var tr = document.createElement("tr");
        var ul = document.createElement("ul");
        row.forEach(e => {
            if (e != "Cadastrar" && e != "Mostrar Dados") {
                var li = document.createElement("li");
                var text = document.createTextNode(e);
                li.appendChild(text);
                ul.appendChild(li);
                tr.appendChild(ul);
            }
        });
        td.appendChild(tr);
        document.getElementById("data-table").appendChild(td);
    });
}

