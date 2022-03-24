<?php
    require '../Fonction.php';
    require '../App.php';
    require '../Database.php';

    use app\App;
    use app\Fonction;

    Fonction::ajoutsession();
    App::unsetDatabase();
    Fonction::retirersession($_SESSION);