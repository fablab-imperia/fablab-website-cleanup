<button id="share-button" class="btn" type="button">
    <i class="fa fa-share-alt fa-lg"></i>
</button>

<script src="/assets/share_button.js"></script>

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
    display:none;
    background-color:var(--card-border-color);
    box-shadow: 0 0 5px var(--text);
}
#share-button:hover
{
    background-color: var(--background-color);
}
</style>