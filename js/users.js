const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active")
    searchBar.focus();
    searchBtn.classList.toggle("active")
    searchBar.value = "";
}


searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    // adding an active class when the user start searching, and only run the setinterval ajax if there is no active class
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                usersList.innerHTML = data;

            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm); //sendigng user search term to php file with AJAX
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                if (!searchBar.classList.contains("active")) { // if active active not contains in search bar then add this active
                    usersList.innerHTML = data;

                } 
            }
        }
    }
    xhr.send();
}, 500); //this function will run frequently after 500ms