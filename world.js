


$(document).ready(function () {
    let lookForCities = false;
    let button = $('#lookup');
    let button_c = $('#lookup-c');
    button.click(function () {
        lookForCities = false;
        getCountry($('input').val(),lookForCities);
    });
    button_c.click(function () {
        lookForCities = true;
        getCountry($('input').val(),lookForCities);
    });
});


function getCountry(userInput,lookForCities){
    // e.preventDefault();
    // userInput = searchField.value.toUpperCase();
    $.ajax({
        url: 'world.php',
        type: 'get',
        data:{
            country: userInput,
            cityLookup: lookForCities
        },
        success: function(data) {
            displayResults(data);
        },
        error: function(err) {
            alert(err);
        }
    })
}

function displayResults(data){
    $("#result").html(data);
}