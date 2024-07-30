
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
            let people = JSON.parse(xhr.response);
            console.log(people);
            let html = "<table><tr><th>Id</th><th>Vorname</th><th>Nachname</th></tr>";
            people.forEach(person => {
                html += `<tr><td>${person.id}</td><td>${person.firstName}</td><td>${person.lastName}</td></tr>`;
            });
            document.getElementById("people").innerHTML = html;
        }
    };
    xhr.open("GET", "People.php", true);
    xhr.send();

}

function getId(input) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        let html = "<table><tr><th>Id</th><th>Vorname</th><th>Nachname</th></tr>";
        if (xhr.readyState == xhr.DONE && xhr.status == 200) {
            let person = JSON.parse(xhr.response);
            document.getElementById("person").innerHTML = `${html}<tr><td>${person.id}</td><td>${person.firstName}</td><td>${person.lastName}</td></tr>`;
        } else if(xhr.readyState == xhr.DONE && xhr.status == 400) {
            document.getElementById("person").innerHTML = `Person with ID ${input} does not exist`;
        }
    };
    xhr.open("GET", "People.php?id=" + input, true);
    xhr.send();
}

function setPerson() {
    let fName = document.getElementById("setPersonFName").value;
    let lName = document.getElementById("setPersonLName").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == xhr.DONE && xhr.status == 200) {
            document.getElementById("setResult").innerHTML = `Person with ID ${xhr.response} created`;
        }
    }
    xhr.open("POST", `People.php?fName=${fName}&lName=${lName}`, true);
    xhr.send();
}

function reset() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "People.php?reset=1", true);
    xhr.send();
}
