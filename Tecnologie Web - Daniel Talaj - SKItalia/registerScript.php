<?php
include("database.php"); # for DB CONNECTION functions!!!!!!!! # pridane 5.2.2019 skoro poobede

/*
# calling the function
createAccount();

function createAccount(){
 */
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $genderErr = "";
$name = $email = $password = $gender = "";




$submitAllowed = 1; # binary value for data validation. if stays 1, submit do DB will be executed after validation. if any input is wrong, it changes to 0

# SERVER SIDE INPUT VALIDATION - REGISTRATION (CREATE NEW USER ACCOUNT - FORM SUBMIT)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "User name is required";
        $submitAllowed = 0;
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {                               // TOTO ESTE PORIADNE PREHODNOTIT, ZE AKE ZNAKY MOZU BYT POUZITE V USER NAME
            $nameErr = "Only letters, numbers and white space allowed"; 
            $submitAllowed = 0;
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $submitAllowed = 0;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $submitAllowed = 0;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $submitAllowed = 0;
    } else {
        $password = test_input($_POST["password"]);
        // check if password !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DOMYSLIET SPRAVU !!!!!!!!!!!!!!!!!!!!!!!!!!!
        /* if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
        $passwordErr = "TYPE PASSWORD ERROR IN HERE"; 
        } */
        if (strlen($_POST["password"]) < '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
            $submitAllowed = 0;
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
            $submitAllowed = 0;
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
            $submitAllowed = 0;
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            $submitAllowed = 0;
        }
    }
    
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $submitAllowed = 0;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    # SEM DOPLNIT KOD NA INSERT DO DB!!!!!!!!!!!! - PRE REGISTRACIU USERA

    
    # $servername = "localhost";
    # $username = "username";
    # $password = "password";
    # $dbname = "myDBPDO";

    # MOJ SQL KOD NA INSERT # INSERT INTO talaj_web_tech_project.users (Name, E_Mail, Password) VALUES ('Tally', 'tally@tally.com', 'abcdEFGH1') 
    # "SELECT password FROM students WHERE name = $name"

    if($submitAllowed == 1){
        try {
            # section to check
            if(checkIfUserAlreadyExists($name, $email)==TRUE){
                // INSERT CODE TO ALERT USER THAT THIS COMBINATION OF E-MAIL / WHATEVER IS ALREADY USED
            }
            # preparation for insert
            else{
                createNewAccount($name, $email, $password, $gender); # from database.php -> to create new acc
            }
        }
        catch(PDOException $e)
        {
            echo json_encode($sql . "<br>" . $e->getMessage());
        }

        $conn = null;
    }
    # handling 
    else{
        echo json_encode("Your account could not have been created due to incorrect input value." . "<br>" . "Please, try again with different values."); # UPDATE LATER
    }

    # zaciatok
    # $sql = "INSERT INTO users (username, password, email)
    # VALUES (?,?,?)"

    # Notice how the ? are used as placeholders for the values. Next you should prepare the statement using mysqli_prepare:

    # $stmt = mysqli_prepare($sql);

    # Then start binding the input variables to the prepared statement:

    # $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $_POST['password']);

    # And finally execute the prepared statements. (This is where the actual insertion takes place)

    # $stmt->execute();
    #koniec

    # pokracovanie povodneho bloku kodu
    
    
    # maybe allow adding comments???
    /*
    if (empty($_POST["comment"])) {
    $comment = "";
    } else {
    $comment = test_input($_POST["comment"]);
    }
     */        
}
/*
} # ending bracket for commented function createAccount()
 */

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>