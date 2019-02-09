<!DOCTYPE html>
<html lang="en">
<!-- english language set - would help search engines like Google !-->

<head>
    <title>SKItalia | The perfect place for winter sport lovers!</title>

    <link href="/styles/register.css" type="text/css" rel="stylesheet">
    <script src="/libraries/jquery-1.9.1.min.js"></script>
    <!-- setting path, for jquery !-->
    <!-- <script src="/scripts/index.js"></script> <!-- setting path !-->
    <script src="/scripts/register.js"></script>
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

    <?php
    # include("header.php");
    include("database.php"); # for DB CONNECTION functions!!!!!!!! # pridane 5.2.2019 skoro poobede
    ?>

    <ul id="navigation">
        <li><a href="index.php">Home Page</a></li>
    </ul>


    <h2>Register here to gain access to all features of SKItalia!</h2>
    <p><span class="error">* required field</span></p>
    <form id="createAccForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        User name:
        <input id="name" type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br>
        <br>
        E-mail:
        <input id="email" type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br>
        <br>
        Password:
        <input id="password" type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br>
        <br>
        Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
        <br>
        <br>
        <input type="reset" value="Reset">
        <input type="submit" value="Submit">
    </form>

<?php
include("footer.php");
?>