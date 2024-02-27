<button id="share-button" class="btn" type="button">
    <i class="fa fa-share-alt fa-lg"></i>
</button>

<script>
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
</script>

<style>
@media(max-width:768px)
{
    #share-button
    {
        position:fixed;
        bottom:5vh;
        right:5vw;
        z-index:5;
    }
}

#share-button
{
    background-color:var(--card-border-color);
}
#share-button:hover
{
    background-color: var(--background-color);
}
</style>