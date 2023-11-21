document.addEventListener("DOMContentLoaded", (event) => {
    main();
});

function main() {
    // create references to the necessary elements in HTML
    let countryInput = document.getElementById("country");
    let submitBtn = document.getElementById("lookup");
    let resourceUrl = "http://localhost/info2180-lab5/world.php"
    let result = document.getElementById("result");

    // listen for button click
    // get data from user (remember to validate)
    // use fetch to send request to the server
    // ensure, on server side, request is sanitized and filtered
    // make the request to the database
    // retrieve data (html) from server via fetch
    // display it in result div
}