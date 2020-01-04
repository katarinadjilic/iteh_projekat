<div class="col-xs-10 text-right menu-1">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">O nama</a></li>
        <li><a href="prikazKategorija.php">Kategorije</a></li>
        <li><a href="prikazOsoba.php">Nominovani</a></li>
        <?php
            if($_SESSION['ulogovan']){
    ?>
                <li ><a style="color: darkred; font-weight: bold" href="glasaj.php">Glasajte</a></li>

                <?php
                if($_SESSION['admin']){
                    ?>
                    <li><a href="administracija.php">Administracija</a></li>

                    <?php
                }
                ?>
                <li><a style="color: blueviolet;" href="odjavise.php">Izloguj se, <?php echo $_SESSION['ulogovaniKorisnik']->getImePrezime(); ?></a></li>
                <?php
            }else{
                ?>
                <li><a href="login.php">Login</a></li>

                <?php

            }
        ?>
    </ul>
</div>