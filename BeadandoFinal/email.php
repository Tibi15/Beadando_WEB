<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "kepek.php");
    //header("Location: ./index.php");


    /*
    $subject_ok= true;
    //$email_ok= true;
    $message_ok= true;


    if(!isset($_POST['subject']) || strlen($_POST['subject']) < 3)
    {
        $uzenet="A tárgy hibás próbálja újra!";
        $subject_ok= false;
    }

    
    $re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
    {
        $uzenet="Az e-mail hibás próbálja újra!";
        $email_ok = false;
    }
    

    if(!isset($_POST['message']) || empty($_POST['message']))
    {
        $uzenet="Az üzenet mező hibás próbálja újra!";
        $message_ok = false;
    }

    if (isset($_POST['subject'])&&isset($_POST['message'])) {
        //$email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (isset($_SESSION['login'])) {
            $user = $_SESSION['login'];
        } 
        else {
            $user = "Vendég";
        }


        if ($message_ok==true&&$subject_ok==true) {

            try {
                $dbh = new PDO('mysql:host=localhost;dbname=beadando', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                
                $sqlInsert = "insert into uzenet(subject, message, user) values(:subject, :message, :user)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':subject' => $_POST['subject'],':message' => $_POST['message'],':user' => $user)); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "Az üzenet elküldése sikerült.";                 
                    $ujra = false;
                }
                
                else{
                    $uzenet="Az üzenetet nem sikerült elküldeni";
                    $ujra = true;
                }
            }
            catch (PDOException $e) {
                $uzenet = "Hiba: ".$e->getMessage();
                $ujra = true;
            }  
        }
        else {
            $uzenet="Az üzenetet nem sikerült elküldeni";
            $ujra = true;
        }
            

        }
    else{
            //header("Location:/beadando/email.php");
    }
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

        <div class="container">
            <div class="ujfelhasznalo">
                <form method = "POST" action="uzenet.php" >

                    <table>
                        <tr>
                            <td><p style="margin: 5px; padding: 5px; float: right;">Felhasználónév:</p></td>
                            <td><p style="margin: 5px; padding: 5px; float: left;"></p></td>
                        </tr>
                        <tr>
                            <td><p style="margin: 5px; padding: 5px; float: right;">Név:</p></td>
                            <td><p style="margin: 5px; padding: 5px; float: left;"></p></td>
                        </tr>
                        <tr>
                            <td><p style="margin: 5px; padding: 5px; float: right;">Email:</p></td>
                            <td><p style="margin: 5px; padding: 5px; float: left;"></p></td>
                        </tr>
                    </table>
                    
                    

                    <div style="margin-top: 20px;">
                        <h2>Email</h2> <!--<label class="labella">Regisztráció</label><br />-->
                    </div>

                    <div>
                        <p><span>Tárgy:</span><span><input type="text" name="subject" id="subject"></span></p>
                    </div>
                    
                    <div>
                        <label for="message" class="labella" style="margin: 10px;">Üzenet:</label><br />
                        
                    </div>

                    <textarea id="message" name="message" rows="6" cols="50" placeholder="Írj üzenetet!"></textarea>
                    <!-- <input type="email" class="bevitel" name="uzenet" id="uzenet" placeholder="Írj üzenetet!"> -->

                    <br />
                    <a href="uzenet.php" target="_blank">
                        <input type="submit" formtarget="_blank" class="btn btn-primary" style="margin: 10px;" value="Elküld!">
                        <!-- <input type="button" class="btn btn-primary" style="margin: 10px;" value="Elküld!"> -->
                    </a>
                    
                    <br />
                    <br />
                    <!-- <a class="btn btn-primary" href="regisztracio.php">Regisztrálok!</a> -->
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