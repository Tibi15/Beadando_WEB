<?php 
    class NavLink
    {
        public $nev;
        public $uri;

        function __construct($nev,$uri)
        {
            $this->nev = $nev;
            $this->uri = $uri;
        }
    }

    $linkek = [];
    $linkekInfo = 
    [
        ["Főoldal","index.php"], 
        ["Képek","kepek.php"],
        ["Email","email.php"],
        ["Táblázat","tablazat.php"],
        ["Regisztráció","regisztracio.php"],
        ["Belépés","belepes.php"],
    ];
    
    foreach($linkekInfo as $nevLinkPar)
    {
        $navlink = new NavLink($nevLinkPar[0],$nevLinkPar[1]);
        array_push($linkek,$navlink);
    }

    
?>



<nav class="nav navbar navbar-expand-sm bg-dark navbar-dark justify-content-center sticky-top">
    <ul class="nav navbar nav-justified">
        <?php
        foreach($linkek as $link)
        {
            $aktiv = strpos($_SERVER["REQUEST_URI"], $link->uri) ? "active text-light" : ""; 

            echo "<li class='nav-item'>
                    <a class='nav-link text-center $aktiv' href=$link->uri> $link->nev </a>
                </li>";
        }
        ?>
    </ul>
</nav>
