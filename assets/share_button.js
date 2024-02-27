"use strict";
if (navigator.share!==undefined)
{
    let btn = document.getElementById("share-button");

    btn.addEventListener("click", ()=>{
        navigator.share(
            {
                "url":window.location.href,
                "text":"Partecipa all'evento di Fablab Imperia"
            }
        )
    });
    btn.style.display = "block";
}