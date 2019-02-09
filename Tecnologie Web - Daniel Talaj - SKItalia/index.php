<?php
    include("header.php");
?>


<!-- NAPAD NA TALIANSKU VLAJKU V POZADI - LAVY PANEL ZELENY, PRAVY PANEL CERVENY, STRED BIELY - SPOLU TO MOZE PEKNE VYZERAT
<div class="container">
  <div class="side red">
  </div>
  <div class="center">
    <p>Please Pardon our progress.<p>

      <h1>Italy's Pizzeria</h1>



    <p>Find us on FaceBook.</p> 
    <p>Check back soon for updates.</p>
    
    <address>
1000 Whitlock Ave, STE 110 
    </address>
     <p>
      <a href="tel:1-678-384-2142">1-678.384.2142 </a> 
    </p>

      

    <h2>Hours</h2>
      <p>
        Monday-Thursday 11 AM - 10 PM<br />
        Friday, Saturday 11 AM - 11 PM<br />
        Sunday 11 AM - 10 PM<br />
      </p>
  </div>
  <div class="side green">
  </div>
</div>
!-->


<!-- COMMENT NAVIGATION PANEL FOR DEFAULT PAGE?? !-->
<!--
<ul id="navigation">
    <li><a href="mainpage.php">Main Page</a></li>
    <li>Regions</li>
    <li>Skiresorts</li>
    <li>Log In/Out</li>
</ul>
    !-->

<p> Only with your own personal account, you can enjoy all special features of SKItalia.</p>
<p> Please, log in to continue browsing the page.</p>
    <!-- VYMYSLIET NEJAKY SLOGAN ALEBO CO 
        
        - ZE ABY SME POUZIVATELOM PRINIESLI CO NAJLEPSI ZAZITOK 
        Z PREHLIADANIA STRANKY MUSI MAT KAZDY POUZIVATEL VYTVORENE 
        VLASTNE KONTO A BYT PRIHLASENY


        !-->

<?php
if (isset($_SESSION["flash"])) {
    # temporary message across page redirects
?>
<div id="flash"><?= $_SESSION["flash"] ?> </div>
<?php
    unset($_SESSION["flash"]);
}
?>

<h2>Log in</h2>
<form id="LoginForm" action="login.php" method="post">
    <dl>
        <dt>Name</dt>
        <dd>
            <input type="text" name="name"></dd>
        <dt>Password</dt>
        <dd>
            <input type="password" name="password"></dd>
        <dt></dt>
        <dd>
            <input type="submit" value="Log in"></dd>
    </dl>
</form>
<p>
    You do not have an account yet?
    <a href="register.php">Register here!</a>
</p>

<?php 
    include("footer.php");
?>