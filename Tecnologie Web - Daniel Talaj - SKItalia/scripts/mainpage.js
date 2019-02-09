$(document).ready(function () {
    $("#skiresortsTable").hide(); // to hide table by default; only shows after a query is triggered

    $("#searchSkiresortsButton").on("click", function () {
        userData = "";
        $.ajax({
            url: "mainpageScript.php",
            type: "post",
            dataType: "json",
            data: userData,
            success: function (result) {
                // alert("Your account has been successfully created. You can log in now.");
                // window.location.href = 'index.php' // neviem ci mozem pouzivat takto... ale funguje to
                // alert(result);
                // ... do something with the data...
                //alert("salala");
                onSuccess_getSkiresortData(result);
                alert("success in ajax");
                // document.getElementById("resultArea").innerHTML = result;
            },
            error: function (exception) {
                alert("exception triggered in ajax");
                alert(exception); // doriesit 
            }
        });
    });


    $("#FavoriteSkiresortsButton").on("click", function () {
        userData = "";
        $.ajax({
            url: "FavoriteSkiresortsScript.php",
            type: "post",
            dataType: "json",
            data: userData,
            success: function (result) {
                // alert("Your account has been successfully created. You can log in now.");
                // window.location.href = 'index.php' // neviem ci mozem pouzivat takto... ale funguje to
                // alert(result);
                // ... do something with the data...
                //alert("salala");
                onSuccess_getFavorites(result);
                alert("success in ajax");
                // document.getElementById("resultArea").innerHTML = result;
            },
            error: function (exception) {
                alert("exception triggered in ajax");
                alert(exception); // doriesit
            }
        });
    });


    $("#AddToFavoritesButton").on("click", function () {
        userData = "";
        var checked = [];
        //alert("treti button triggered");

        //$('#skiresortsTable tr:has(td)').find('input[type="checkbox"]').each(function (i) {
        $('#skiresortsTable tr:has(td)').find('input[type="checkbox"]:checked').each(function (i) {
            // var isChecked = $(this).prop("checked");
            // alert(i + " -ty checkbox");
            // if (i < 5) { alert(isChecked); }
            /*
            checked[i]=$(this).value();
            alert(checked[i]);
            */

            // $.each($("input[name='sport']:checked"), function () {
                checked.push($(this).val());
            // });

            // if (i < 15) { alert($(this)); }
            // if (i < 5) { alert($(this).val()); }
            
            //$.each($("input[name='sport']:checked"), function () {
                // alert($(this).val());
                // favorite.push($(this).val());
            //});
            //*/
        });
        /*
        for (k = 0; k < checked.length; k++) {
            alert(checked[k]);
        }
        */

        /*
        $('#mytable tr').each(function() {
            var customerId = $(this).find(".customerIDCell").html();    
        });
        */
        
        userData = JSON.stringify(checked);
        
        //alert("123");
        // working ajax call;
        // SKIRESORT ID HARDCODED AS OF NOW - IN PHP
        // REMOVE THE HARDCODING AND ASSIGN VALUE FROM CHECKED ROWS
        $.ajax({
            url: "AddToFavoritesScript.php",
            type: "post",
            dataType: "json",
            data: userData,
            success: function (result) {
                // alert("Your account has been successfully created. You can log in now.");
                // window.location.href = 'index.php' // neviem ci mozem pouzivat takto... ale funguje to
                // alert(result);
                // ... do something with the data...
                //alert("salala");
                // onSuccess_getFavorites(result);
                alert(result);
                // document.getElementById("resultArea").innerHTML = result;
            },
            error: function (exception) {
                // alert("exception triggered in ajax");
                alert(exception); // doriesit
            }
        });

    });

    // if checkbox in header row is unchecked when clicked, all checkboxes will become checked
    // if checkbox in header row is checked when clicked, all checkboxes will become unchecked
    $('#chkParent').click(function () {
        var isChecked = $(this).prop("checked");
        $('#skiresortsTable tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);
    });

    // checking/unchecking mechanics not fully working yet. source code from https://jqueryhouse.com/check-all-checkboxes-in-html-table-using-jquery/ not fully working // check later
    // small error in original code from the page
    $('#skiresortsTable tr:has(td)').find('input[type="checkbox"]').click(function () {
        var isChecked = $(this).prop("checked");
        var isHeaderChecked = $("#chkParent").prop("checked");
        if (isChecked == false && isHeaderChecked == true) // maybe change 2nd condition to isHeaderChecked == false
            $("#chkParent").prop('checked', isChecked);
        else {
            $('#tblData tr:has(td)').find('input[type="checkbox"]').each(function () {
                if ($(this).prop("checked") == false)
                    isChecked = false;
            });
            $("#chkParent").prop('checked', isChecked);
        }
    });
});


function onSuccess_getSkiresortData(result) {
    // teraz potrebujem parsnut ten json a vypisat niekam na frontend pekne

    alert("alert1");
    data = result;
    var table = document.getElementById('skiresortsTable').getElementsByTagName('tbody')[0];
    alert("alert2");

    // filling table with data
    for (var j = 0; j < data.length; j++) {
        row = data[j];
        // if(j<5){alert(row[row.length-1]);} 
        ID = row[row.length - 1]; // TO SAVE ID ON LOAD
        // if (j < 5) { alert(ID); }

        index = j + 1;
        string = "<tr>" + "<td>" + index + "</td>"; // for order numbers
        for (var i = 0; i < row.length; i++) {
            string = string + "<td>" + row[i] + "</td>";
        }


        string = string + "<td><input type=\"checkbox\" value=\"" + ID + "\"/></td>";
        // zakomentoval som nasledujuci riadok (funguje) - skusam nieco
        // string = string + "<td><input type=\"checkbox\"/></td>"; // appending a checkbox to the end of the row
        string = string + "</tr>";
        // string = string.replace("?", "");
        // alert(string);
        $('#skiresortsTable').find('tbody').append(string);
    }
    $("#skiresortsTable").show();

    alert("tu");
    // alert(result);
    // alert(t);

    /*
    $("#skiresortsTable").show();
    var table = $('#skiresortsTable').DataTable(); // toto nefunguje
    alert("tu 2");
    table.clear().draw();
    table.destroy();
    */
}





function onSuccess_getFavorites(result) {
    // to remove data from table before showing result set
    // OVERIT CI FUNGUJE!!!!
    /*
    var table = $("#skiresortsTable").DataTable();
    table.clear().draw();
    */

    // teraz potrebujem parsnut ten json a vypisat niekam na frontend pekne
    alert("som tu");
    // data = JSON.parse(result);
    // document.getElementById("resultArea").innerHTML = data;

    /*
    jsonArray = null;
    var t = result.data;
    jsonArray = JSON.parse(t);
    
    */

    alert("alert1");
    data = result;
    var table = document.getElementById('skiresortsTable').getElementsByTagName('tbody')[0];
    alert("alert2");

    for (var j = 0; j < data.length; j++) {
        row = data[j];
        index = j + 1;
        string = "<tr>" + "<td>" + index + "</td>"; // for order numbers
        for (var i = 0; i < row.length; i++) {
            string = string + "<td>" + row[i] + "</td>";
        }
        string = string + "<td><input type=\"checkbox\"/></td>"; // appending a checkbox to the end of the row
        string = string + "</tr>";
        // string = string.replace("?", "");
        // alert(string);
        $('#skiresortsTable').find('tbody').append(string);
    }

    $("#skiresortsTable").show();



    alert("tu");

    /*
    $("#skiresortsTable").show();
    var table = $('#skiresortsTable').DataTable(); // toto nefunguje
    alert("tu 2");
    table.clear().draw();
    table.destroy();
    */

    // $(table).find('tbody').append("<tr><td>aaaa</td></tr>");

    /*
    for (i = 0; i < t.length; i++) {
        alert(i);
    }
    */
    /*
    $.each(/*jsondata.response,*//* function (i, d) {
        var row = '<tr>';
        $.each(d, function (j, e) {
            row += '<td>' + e + '</td>';
        });
        row += '</tr>';
        $('#skiresortsTable tbody').append(row);
    });
    */

    //$("#AppConfigManagementTableScript").tmpl(jsonArray).appendTo("#AppConfigManagementTable");
}
