<?php require '../../../public/css/linkcss.php'?>
<?php
    use app\App;
    use app\Database;
    use app\Fonction;
    use app\tables\Fournisseur;

    require '../../../app/tables/Fournisseur.php';
    require '../../../app/App.php';
    require '../../../app/Database.php';
    require '../../../app/Fonction.php';

    // here i take client by their id
    if (isset($_GET['id'])) {
        $data = []; 
        $data[] = Fonction::checkinput($_GET['id']);   
    }
    $fournisseurs = Fournisseur::getFournisseurByid($data[0]);
    foreach ($fournisseurs as $fournisseur) {
        $nom=$fournisseur['nom_fournisseur'];
        $telephone=$fournisseur['telephone'];
        $adresse=$fournisseur['adresse_fournisseur'];
    }

    //here is the update of the client
    if (isset($_POST['nom']) && isset($_POST['telephone']) && isset($_POST['adresse'])) {
            // here i add a new client
        Fournisseur::deleteFournisseur($data);
        header('Location: ../template/template.php?p=fournisseur');
    }
?>
<div class="col-lg-7 client" style="margin: 50px;">
    <h1>Supprimer Fournisseur</h1>
    <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" name="nom" class="form-control" value="<?=htmlentities($nom)?>">
        <label for="telephone">telephone</label>
        <input type="text" name="telephone" class="form-control" value="<?=htmlentities($telephone)?>">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" class="form-control" value="<?=htmlentities($adresse)?>"><br>
        <button type="submit" class="btn btn-danger">Supprimer</button><br><br>
    </form>
</div>