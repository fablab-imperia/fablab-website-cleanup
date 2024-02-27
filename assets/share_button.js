"use strict";
if (navigator.share!==undefined)
{
    document.getElementById("share-button")
    .addEventListener("click", ()=>{
        navigator.share(
            {
                "url":window.location.href
            }
        )
    });
}
else
{
    document.getElementById("share-button").style.display="none";
}