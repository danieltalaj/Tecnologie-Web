<?php
/*
########################################################################
# DANIEL TALAJ - PROJECT - FILE DATABASE - FUNCTIONS FOR DB CONNECTIVITY
########################################################################
 */

if (!isset($_SESSION)) { session_start(); }

# MS SQL SERVER CONNECTIVITY CODE - START ### CURRENTLY UNUSED ###
function db_connect_sql_server() {
    $serverName = "serverName\\sqlexpress"; //serverName\instanceName

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"dbName");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
        echo "Connection established.<br />";
    }
    else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
}
# MS SQL SERVER CONNECTIVITY CODE - END   ### CURRENTLY UNUSED ###



#todo # DOROBIT AKO PRVE RANO STVRTOK 7.2.

function checkIfUserAlreadyExists($name, $email){

    # for checking if name/email are used
    $exists = FALSE;

    # having 2 variables - original (name,email) and quoted(nameQ,emailQ)
    # i needed to keep original variables too, to compare easily
    $db = db_connect();
    $nameQ = $db->quote($name);
    $emailQ = $db->quote($email);
    $rows = $db->query("SELECT name, E_mail FROM USERS WHERE name = $nameQ OR E_mail = $emailQ");
    if ($rows) {
        foreach ($rows as $row) {
            if($name == $row["name"]){
                echo "Username $name is already used. Choose another name please!";
                $exists = TRUE;
                # continue; # mozno budem potrebovat, mozno nie
            }
            elseif($email == $row["E_mail"]){
                echo "This e-mail address ($email) is already used. Sign up with another e-mail address please!";
                $exists = TRUE;
                # continue; # mozno budem potrebovat, mozno nie
            }
        }
        return $exists;
    } else {
        return FALSE;   # user not found -> # account with specified values CAN BE CREATED
    }
    /*
    if (password_check($name, $password)) {
    if (isset($_SESSION)) {
    session_regenerate_id(TRUE);
    }
    # $_SESSION["name"] = $name;     # start session, remember user info
    # echo "Login successful! Welcome!";
    # redirect("index.php", "Login successful! Welcome to SKItaly!"); # if success -> move to main page
    redirect("mainpage.php", "Login successful! Welcome to SKItaly!");
    } else {
    // echo "Incorrect user name and/or password.";
    # redirect("mainpage.php", "Incorrect user name and/or password.");
    redirect("index.php", "Login not successful! Incorrect user name and/or password."); # if not success -> stay on login page
    }
     */
}

function createNewAccount($name, $email, $password, $gender){
    
    try{
        # $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn = db_connect(); # pripojenie na moju DB
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        # $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        # VALUES ('John', 'Doe', 'john@example.com')";

        $password_hash = password_hash_custom($password);
        $genderDB = NULL;
        # echo '<script type="text/javascript">alert("'.$gender.'");</script>'; # for debugging
        if($gender=="female"){
            $genderDB = "F";
        }
        else if($gender=="male"){
            $genderDB = "M";
        }
        else if($gender=="other"){
            $genderDB = "O";
        }

        # 6.2.2019 - 23:11 - FOLLOWING SECTION NOT WORKING - INPUT IS INVALID WHEN ATTEMPTED TO INSERT INTO DB
        # COMMENTED OUT!!!

        # handling INSERT statement input data - quote() method escapes any illegal chars and surrounds the value with ' quotes
        # source: http://www.webstepbook.com/supplements-2ed/slides/chapter13-databases-sql.shtml#slide56
        
        # try next line if $conn->quote(...); does not work
        # $name = $db->quote($title);

        /*
        $name = $conn->quote($name);
        $email = $conn->quote($email);
        $password_hash = $conn->quote($password_hash);
        $genderDB = $conn->quote($genderDB);
         */

        $sql = "INSERT INTO talaj_web_tech_project.users (Name, E_mail, Password, Gender)
                VALUES ('$name', '$email', '$password_hash', '$genderDB')";
        

        # kod na prepared statement - MOZNO POUZIT

        # pridane zaciatok
        # $sql = "INSERT INTO talaj_web_tech_project.users (Name, E_mail, Password)
        # VALUES (?,?,?)";
        # $stmt = mysqli_prepare($sql);
        
        # $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $_POST['password']);


        # $stmt->execute();
        # pridane koniec

        // use exec() because no results are returned
        $conn->exec($sql);
        echo json_encode("Your account was created successfully." . "<br>" . "You can log in with your credentials.");
    }
    catch (Exception $e) {
        echo json_encode("Your account could not have been created. Please, try again."); # OVERIT CI FUNGUJE
        # echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

// function addToFavorites($IDUser, $IDSkiresort){      # povodne
function addToFavorites($UserName, $IDSkiresort){    
    # na zaklade ID usera a skiresortu vytvorim zaznam v tabulke

    

    try{
        # $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn = db_connect(); # pripojenie na moju DB
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        # $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        # VALUES ('John', 'Doe', 'john@example.com')";

        # 6.2.2019 - 23:11 - FOLLOWING SECTION NOT WORKING - INPUT IS INVALID WHEN ATTEMPTED TO INSERT INTO DB
        # COMMENTED OUT!!!

        # handling INSERT statement input data - quote() method escapes any illegal chars and surrounds the value with ' quotes
        # source: http://www.webstepbook.com/supplements-2ed/slides/chapter13-databases-sql.shtml#slide56
        
        # try next line if $conn->quote(...); does not work
        # $name = $db->quote($title);

        # TO PREVENT SQL INJECTION
        /*
        $IDUser = $conn->quote($IDUser);
        $IDSkiresort = $conn->quote($IDSkiresort);
         */

        $UserID=0; // DORIESIT

        $UserName = $conn->quote($UserName);
        $rows = $conn->query("SELECT ID FROM USERS WHERE Name = $UserName");
        if ($rows) {
            foreach ($rows as $row) {
                $UserID = $row["ID"];
            }
        }
        else{
            $UserID=NULL;
        }


        $UserID = $conn->quote($UserID);
        $IDSkiresort = $conn->quote($IDSkiresort);



        $sql = "INSERT INTO talaj_web_tech_project.users_skiresorts (ID_USER, ID_SKIRESORT)
                VALUES ($UserID, $IDSkiresort)";

        # kod na prepared statement - MOZNO POUZIT

        # pridane zaciatok
        # $sql = "INSERT INTO talaj_web_tech_project.users (Name, E_mail, Password)
        # VALUES (?,?,?)";
        # $stmt = mysqli_prepare($sql);
        
        # $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $_POST['password']);


        # $stmt->execute();
        # pridane koniec

        // use exec() because no results are returned
        $conn->exec($sql);
        // echo json_encode("Selected skiresort has been added to favorites.");
    }
    catch (Exception $e) {
        echo json_encode("There was a problem with your request, selected skiresort could not have been added to favorites."); # OVERIT CI FUNGUJE
        # echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}




# return the pointer to connected db, change your connection attributes only here
function db_connect() {
	$dsn = 'mysql:dbname=talaj_web_tech_project;host=localhost; port=3308'; # POZOR!!!!!!!!!!!!!!!!!!!!! V PONDELOK 4.2.2019 SOM SEM RUCNE FIXNE PRIDAL PORT, LEBO MI TO BLBLO
    return new PDO($dsn, 'root', '');
}

# HASH FUNCTION - ENCRYPTING PASSWORD -> PASSWORD NOT VISIBLE IN DB
function password_hash_custom($password){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function password_check($name, $password){
    $passwordHash = NULL;
    $db = db_connect();
    $name = $db->quote($name);
    $rows = $db->query("SELECT password FROM USERS WHERE name = $name");
    if ($rows) {
        foreach ($rows as $row) {
            $passwordHash = $row["password"];
            break;
        }
    } else {
        return FALSE;   # user not found
    }

    if (password_verify($password, $passwordHash)) {
        # echo 'Password is valid!';
        return TRUE;
    } else {
        # echo 'Invalid password.';
        return FALSE;
    }
}


# Returns TRUE if given password is correct password for this user name.
function is_password_correct($name, $password) {
	
    $db = db_connect();
    $name = $db->quote($name);
    $rows = $db->query("SELECT password FROM USERS WHERE name = $name");
    if ($rows) {
        foreach ($rows as $row) {
            $correct_password = $row["password"];
            return $password === $correct_password;
        }
        return FALSE; # PRIDANE 8.2. 13:54 - MOZNO ZMAZAT
    } else {
        return FALSE;   # user not found
    }
}


# pridane 7.2.2019 # POUZIT VSADE, KDE TREBA - NECH SA USER NEMOZE DOSTAT NA INE STRANKY AKO INDEX.PHP A REGISTER.PHP POKIAL NIE JE LOGNUTY
# Redirects current page to login.php if user is not logged in.
function ensure_logged_in() {
    if (!isset($_SESSION["name"])) {
        redirect("index.php", "You have to log in before you can use SKItalia."); # redirect na prvu stranku s loginom
    }
}

# Redirects current page to the given URL and optionally sets flash message.
function redirect($url, $flash_message/* = NULL*/) {
    if ($flash_message) {
        $_SESSION["flash"] = $flash_message;
    }
    # session_write_close();
    header("Location: $url");
    die;
}

# Returns all skiresorts, ordered by total slopes length in km, descending (starting with biggest resort) as an associative array.
function getSkiresortsBySize() {
    $dataArray[]=NULL;
    $db = db_connect();
    $rows = $db->query("SELECT * FROM skiresorts ORDER BY Total_slopes_km DESC");
    
    foreach($rows as $row){
        $dataArray[]=$row;
    }
    return $dataArray;

    /*
    $db = db_connect();
    $rows = $db->query("SELECT * FROM skiresorts ORDER BY Total_slopes_km DESC")->fetchAll(PDO::FETCH_ASSOC); 
    //Initialize array variable
    /*
    $dbdata = array();
    foreach($rows as $row){
    $dbdata[$row]=$row;
    }
    
    $json = json_encode($dbdata);
    return $json;
     */
    // header("content-type:application/json");
    //return $rows;
}


function getFavoriteSkiresorts($UserName) {

    # odlozena funkcna query
    # "SELECT T1.* FROM skiresorts AS T1 LEFT JOIN users_skiresorts AS T2 ON T1.ID = T2.ID_SKIRESORT WHERE T2.ID_USER = 41 ORDER BY T1.ID"

    $db = db_connect();
    $UserName = $db->quote($UserName);

    $UserID=0; // DORIESIT

    $rows = $db->query("SELECT ID FROM USERS WHERE Name = $UserName");
    if ($rows) {
        foreach ($rows as $row) {
            $UserID = $row["ID"];
        }
    }
    else{
        $UserID=NULL;
    }


    $UserID = $db->quote($UserID);
    $rows = $db->query("SELECT DISTINCT T1.Name, T1.Region, T1.Elevation_Difference, T1.Elevation_MIN, T1.Elevation_MAX, T1.Total_slopes_km, T1.Total_lift_count, T1.Price_daily_skipass, T1.ID FROM skiresorts AS T1 LEFT JOIN users_skiresorts AS T2 ON T1.ID = T2.ID_SKIRESORT WHERE T2.ID_USER = $UserID ORDER BY T1.ID")->fetchAll(PDO::FETCH_ASSOC);
    
    // SELECT T1.* FROM skiresorts AS T1 LEFT JOIN users_skiresorts AS T2 ON T1.ID = T2.ID_SKIRESORT WHERE T2.ID_USER = 41 ORDER BY T1.ID 

    $data = array();
    # encoding data to utf8 - to enable json_encode later
    foreach($rows as $row){
        $one_row=array();
        foreach($row as $item){
            $one_row[]=utf8_encode($item);
            // $one_row[] = $item;
        }
        $data[] = $one_row;
    }
    $result = json_encode($data);
    echo $result;
}



# Returns all skiresorts, ordered by total slopes length in km, descending (starting with biggest resort) as an associative array.
function getSkiresortsMaxElevation() {
    $db = db_connect();
    return $db->query("SELECT * FROM skiresorts ORDER BY Elevation_MAX DESC");
}

function findSkiresort($name){
    $db = db_connect();
    $name = $db->quote($name);
    return $db->query("SELECT * FROM skiresorts WHERE Name LIKE (\"%$name%\")");
}

function getSkiresortsByRegion($region){
    $db = db_connect();
    $region = $db->quote($region);
    return $db->query("SELECT * FROM skiresorts WHERE Region = \"$region\"");
}

/*
 * UNFINISHED FUNCTION # TEMPORARILY COMMENTED
function fullTextSearch($request){
$db = db_connect();
$request = $db->quote($request);
return $db->query("SELECT * FROM skiresorts WHERE
Region LIKE (\"%$request%\")");
}
 */

?>
