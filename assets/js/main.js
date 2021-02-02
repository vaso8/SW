function clearHistory()
{
    var xhttp = new XMLHttpRequest();
    window.location = "/clear/history";

    xhttp.open("GET", "/clear/history", true);
    xhttp.send();
}


function red()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          'ddddddddddd';
        }
      };
    xhttp.open("POST", "index.php", true);
    xhttp.send();
}

var el = document.getElementById('button');
window.addEventListener('beforeunload', clearHistory);