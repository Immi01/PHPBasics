
function changeText() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == xmlhttp.DONE && xmlhttp.status == 200) {
            document.getElementById("demo").innerHTML = xmlhttp.responseText;
        }
    };

    xmlhttp.open("GET", "changeText.php", true);
    xmlhttp.send();
    
}

function getPeople() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == xhr.DONE && xhr.status == 200) {
            var people = JSON.parse(xhr.response);
            var html = "<table><tr><th>Id</th><th>Vorname</th><th>Nachname</th></tr>";
            people.forEach(person => {
                html += `<tr><td>${person.id}</td><td>${person.firstName}</td><td>${person.lastName}</td></tr>`;
            });
            document.getElementById("people").innerHTML = html;
        }
    };
    xhr.open("GET", "getPeople.php", true);
    xhr.send();

}
