const searchLogin = document.querySelector('input[placeholder="User"]');
const userContainer = document.querySelector(".user-list-container");



searchLogin.addEventListener("keyup", function(event){
   if(event.key === "Enter"){
       event.preventDefault();

       const data = {searchLogin: this.value};

       fetch("/search", {
           method: "POST",
           headers: {'Content-Type': 'application/json'},
           body: JSON.stringify(data)
       }).then(function (response){
           return response.json();
       }).then(function (users){
           userContainer.innerHTML = "";
           loadUsers(users)
       });
   }
});

function loadUsers(users) {
    users.forEach(user => {
       console.log(user);
       createUser(user);
    });
}

function createUser(user){
    const template = document.querySelector("#user-template")

    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/img/${user.avatar_path}`;
    const loginInput = clone.querySelector("input");
    loginInput.value = user.login;
    const loginSpan = clone.querySelector(".field-name");
    loginSpan.innerHTML = 'login';
    const loginSpan2 = clone.querySelector("#login");
    loginSpan2.innerHTML = user.login;

    userContainer.appendChild(clone);

}