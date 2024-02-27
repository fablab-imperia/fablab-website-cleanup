"use strict";
if (navigator.share!==undefined)
{
    document.getElementById("share-button")
    .addEventListener("click", ()=>{
        navigator.share(
            {
                "url":window.location.href,
                "text":"Partecipa all'evento di Fablab Imperia"
            }
        )
    });
}
else
{
    document.getElementById("share-button").style.display="none";
}