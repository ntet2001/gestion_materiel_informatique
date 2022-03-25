<?php require '../../../public/css/linkcss.php'?>
<?php
    use app\App;
    use app\Database;
    use app\Fonction;
    use app\tables\Utilisateur;
    use app\tables\Role;

    require '../../../app/tables/Utilisateur.php';
    require '../../../app/App.php';
    require '../../../app/Database.php';
    require '../../../app/Fonction.php';
    require '../../../app/tables/Role.php';

    $roles = Role::getRole();
    // here i take client by their id
    if (isset($_GET['id'])) {
        $data = []; 
        $data = Fonction::checkinput($_GET['id']);   
    }

    $utilisateurs = Utilisateur::getUtilisateurtByid($data);
    foreach ($utilisateurs as $utilisateur) {
        $nom=$utilisateur['nom_utilisateur'];
        $email=$utilisateur['email_utilisateur'];
        $pass=$utilisateur['pass'];
        $nomrole=$utilisateur['nom_role'];
    }

    //here is the update of the client
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['role'])) {
        if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['role']) ) {
            $hash= password_hash($_POST['pass'],PASSWORD_BCRYPT);
            $user = [$_POST['nom'],$_POST['email'],$hash,$_POST['role']];
            array_push($user,$data);
            // here i add a new client
            Utilisateur::updateUtilisateur($user);
            header('Location: ../template/template.php?p=utilisateur');
        }else{
            echo '<script> alert("Remplissez tous les champs");</script>';
        }
    }
?>
<div class="col-lg-6 client" style="margin: 50px;">
    <h1>Modifier Utilisateur</h1>
    <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" class="form-control" value="<?=$nom?>" name="nom">
        <label for="email">Email</label>
        <input type="text" class="form-control" value="<?=$email?>" name="email">
        <label for="pass">Mot de Passe</label>
        <input type="password" class="form-control" value="" style="width:50%;" name="pass" maxlength="8">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <?php $attribute = null ?>
            <?php foreach($roles as $role):?>
                <?php if($role['nom_role'] == $nomrole):?>
                    <?php $attribute = "selected='selected'"?>
                    <option value="<?=$role['id_role']?>" <?=$attribute?>> <?=$role['nom_role']?> </option>
                <?php endif?>
                <option value="<?=$role['id_role']?>"> <?=$role['nom_role']?> </option>
            <?php endforeach?>
        </select><br>
        <a href="../template/template.php?p=client"><button class="btn btn-primary">retour</button></a>
        <button type="submit" class="btn btn-success">Modifier</button><br><br>
    </form>
</div>