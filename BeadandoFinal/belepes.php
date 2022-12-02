<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "kepek.php");
    //header("Location: ./index.php");
    
    //include_once "Felhasznalo.php";
    //include_once "CallApi_2.php";

    $conn = mysqli_connect("localhost","root","","beadando");
    
    $belepve = null;
    $_SESSION["belepve"] = null;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["email"]) && !empty($_POST["email"]) &&
            isset($_POST["pw1"]) && !empty($_POST["pw1"]))
            {
                $email = $_POST["email"];
                $pw1 = $_POST["pw1"];
                $hashpw = md5($pw1);

                // email cím lekérdezése
                $emailDb = "SELECT email FROM felhasznalok";
                $emailRequest = mysqli_query($conn,$emailDb);

                // jelszó lekérdezése
                $passwordDb = "SELECT jelszo FROM felhasznalok";
                $passwordRequest = mysqli_query($conn,$passwordDb);

                // email címek eltárolása tömbben
                if($resEm = $emailRequest){
                    $userEm = [];
                    while($rowEm = mysqli_fetch_object($resEm)){
                        array_push($userEm, $rowEm->email);
                    }
                }

                // jelszavak eltárolása tömbben
                if($resPassw = $passwordRequest){
                    $userPassw = [];
                    while($rowPassw = mysqli_fetch_object($resPassw)){
                        array_push($userPassw, $rowPassw->jelszo);
                    }
                }

                // megnézzük, hogy a beírt email cím egyezik-e a tömbben lévők valamelyikével
                for($i = 0; $i < count($userEm); $i++){
                    if($userEm[$i] == $_POST["email"]){
                        $e = $userEm[$i];
                    }
                }

                // megnézzük, hogy a beírt jelszó egyezik-e a tömbben lévők valamelyikével
                for($i = 0; $i < count($userPassw); $i++){
                    if($userPassw[$i] == $hashpw){
                        $p = $userPassw[$i];
                    }
                }

                // ha megegyeznek a tárolt email címek és jelszavak a beírt email címekkel és jelszavakkal, akkor beléptetjük a felhasználót
                if($e == $_POST["email"] && $p == $hashpw){
                    $_SESSION["belepve"] = true;
                    echo "<script>alert('Köszöntjük weboldalunkon!')</script><br />";
                }
                else{
                    echo "<script>alert('Hibás email cím, vagy jelszó!')</script>";
                }

            }
            else {
                echo "<script>alert('Hiányzó email cím, vagy jelszó!')</script>";
            }
    }  
?>


<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Horgászat</title>
    </head>

    <body class="container bg-dark">
        
        <header>
            <img class="row" id="headerimage_carussel" src="./galeria/Tahoe.jpg" alt="">

            <div class="jumbotron jumbotron-fluid bg-dark">
                <div class="text-center text-light bg-dark p-5 display-2">Horgászat</div>
            </div>
        </header>

        <?php
            if(isset($_SESSION["belepve"]) && $_SESSION["belepve"] == true)
            {
                echo '<h3>Üdv ' . $veznev . ' ' . $utonev . '</h3>';
            }
        ?>
            
        <?php
            include_once("navbar.php");
        ?>

        <br />

        <div class="container">
            <div class="ujfelhasznalo">
                <form method = "POST" action="" >
                    <div>
                        <h2>Belépés</h2> <!--<label class="labella">Regisztráció</label><br />-->
                    </div>
                    
                    <div>
                        <label class="labella">E-mail cím:</label><br />
                        <input type="email" class="bevitel" name="email" id="email" placeholder="Email cím">
                    </div>
                    <div>
                        <label class="labella">Jelszó:</label><br />
                        <input type="password" class="bevitel" name="pw1" id="pw1" placeholder="Jelszó">
                    </div>
                    <br />
                    <input type="submit" class="btn btn-success" value="Belépek!">
                    <br />
                    <br />
                    <a class="btn btn-primary" href="regisztracio.php">Regisztrálok!</a>
                </form>
            <br />
            </div>
        </div>

        <br />




        <footer class="page-footer text-center wow fadeIn">
            <div class="py-5 bg-dark">
                <span class="footer-copyright text-secondary center" id="copyright">© 2022 Copyright:</span>
                <span class="text-secondary center">Horgászat</span>
                <span class="text-secondary center"><a href="https://www.xfish.hu/" target="_blank" id="xfish" style="margin-left: 15px; color: grey;">X fish</a></span>
            </div>
        </footer>

        <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
        <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    </body>
</html>

