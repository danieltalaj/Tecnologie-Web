<?php
include("database.php");
ensure_logged_in();
if (!isset($_SESSION)) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
<!-- english language set - would help search engines like Google !-->

<head>
    <link rel="icon" href="/images/snowflake-2910087_640.png">
    <title>SKItalia | The perfect place for winter sport lovers!</title>
    <link href="/styles/mainpage.css" type="text/css" rel="stylesheet">
    <script src="/libraries/jquery-1.9.1.min.js"></script>
    <!-- setting path, for jquery !-->
    <script src="/scripts/mainpage.js"></script>
    <!-- setting path !-->
    <!--
    
    <script src="register.js"></script>
        !-->
    <!--  !-->
    <!-- TUTO NEVIEM CI MAM NECHAT NAZOV CSS SUBORU INDEX.CSS ALEBO PREMENOVAT, KEDZE HO ZREJME BUDEM POUZIVAT NA VIACERE VECI !-->
</head>

<body>
    <h1>SKItalia</h1>
    <p>
        Welcome to SKItalia!
        The perfect place for all lovers of winter sports and Italy!
    </p>

    <!-- !-->

    <!-- SESSIONS SECTION - CHANGE  !-->

    <?php
    if (isset($_SESSION["flash"])) {
        # temporary message across page redirects
    ?>
    <div id="Div1"><?= $_SESSION["flash"] ?> </div>
    <?php
        unset($_SESSION["flash"]);
    }
    ?>

    <!-- COMMENT NAVIGATION PANEL FOR DEFAULT PAGE?? !-->
    <ul id="navigation">
        <!-- <li><a href="index.php">Home Page</a></li>!-->
        <li><a href="mainpage.php">Main Page</a></li>
    </ul>

    <h2>User Status</h2>
    <p>You are logged in as <?= $_SESSION["name"] ?>.</p>

    <form id="logout" action="logout.php" method="post">
        <input type="submit" value="Log out">
        <input type="hidden" name="logout" value="true">
    </form>

    <button id="searchSkiresortsButton" type="button">Biggest skiresorts</button>
    <button id="FavoriteSkiresortsButton" type="button">My favorite skiresorts</button>
    <button id="AddToFavoritesButton" type="button">Add selected skiresorts to favorites</button>
    <div id="resultArea">
        <table id="skiresortsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Elevation Difference</th>
                    <th>Lowest Elevation</th>
                    <th>Highest Elevation</th>
                    <th>Total slopes length (in km)</th>
                    <th>Total number of lifts</th>
                    <th>Daily ticket price (adult)</th>
                    <th>ID</th>
                    <th>
                        <input type="checkbox" id="chkParent" /></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

<?php
include("footer.php");
?>