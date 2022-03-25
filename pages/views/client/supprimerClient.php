<?php require '../../../public/css/linkcss.php'?>
<?php
    use app\App;
    use app\Database;
    use app\Fonction;
    use app\tables\Client;

    require '../../../app/tables/Client.php';
    require '../../../app/App.php';
    require '../../../app/Database.php';
    require '../../../app/Fonction.php';

    // here i take client by their id
    if (isset($_GET['id'])) {
        $data = []; 
        $data[] = Fonction::checkinput($_GET['id']);   
    }
    $clients = Client::getClientByid($data[0]);
    foreach ($clients as $client) {
        $nom=$client['nom_client'];
        $prenom=$client['prenom_client'];
        $email=$client['email_client'];
        $adresse=$client['adresse_client'];
    }

    //here is the update of the client
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse'])) {
        Client::deleteClient($data);
        header('Location: ../template/template.php?p=client');
    }
?>
<div class="col-lg-6 client" style="margin: 50px;">
    <h1>Supprimer Client</h1>
    <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" class="form-control" name="nom" value="<?=htmlentities($nom)?>">
        <label for="prenom">prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?=htmlentities($prenom)?>">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?=htmlentities($email)?>">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?=htmlentities($adresse)?>"><br>
        <button type="submit" class="btn btn-danger">Supprimer</button><br><br>
    </form>
</div>