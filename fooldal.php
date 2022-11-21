<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/beadando/php/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>WEB Programozás beadandó feladat</title>
        <style>
            li {
                display:inline-block;
            }
            a {
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            #menu{
                display: inline-block; list-style-type: none;
            }
        </style>
    </head>
    <body>
        <div>
            <div id="menu">
                    <ul>
                        <li>
                            <a href="/beadando/php/fooldal.php">Főoldal</a>
                        </li>
                        <li>
                            <a href="/beadando/php/regisztracio.php">Regisztráció</a>
                        </li>
                        <li>
                            <a href="/beadando/php/galeria.php">Galéria</a>
                        </li>
                        <li>
                            <a href="/beadando/php/tablazat.php">Táblázat</a>
                        </li>
                        <li>
                            <a href="/beadando/php/email.php">E-mail</a>
                        </li>
                    </ul>
                <h1>Horgászat</h1>
            </div>
             <h2>Tippek a hidegvizes horgászathoz</h2>
             <p>Más módon és eszközöket kell használni az eredményes halfogáshoz az évszakoknak megfelelően.</p>
        </div>

       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>