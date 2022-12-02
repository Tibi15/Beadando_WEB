<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "kepek.php");
    //header("Location: ./index.php");
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
                <div>
                    <!-- <h2>Kedves <?php echo $_SESSION['Felhasznalonev']?>!</h2> -->
                    <h3>Előzőleg elküldött üzenetek:</h3>
                </div>
            </div>

            <br/>

            <div class="ujfelhasznalo">

                <table class="table table-dark table-striped">

                    <thead >
                        <tr>
                            <th>Időpont</th>
                            <th>Felhasználónév</th>
                            <th>Vezetéknév</th>
                            <th>Keresztnév</th>
                            <th>Üzenet</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php   
                            $sor = 0;
                            while($sor < count($foglalasdecod)) //ciklus a dekódolt eredmény végéig
                            {
                                //A db-ből kapott időpontok átalakítása a megjelenítéshez
                                $fogdate=date_create($foglalasdecod[$sor]->{"Foglalasido"});
                                $leaddate = date_create($foglalasdecod[$sor]->{"Leadva"});
                                echo
                                "<tr>
                                    <td>".$foglalasdecod[$sor]->{"Fazon"}."</td>    
                                    <td>".$foglalasdecod[$sor]->{"Szemelydb"}."</td>
                                    <td>".date_format($fogdate,"Y.m.d H:i:s")."</td>
                                    <td>".date_format($leaddate,"Y.m.d H:i:s")."</td>
                                    <td>
                                        <form method='POST' onsubmit='return megerosites()'>
                                        <input type='text' name='fazon' id='fazon' style='display: none;' value=".$foglalasdecod[$sor]->{"Fazon"}.">";
                                        if ($foglalasdecod[$sor]->{"Megjelent"} == false){
                                            echo"<input type='submit' class='btn btn-danger' value='Törlés'>";
                                        }
                                        else{
                                            echo"<input type='submit' class='btn btn-danger' value='Törlés' disabled>";
                                        }
                                        echo"</form>
                                    </td>
                                </tr>";
                                $sor++;
                            }
                        ?>
                    </tbody>

                </table>
            </div>

            <br />
            <br />

            <div class="ujfelhasznalo">
                <a class="btn btn-success" href="email.php">Vissza a főoldalra</a>
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