    let selectUsers = document.querySelector('.select_users');
    let getUsers = new FormData();
    getUsers.append("clegetUsers", "secret");
    fetch("./components/getUsers.php", {
            method: 'POST',
            body: getUsers
        })
        .then(response => response.json())
        .then(text => {   
            for (elements of text) {
                let optionUsers = document.createElement("option")
                optionUsers.innerHTML = elements;
                selectUsers.appendChild(optionUsers);
            }
        })