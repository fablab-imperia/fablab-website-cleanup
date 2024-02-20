"use strict";
for (const item of document.querySelectorAll('[data-scroll]'))
{
    item.addEventListener("click",
        ()=>{
            document.querySelectorAll(
                item.dataset.scroll
            )[0].scrollIntoView({
                behavior:"smooth"
            });
        }
    );
}
