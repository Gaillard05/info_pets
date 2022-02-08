/*slider page news*/
"use strict";

var s=0;
defile();

function defile(){
    var i;
    var x = document.getElementsByClassName("img");
    for (i = 0; i < x.length; i++){
        x[i].style.display = "none";
    }
    s++;
    if(s > x.length){s = 1}
    x[s-1].style.display="block";
    setTimeout(defile, 5000);
}