<?php
    session_start();

    //$_SESSION["isCheck"] = true;
    //$_SESSION["utvonal"] = strpos($_SERVER["REQUEST_URI"], "fooldal.php");
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
        <link rel="stylesheet" href="./css/style.css">
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
        

        <div class="clearfix">
            <p>
                Sok embertársunk űz valamilyen sportot, a horgászatról, mint sportról is lehet beszélni. <br>
                Eme sportot kedvelőknek szeretnénk egy pár hasznos tippelk szolgálni.
            </p>

            <p>
                Megkülönböztetünk nemes és rablóhalas horgászatot is. <br>
               A kát fajta halra történő vadászás nem ugyanaz.
            </p>

            <p>
               Ezen kívül lehetősgéünk van úszós és fenekezős készséggel is halat fogni <br>
            <br>
                Embere válogatja, hogy éppen milyen haltípusra és készésggel szeret/akar horgászni.
            </p>

            <div class="img-fluid float-end rounded mainImg">
            
                <iframe width="540" height="315" src="https://www.youtube.com/embed/y8wvvStWCPU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p>
                Az úszos készségnél fontos az előke hossza, a súly mérete és az úszó fajtája is.
            </p>

            <p>
                Fenekezős készségnél válasuzthatunk 1 vagy 2 horgos módszert is.
                Itt uygancsak fontos az előke hossza, a kosár mérete és fajtája.
            </p>
            <p>
                Évszakos különbségek is vannak. <br>
                Főleg nyári és téli horgászatot különböztetünk meg. <br>
                A csalit és etetőanyagot kell a két évszakban megválogatni. <br>
            </p>

            <div class="img-fluid float-start rounded mainImg">

                <video width="540" height="315" controls>
                    <source src="./galeria/horgaszvideo.mp4" type="video/mp4">
                </video>
                
            </div>

            <p>
                A lap alján található egy horgászcikk webáruház linkje.<br>
                Itt szinte minden megtalálható, mi szem szájnak ingere egy horgász számára.
            </p>
            <br />
            <p>
               Ezen weboldalon lehetőségünk van egymásnak is hasznos tippelet adni, üzeneteket küldeni!
               Reméljük hasznos dolgokkal tudunk szolgálni, tudjuk egymástz is segíteni különböző tippekkel, tapasztalatokkal!<br>
               Kellemes böngészét, időtöltést!
            </p>
        </div>


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