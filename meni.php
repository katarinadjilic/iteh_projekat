<div class="col-xs-10 text-right menu-1">
    <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.php">O nama</a></li>
        <li><a href="prikazKategorija.php">Kategorije</a></li>
        <li><a href="prikazOsoba.php">Nominovani</a></li>
        <?php
            if($_SESSION['ulogovan']){
    ?>
                <li style="color: darkred;"><a href="glasaj.php">Glasajte</a></li>

                <?php
                if($_SESSION['admin']){
                    ?>
                    <li><a href="administracija.php">Administracija</a></li>

                    <?php
                }
                ?>
                <li><a href="odjavise.php">Logout</a></li>
                <?php
            }else{
                ?>
                <li><a href="login.php">Login</a></li>

                <?php

            }
        ?>
    </ul>
</div>