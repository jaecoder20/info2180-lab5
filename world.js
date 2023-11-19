

$(document).ready(function () {
    let button = $('#lookup');

    button.click(function () {
        getCountry($('input').val());
    });
});


function getCountry(userInput){
    // e.preventDefault();
    // userInput = searchField.value.toUpperCase();
    $.ajax({
        url: 'world.php',
        type: 'get',
        data:{country: userInput},
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