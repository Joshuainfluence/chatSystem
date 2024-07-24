const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = () => {
    // starting AJAX
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; //once the message is inserted in the database, the input field will remain blank
                scrollToBottom();
            }
        }
    }
    // we have to send the form data through AJAX to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending thr formData to php

}

// this will work when the mouse scroll to that part
chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

// this will work when the mouse leaves that part
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                // console.log(data);
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) { //if active class not contained in the chatbox, then scroll to buttom
                    scrollToBottom();

                }
            }
        }
    }
    // we have to send the form data through AJAX to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending thr formData to php
}, 500); //this function will run frequently after 500ms

// function to scroll chat to bottom automatically
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}


// https://www.udacity.com/school/artificial-intelligence
// https://learn.udacity.com/my-programs?tab=Currently%2520Learning