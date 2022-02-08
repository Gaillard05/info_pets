"use strict";
var btnCancel;
var message;
var redirige;

btnCancel = document.getElementById("cancel");

   function annuler(){
       if(confirm("êtes vous sûr de vouloir annuler ?")){
           message = alert("Vous allez être redirigé");
           redirige = window.location.href="index.php";
       }
   }
   

   btnCancel.addEventListener("click", annuler);