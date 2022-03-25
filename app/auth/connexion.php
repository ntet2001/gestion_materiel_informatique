<?php
    require '../App.php';
    require '../Database.php';
    require '../Fonction.php';
    use app\App;
    use app\Database;
use app\Fonction;

    try {
        $connexion = App::getDatabase();    
    } catch (\Throwable $th) {
        throw $th;
    }

    $nom = $_POST['name'];
    $mdp = $_POST['password'];
    $datas= null;
    $role=null;
    $erreur = 'Please fill all textbox !';
    $testSelect="SELECT * FROM utilisateur";
    $selectpass= "SELECT pass FROM utilisateur ";
    $selectnom= "SELECT nom_utilisateur FROM utilisateur ";
    $verification= [];
    $defaultInsert="INSERT INTO utilisateur (nom_utilisateur,email_utilisateur,pass,roleid) VALUES 
    (?,?,?,?)";
    $option= [];
    $defaultmdp='00000000';
    $defaulthash= password_hash($defaultmdp,PASSWORD_BCRYPT);
    $hash=null;

    //i verified if the name and password is define
    if(!empty($nom) && !empty($mdp) )
    {
        // here i verified if the are users in my database and add a default admin
        $datas = $connexion->query($testSelect);
        if (empty($datas)) {
            $option=['admin','admindefault@gmail.com',$defaulthash,1];
            $connexion->prepare($defaultInsert,$option);
            header('Location: ../../../index.php');
        }else{

            // here i verified the password and the name enter by the user
            $pwds= $connexion->query($selectpass);
            $noms=$connexion->query($selectnom);
            foreach ($pwds as $pwd){
                foreach ($pwd as $pw)
                {
                    if(password_verify($mdp,$pw))
                    {
                        $hash= $pw ;
                        //name
                        foreach ($noms as $nms){
                            foreach ($nms as $nm)
                            {
                                if($nm == $nom)
                                {
                                    $selectrole="SELECT roleid FROM utilisateur 
                                    WHERE nom_utilisateur='$nom' AND pass='$hash'";
                                    $role = $connexion->query($selectrole);
                                    if($role[0]['roleid'] === '1'){
                                        Fonction::ajoutsession();
                                        $_SESSION['connecte']=1;
                                        $_SESSION['nom']=$nom;
                                        header('Location: ../../pages/views/template/template.php');
                                    }else {
                                        header('Location: ../../pages/views/manager/indexManager.php');
                                    }

                                }else{
                                    echo 'le nom  n\'existe pas';
                                }
                            }
                        }    
                    }else{
                        echo 'le mot de passe n\'existe pas';
                    }
                }
            }
        }

    }else{
        echo $erreur;
    }
