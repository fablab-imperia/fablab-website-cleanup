"use strict";

const HTML_MAPS = `
<iframe
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5751.931801130716!2d8.0127440041013!3d43.87725809769747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d26ea95c9af2f7%3A0x762f784593820aec!2sFablab%20Imperia!5e0!3m2!1sen!2sit!4v1620901654444!5m2!1sen!2sit"
style="border:0; width:100%; height:100%;"
class="rounded"
allowfullscreen=""
loading="lazy"></iframe>
`;

document.getElementById("map_load_action")
    .addEventListener("submit", (e)=>{
        e.preventDefault();
        document.getElementById("maps_placeholder").innerHTML = HTML_MAPS;
    });