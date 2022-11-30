<?php
    session_start();
    
    $conn = mysqli_connect("localhost","root","","beadando");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        if(isset($_POST["fnev"]) && isset($_POST["vnev"]) && isset($_POST["knev"]) &&
            isset($_POST["email"]) && isset($_POST["pw1"]) && isset($_POST["pw2"]))
            {
                $fnev = $_POST["fnev"];
                $vnev = $_POST["vnev"];
                $knev = $_POST["knev"];
                $email = $_POST["email"];
                $pw1 = $_POST["pw1"];
                $pw2 = $_POST["pw2"];
                
                $_SESSION["fnev"] = $fnev;
                $_SESSION["vnev"] = $vnev;
                $_SESSION["knev"] = $knev;
                $_SESSION["fnev"] = $fnev; 
                $_SESSION["Email"] = $email;
                $_SESSION["pw1"] = $pw1;
                $_SESSION["pw2"] = $pw2;

                $hashpw = md5($pw1);

                $felhasznaloDb = "SELECT username FROM felhasznalok";
                $emailDb = "SELECT email FROM felhasznalok";

                $felhasznaloRequest = mysqli_query($conn,$felhasznaloDb);
                $emailRequest = mysqli_query($conn,$emailDb);

                

                if($res = $felhasznaloRequest){

                        while($row = mysqli_fetch_object($res)){
                            $username = $row->username;
                        }
                
                }

                if($resEm = $emailRequest)
                        while($rowEm = mysqli_fetch_object($resEm)){
                            $userEm = $rowEm->email;
                        }
                }

                if($username == $_POST["fnev"]){
                    echo "<script>alert('A felhasználónév már létezik, adj meg egy másikat!')</script>";
                }
                elseif($userEm == $_POST["email"]) {
                    echo "<script>alert('Ezzel az email címmel már regisztráltak, adj meg egy másikat!')</script>";
                }
                else {

                    $sql = "INSERT INTO felhasznalok (id,username,csaladi_nev,uto_nev,email,jelszo,bejelentkezes) 
                        VALUES (null,'".$fnev."','".$vnev."','".$knev."','".$email."','".$hashpw."','')";

                    $request = mysqli_query($conn,$sql);

                    if($request){
                
                        session_unset();
                        echo "<script>alert('Köszönjük a regisztrációt!')</script>";
                        header("Refresh:0");
                  
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }



    
            }
    }
    mysqli_close($conn);
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
            include_once("navbar.php");
        ?>

        <br>

        <div class="container">
            <div class="ujfelhasznalo">

                <form name="regist" method="POST" action="" onsubmit="return formEllenorzes()">
                    <div>
                        <h2>Regisztráció<h2>
                    </div>
                    <div>
                        <label class="labella">Felhasználónév:</label><br />
                        <input type="text"  class="bevitel" name="fnev" id="fnev" value="<?php if(isset ($_SESSION['fnev'])){ echo "".$_SESSION['fnev'];}?>" placeholder="Felhasználónév">
                    </div>
                    <div>
                        <label class="labella">Vezetéknév:</label><br />
                        <input type="text" class="bevitel" name="vnev" id="vnev" value="<?php if(isset ($_SESSION['vnev'])){ echo "".$_SESSION['vnev'];}?>" placeholder="Vezetéknév">
                    </div>
                    <div>
                        <label class="labella">Keresztnév:</label><br />
                        <input type="text" class="bevitel" name="knev" id="knev" value="<?php if(isset ($_SESSION['knev'])){ echo "".$_SESSION['knev'];}?>" placeholder="Keresztnév">
                    </div>
                    <div>
                        <label class="labella">E-mail cím:</label><br />
                        <input type="email" class="bevitel" name="email" id="email" value="<?php if(isset ($_SESSION['Email'])){ echo "".$_SESSION['Email'];}?>" placeholder="pl.: valami@valami.com">
                    </div>
                    <div>
                        <label class="labella">Jelszó:</label><br />
                        <input type="password" class="bevitel" name="pw1" id="pw1" value="<?php if(isset ($_SESSION['pw1'])){ echo "".$_SESSION['pw1'];}?>" placeholder="min. 6 karakter; kisbetű, nagybetű, szám">
                    </div>
                    <div>
                        <label class="labella">Jelszó újra:</label><br />
                        <input type="password" class="bevitel" name="pw2" id="pw2" value="<?php if(isset ($_SESSION['pw2'])){ echo "".$_SESSION['pw2'];}?>" placeholder="jelszó megerősítése">
                    </div>
                    <br />
                    <input type="submit" class="btn btn-success" value="Regisztrálok!">
                    <br /><br />
                    <a class="btn btn-danger" href="index.php">Mégsem!</a>
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

<script>
   
    function formEllenorzes() {
      
        let a = document.forms["regist"]["fnev"].value;
        if (a == "" || a == null) {
            alert("Felhasználónév megadása kötelező!");
            return false;
        }
     
        let b = document.forms["regist"]["vnev"].value;
        if (b == "" || b == null) {
            alert("Vezetéknév megadása kötelező!");
            return false;
        }
     
        let c = document.forms["regist"]["knev"].value;
        if (c == "" || c == null) {
            alert("Keresztnév megadása kötelező!");
            return false;
        }

     
        let d = document.forms["regist"]["email"].value;
        if (d == "" || d == null) {
            alert("Email cím megadása kötelező!");
            return false;
        }
      
        let e = document.forms["regist"]["pw1"].value;
        if (e == "" || e == null) {
            alert("Az első jelszómező nincs kitöltve");
            return false;
        }
   
        let f = document.forms["regist"]["pw2"].value;
        if(f == "" || f == null) {
            alert("A második jelszómező nincs kitöltve");
            return false;
        }
      
        if (e != f) {
            alert("A két jelszómező nem egyezik meg!");
            return false;
        }
    
        if (e.length < 6) {
            alert("A jelszónak minimum 6 karakter hosszúnak kell lennie!");
            return false;
        }

        let jelszo1 = e.match(/[a-z]/g);
        let jelszo2 = e.match(/[A-Z]/g);
        let jelszo3 = e.match(/[0-9]/g);

        if (jelszo1 == null || jelszo2 == null || jelszo3 == null) {
            alert("A jelszónak tartalmaznia kell kisbetűt, nagybetűt és számot!");
            return false;
        }
 
    }
</script>
