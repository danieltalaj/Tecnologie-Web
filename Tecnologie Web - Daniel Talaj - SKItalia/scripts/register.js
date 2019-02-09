$(document).ready(function () {
    $("#createAccForm").submit(function (event) {
        alert("Handler for .submit() called.");
        // data = $("#createAccForm").serialize();
        // alert(data);
        
        
        userData = $("#createAccForm").serialize();
        alert(userData); // for debugging
        // userData = JSON.stringify(userData),
        

        $.ajax({
            url: "registerScript.php",
            type: "post",
            dataType: "json",
            data: userData,
            success: function(result) {
                // resultJSON = JSON.parse(result);
                // alert("Your account has been successfully created. You can log in now.");
                window.location.href = 'index.php' // neviem ci mozem pouzivat takto... ale funguje to
                // alert(result);
                // ... do something with the data...
            },
            error: function (exception) {
                // alert('Exception:', exception, ". Please, try again."); // doriesit 
                alert("There was a problem with processing your request. Please, try again.");
            }
        });        
        event.preventDefault();
    });
});





// magic.js
/*
$(document).ready(function () {
    $('createAccForm').submit(function (event) {

        alert("form has been submitted");

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'superheroAlias': $('input[name=superheroAlias]').val()
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'register.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
            // using the done promise callback
            .done(function (data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });



});
*/

function createNewAccount() {
    alert("createAccForm TRIGGERED!!!!");
}

function createNewAccount_OLD() {
    // process the form
    alert("createAccForm_OLD !");

    // var text = $('#createAccForm').find('input[name="name"]').val();
    // alert(text)



    // $('createAccForm').submit(function (event) {

        


        
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
            'gender': $('input[name=gender]').val()
        };
        alert(formData.name + formData.email + formData.password + formData.gender);
    /*
        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'register.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
            // using the done promise callback
            .done(function (data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        */
    // });
}