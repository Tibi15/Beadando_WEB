<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "kepek.php");
    //header("Location: ./index.php");

    /*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beadando";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $conn->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    $sql = "SELECT email, subject, message, date, user FROM uzenet ORDER BY date desc";
    $result = $conn->query($sql);
    */
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

        <br />

        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "beadando";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $conn->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sql = "SELECT email, subject, message, date, user FROM uzenet ORDER BY date desc";
        $result = $conn->query($sql);

        $rows=$result->num_rows;

        if ($rows > 0) {
        echo "<div style='margin-left: 25%;'><table class='t_uzenet'><tr style='background-color:#8cc63f; text-align: center; justify-content: center; align-items: center;'><th>ID</th><th>Felhasználó</th><th>Email</th><th>Tárgy</th><th>Üzenet</th><th>Dátum</th></tr>";
        // output data of each row

        for ($i=0; $i<$rows; $i++) {
            $row = $result->fetch_assoc();
            if ($i%2==0) {
                echo "<tr style='color:aliceblue;'><td>".($i+1)."</td><td>".$row["user"]."</td><td>".$row["email"]."</td><td>".$row["subject"]."</td><td>".$row["message"]."</td><td>".$row["date"]."</td></tr>";
            } 
            else{
                echo "<tr style='color:aliceblue;'><td>".($i+1)."</td><td>".$row["user"]."</td><td>".$row["email"]."</td><td>".$row["subject"]."</td><td>".$row["message"]."</td><td>".$row["date"]."</td></tr>";
            }
        }
        
        echo "</table></div>";
        } 
        else {
        echo "<h1>Nincsenek üzenetek.</h1>";
        }

        $conn->close();
        ?>

        <br />
        <br />

        <div class="ujfelhasznalo">
            <a class="btn btn-success" href="email.php">Vissza az üzenetekhez</a>
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