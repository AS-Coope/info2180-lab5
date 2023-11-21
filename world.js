document.addEventListener("DOMContentLoaded", (event) => {
    main();
});

function main() {
    // create references to the necessary elements in HTML
    let countryInput = document.getElementById("country");
    let submitBtn = document.getElementById("lookup");
    let lookupCitiesBtn = document.getElementById("lookup-cities");
    let resourceUrl = "http://localhost/info2180-lab5/world.php"
    let result = document.getElementById("result");

    // listen for button click
    submitBtn.addEventListener('click', (event) => {

        event.preventDefault();
        const inputValue = countryInput.value.trim();
        if (inputValue !== '') {
            console.log(inputValue);
            fetch(resourceUrl + `?country=${inputValue}`)
                .then(response => { return response.text() })
                .then(txtResp => {
                    result.innerHTML = txtResp;
                })
                .catch(error => console.log(error));
        } else {
            result.textContent = "Please enter a country!";
        }
    });

    lookupCitiesBtn.addEventListener('click', (event) => {

        event.preventDefault();
        const inputValue = countryInput.value.trim();
        if (inputValue !== '') {
            console.log(inputValue);
            fetch(resourceUrl + `?country=${inputValue}&lookup=cities`)
                .then(response => { return response.text() })
                .then(txtResp => {
                    result.innerHTML = txtResp;
                })
                .catch(error => console.log(error));
        } else {
            result.textContent = "Please enter a country!";
        }
    });
    // get data from user (remember to validate)
    // use fetch to send request to the server
    // ensure, on server side, request is sanitized and filtered
    // make the request to the database
    // retrieve data (html) from server via fetch
    // display it in result div
}