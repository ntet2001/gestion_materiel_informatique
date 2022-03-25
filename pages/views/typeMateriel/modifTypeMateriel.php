<?php require '../../../public/css/linkcss.php'?>
<?php
    use app\App;
    use app\Database;
    use app\Fonction;
    use app\tables\TypeMateriel;

    require '../../../app/tables/TypeMateriel.php';
    require '../../../app/App.php';
    require '../../../app/Database.php';
    require '../../../app/Fonction.php';

    // here i take client by their id
    if (isset($_GET['id'])) {
        $data = []; 
        $data = Fonction::checkinput($_GET['id']);   
    }
    $typeMateriels = TypeMateriel::getTypeMaterielByid($data);
    foreach ($typeMateriels as $typeMateriel) {
        $marque=$typeMateriel['marque'];
    }

    //here is the update of the client
    if (isset($_POST['marque'])) {
        if (!empty($_POST['marque'])){
            $type = [$_POST['marque']];
            array_push($type,$data);
            // here i add a new client
            TypeMateriel::updateTypeMateriel($type);
            header('Location: ../template/template.php?p=type_materiel');
        }else{
            echo '<script> alert("Remplissez tous les champs");</script>';
        }
    }
?>
<div class="col-lg-7 client" style="margin:50px;">
    <h1>Modifier Type de Materiel</h1>
    <form action="" method="post">
        <label for="marque">Marque</label>
        <input type="text" name="marque" class="form-control" value="<?=htmlentities($marque)?>" style="width:50%;"><br>
        <button type="submit" class="btn btn-primary">Modifier</button><br><br><br>
    </form>
</div>