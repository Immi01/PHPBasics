
function changeText() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == xmlhttp.DONE && xmlhttp.status == 200) {
            console.log(xmlhttp.response);
            console.log(xmlhttp.responseText);
            document.getElementById("demo").innerHTML = xmlhttp.responseText;
        }
    };

    xmlhttp.open("GET", "testData.php", true);
    xmlhttp.send();
    
}
