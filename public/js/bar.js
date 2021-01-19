
window.addEventListener("load", ()=>{
    let e = document.getElementById("settings-popup");
    e.addEventListener("click", hideSettingsPopup);
    e.children[0].addEventListener("click", (e)=>e.stopPropagation());
});


function onClickMenuBarIcon(){
    let e = document.getElementById("mainNav");
    if(e.classList.contains("active"))
        e.classList.remove("active")
    else
        e.classList.add("active");
}

function onClickProfileButton(){
    var x = new XMLHttpRequest();
    x.open("profile","DefaultController.php",true);
    x.send();
    return false;
}

function hideSettingsPopup(event){
    if(event)
        event.stopPropagation();

    let e = document.getElementById("settings-popup");
    e.classList.remove("show");
}

function showSettingsPopup(){
    let e = document.getElementById("settings-popup");
    e.classList.add("show");
}