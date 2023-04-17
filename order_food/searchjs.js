function getXMLHttpRequest()
{
    var xhr=null;
    if(window.XMLHttpRequest || window.ActiveXObject)
    {
        if(window.ActiveXObject)
        {
            try
            {
                xhr=new ActiveXObject("Msxml2.XMLHTTP");

            }
            catch(e)
            {
                xhr=new ActiveXObject("Microsoft.XMLHTTP");

            }
        }
        else
        {
            xhr=new XMLHttpRequest();

        }
    }
    else
    {
        alert("Your browser does not support xmlHttpRequest");
        return null;
    }
    return xhr;

}

var xhr=getXMLHttpRequest();
function refresh(s)
{
    var xhr=getXMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4 && (xhr.status==200 || xhr.status===0))
        {
            document.getElementById(s).innerHTML=xhr.responseText;
        }
    };
    xhr.open("GET",s+".php",true);
    xhr.send(null);


}
function refreshsearchpage()
{
    refresh('searchpage');

}

//create the function that will make the search
function goSearch()
{
    var xhr=getXMLHttpRequest();
    xhr.onreadystatechange=function()
    {
        if(xhr.readyState==4 && (xhr.status==200 || xhr.status===0))
        {
            document.getElementById('searchpage').innerHTML=xhr.responseText;
        }

    };
    var search=document.getElementById('searchfield').value;
    xhr.open("POST","searchpage.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("search="+search);
}
refreshsearchpage();