<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "kepek.php");
    //header("Location: ./index.php");

    $MAPPA = './kepek/';
    $TIPUSOK = array ('.jpg', '.png');
    $MEDIATIPUSOK = array('image/jpeg', 'image/png');
    $DATUMFORMA = "Y.m.d. H:i";
    $MAXMERET = 1000000000000000000000000*1000000000000000000000000;


    $uzenet = array();   

    if(isset($_SESSION['login'])){

        if (isset($_POST['kuld'])) {
        
            $fajlok = $_FILES["fajlok"];
            for($i = 0; $i < count($fajlok["name"]); $i++) {
                if ($fajlok['error'][$i] == 4)    
                    $uzenet[] = "Nem töltött fel fájlt";
                elseif ($fajlok['error'][$i] == 1   
                            or $fajlok['error'][$i] == 2  
                            or $fajlok['size'][$i] > $MAXMERET) 
                    $uzenet[] = " Túl nagy állomány: " . $fajlok['name'][$i];
                elseif (!in_array($fajlok['type'][$i], $MEDIATIPUSOK))
                    $uzenet[] = " Nem megfelelő típus: " . $fajlok['name'][$i];
                else {
                    $vegsohely = $MAPPA.strtolower($fajlok['name'][$i]);
                    if (file_exists($vegsohely))
                        $uzenet[] = " Már létezik: " . $fajlok['name'][$i];
                    else {
                        move_uploaded_file($fajlok['tmp_name'][$i], $vegsohely);
                        $uzenet[] = ' Sikeres fajl feltöltés: ' . $fajlok['name'][$i];
                    }
                }
            }        
        }
    }
    else{
        $uzenet[] = 'Feltőltés csak bejelentkezés után lehetséges.';
    }
       
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

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

        <!--
        <div>
            <p style="float: left;">Képfeltöltés:</p>
            <label for="myfile">Select a file:</label>
            <input type="file" id="myfile" name="myfile"  style="margin: 2rem; padding-top: 1rem; padding-bottom: 1rem;">
        </div>
        -->

        <form id="kapcsolat" action="#" method="post" enctype="multipart/form-data">

            <input  type="hidden" name="max_file_size" value="110000">

            <p>
                <label for="file-upload" class="custom-file-upload">Fájlok kiválasztása
                    <input  id="file-upload" type="file" name="fajlok[]" accept="image/png, image/jpeg" multiple required>
                </label>
                <input class="btn2" type="submit" name="kuld">
            </p>

        </form>

        <?php
            if (!empty($uzenet))
            {
                echo '<ul style="color: white; list-style-type: none;">';
                foreach($uzenet as $u)
                    echo "<li>$u</li>";
                echo '</ul>';
            }
        ?>

        <?php
            arsort($kepek);
            foreach($kepek as $fajl => $datum)
            {
        ?>
            <div class="kep">
                <a href="<?php echo $MAPPA.$fajl ?>" target="_blank">
                    <img src="<?php echo $MAPPA.$fajl ?>" style="width: 300px; height: 300px;">
                </a>            
            </div>
            <br>
        <?php
            }
        ?>
        
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