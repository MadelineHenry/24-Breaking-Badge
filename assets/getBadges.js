    let select = document.querySelector('.select_badge');
    let getBadges = new FormData();
    getBadges.append("cleGetBadges", "secret");
    fetch("./components/getbadges.php", {
            method: 'POST',
            body: getBadges
        })
        .then(response => response.json())
        .then(text => {
            for (elements of text) {
                let optionBadge = document.createElement("option")
                optionBadge.innerHTML = elements;
                select.appendChild(optionBadge);
            }
        })