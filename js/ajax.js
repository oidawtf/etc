
function getXmlHttpRequest()
{
    var xmlhttp;
                
    if (window.XMLHttpRequest)  // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    else                        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                
    return xmlhttp;
}

function OnMenuClicked(content)
{
    var xmlhttp = getXmlHttpRequest();
    var url = content;
    var params = "";

    xmlhttp.open("POST", url, true);
                
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            document.getElementById("content").innerHTML=xmlhttp.responseText;
        }
    };

    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", params.length);
    xmlhttp.setRequestHeader("Connection", "close");
            
    xmlhttp.send(params);
}

    function OnSeatsLoad(eventId)
    {
        var xmlhttp = getXmlHttpRequest();
        var url = "ui/seats.php";
        var params = "eventId=" + eventId;

        xmlhttp.open("POST", url, true);

        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState===4 && xmlhttp.status===200)
                document.getElementById("seatlist").innerHTML=xmlhttp.responseText;
        };

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
    }
