<!-- HERE I WOULD LIKE TO ADD HEADER THAT IS THE SAME FOR ALL PAGES (LOGIN PAGE + MAIN PAGE AS OF NOW) !-->
<!-- !-->

<?php
if (!isset($_SESSION)) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en"> <!-- english language set - would help search engines like Google !-->

<head>
    <link rel="icon" href="/images/snowflake-2910087_640.png">
    <title>SKItalia | The perfect place for winter sport lovers!</title>
    <link href="/styles/index.css" type="text/css" rel="stylesheet">
    <script src="/libraries/jquery-1.9.1.min.js"></script> <!-- setting path, for jquery !-->
    <script src="/scripts/index.js"></script> <!-- setting path !-->
    <script src="/scripts/mainpage.js"></script> <!-- setting path !-->
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