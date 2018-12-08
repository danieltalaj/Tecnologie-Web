window.onload = function () {
    /*
    var emptyX = 4; // mozno ma byt 3
    var emptyY = 4; // mozno ma byt 3
    var emptyOffsetX = "-300px"; // mozno bez pomlcky / zliepat stringy
    var emptyOffsetY = "-300px"; // mozno bez pomlcky / zliepat stringy
    */

    var emptySquare = {
        emptyX: 4,              // mozno ma byt 3
        emptyY: 4,              // mozno ma byt 3
        emptyOffsetX: "-300px", // mozno bez pomlcky / zliepat stringy
        emptyOffsetY: "-300px"  // mozno bez pomlcky / zliepat stringy
    }
    var idOfDivToBeSwapped = 11; // posledny v tretom riadku nateraz

    set_background();
    create_div_for_empty();
    swap_position(emptySquare, idOfDivToBeSwapped);
}

function swap_position(emptySquare, occupiedSquareID) {
    var squares = document.querySelectorAll("#puzzlearea > div");// accessing all divs inside puzzlearea, storing them in an array
    var positionOfEmpty = (emptySquare.emptyY - 1) * 4 + emptySquare.emptyX - 1;
    // alert(positionOfEmpty);
    var square1 = squares[positionOfEmpty];
    // alert(emptyDiv);
    var square2 = squares[occupiedSquareID];
    var help = square1;
    var square2 = emptyDiv;


}

// fully working // do not edit
function set_background(){
    var squares = document.querySelectorAll("#puzzlearea > div");// accessing all divs inside puzzlearea, storing them in an array
    var x = 0;
    var y = 0;
    var a = 0;
    for (i = 0; i < 4; i++) {
        x = 0; // to reset x coordinate before starting next row
        for (j = 0; j < 4; j++) {
            if (a != 15) {
                squares[a].style.backgroundImage = "url('background.jpg')";
                squares[a].style.backgroundPositionX = x + "px";
                squares[a].style.backgroundPositionY = y + "px";
            }
            x = x - 100;
            a++;
        }
        y = y - 100;
    }
}

// takto by sa to nemalo robit - to odporucaju
// edit: profesor je s tym uplne ok
function create_div_for_empty() {
    var div = document.createElement('div');
    div.style.width = "100px";
    div.style.height = "100px";
    div.style.backgroundColor = "white";
    div.style.border = "hidden";
    document.getElementById("puzzlearea").appendChild(div);
}