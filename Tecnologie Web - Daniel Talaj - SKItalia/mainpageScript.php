<?php
include("database.php");
/*
# $dsn = 'mysql:dbname=talaj_web_tech_project;host=localhost; port=3308';
// Initialize variable for database credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'talaj_web_tech_project';

//Create database connection
$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
if ($dblink->connect_errno) {
printf("Failed to connect to database");
exit();
}

//Fetch 3 rows from actor table
$result = $dblink->query("SELECT * FROM skiresorts ORDER BY Total_slopes_km DESC");

//Initialize array variable
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
$dbdata[]=$row;
}

//Print array in JSON format
echo json_encode($dbdata);
 */

/*
$dbdata = array();

//Fetch into associative array
while ( $row = $result->fetch_assoc())  {
$dbdata[]=$row;
}
echo json_encode($data);
 */
/*
$data = array();
while ($row = mysql_fetch_assoc($results)) {
$data[] =utf8_encode( $row);
}
echo json_encode($data);
 */


/*
// nefunguje!!!
$db = db_connect();

$rows = $db->query("SELECT * FROM skiresorts ORDER BY Total_slopes_km DESC")->fetchAll(PDO::FETCH_ASSOC); 
$json = json_encode($rows);
// $json = json_encode(utf8_encode($rows));

$error = json_last_error();
echo $json;
 */


# fn1 - nestaci
/*
$db = db_connect();
$rows = $db->query("SELECT * FROM skiresorts ORDER BY Total_slopes_km DESC")->fetchAll(PDO::FETCH_ASSOC); 
$data = array();
foreach($rows as $row){
$data[] = utf8_encode($row);
}
echo json_encode($data);
 */

# fn2
$db = db_connect();
$rows = $db->query("SELECT Name, Region, Elevation_Difference, Elevation_MIN, Elevation_MAX, Total_slopes_km, Total_lift_count, Price_daily_skipass, ID FROM skiresorts ORDER BY Total_slopes_km DESC")->fetchAll(PDO::FETCH_ASSOC); 
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


/*
$data = array();
while ($row = mysql_fetch_assoc($results)) {
$data[] =utf8_encode( $row);
}
echo json_encode($data);
 */


/*
$input = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($input));
$json = json_decode($input);
 */

?>