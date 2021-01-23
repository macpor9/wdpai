

document.addEventListener("keydown", (e)=>{
    if(e.code === "Escape"){
        hideSettingsPopup(e);
    }
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



window.addEventListener("load", ()=>{
   popupInit();
});

function popupInit(){
    let e = document.querySelectorAll(".popup-window");
    for(let i of e) {
        i.addEventListener("click", hidePopup);
        i.children[0].addEventListener("click", (e) => e.stopPropagation());
    }
}

// function showSettingsPopup(){
//     let e = document.getElementById("popup");
//     e.classList.add("show");
// }
// function hideSettingsPopup(event) {
//     if (event)
//         event.stopPropagation();
//
//     let e = document.getElementById("popup");
//     e.classList.remove("show");
// }



function showPopup(id){
    let e = document.getElementById(id);
    if(e && !e.classList.contains("show"))
        e.classList.add("show");
}

function hidePopup(event){
    if(event)
        event.stopPropagation();

    let e = document.querySelectorAll(".popup-window");
    for(let i of e){
        i.classList.remove("show");
    }
}


// const confirmedPasswordInput = form.querySelector('input[name="repeat-password"]')
// function arePasswordsSame(password, confirmedPassword){
//     return password===confirmedPassword;
// };
//
// function markValidation(element, condition){
//     if (!condition)
//         element.classList.add('no-valid')
//     else
//         element.classList.remove('no-valid')
//
// };
//
// confirmedPasswordInput.addEventListener('keyup', function (){
//     setTimeout(function(){
//         console.log("sadadsadsasd");
//         const condition = !arePasswordsSame(
//             confirmedPasswordInput.value,confirmedPasswordInput.previousElementSibling.value
//         )
//         markValidation(confirmedPasswordInput, condition)
//     });
// });

// const form = document.querySelector("form");
// const confirmedPasswordInput = form.querySelector('input[name="repeat-password"]');
//
//
// function arePasswordsSame(password, confirmedPassword) {
//     return password === confirmedPassword;
// }
//
// function markValidation(element, condition) {
//     !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
// }
//
//
// function validatePassword() {
//     setTimeout(function () {
//             const condition = arePasswordsSame(
//                 confirmedPasswordInput.previousElementSibling.value,
//                 confirmedPasswordInput.value
//             );
//             markValidation(confirmedPasswordInput, condition);
//         },
//         1000
//     );
// }
//
// confirmedPasswordInput.addEventListener('keyup', validatePassword);


