var imagess=['./foods_image/backk.jpg','./foods_image/back_burger.jpg','./foods_image/pizabg.jpg'];

var i=0;

function slideShoww(){
    document.getElementById("image").src=imagess[i];

    if(i<imagess.length-1)
    {
        i++;
    }
    else
    {
        i=0;

    }

    setTimeout("slideShoww()",5000);

}
window.onload=slideShoww;
