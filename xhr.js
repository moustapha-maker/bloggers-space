function getXMLHttpRequest() {
    var xhr = null;
    try
    {
     xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Essayer IE
    }
    catch(e) // Echec, utiliser l'objet standard
    {
    xhr = new XMLHttpRequest();
    }
    return xhr;
    }
 function myFunction(xhr) {
        var i;
        var xmlDoc = xhr.responseXML;
        var table="<table><tr><th>Artist</th><th>Title</th></tr>";
        var x = xmlDoc.getElementsByTagName("CD");
        for (i = 0; i <x.length; i++) {
        table += "<tr><td>" +
        x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
        "</td></tr>";
        }
        table += "</table>"
        document.getElementById("resultat").innerHTML = table;
        }