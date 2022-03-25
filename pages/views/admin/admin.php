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

    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['role'])) {
        if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['role']) ) {
            $hash=password_hash($_POST['pass'],PASSWORD_BCRYPT);
            $data = [$_POST['nom'],$_POST['email'],$hash,$_POST['role']];
            // here i add a new client
            Utilisateur::setUtilisateur($data);
        }else{
            echo '<script> alert("Remplissez tous les champs");</script>';
        }
    }

    $utilisateurs = Utilisateur::getUtilisateur();
?>

<div class="col-lg-7 client">
    <h1>Utilisateur</h1>
    <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" class="form-control" value="" name="nom">
        <label for="email">Email</label>
        <input type="text" class="form-control" value="" name="email">
        <label for="pass">Mot de Passe</label>
        <input type="password" class="form-control" value="" style="width:50%;" name="pass" maxlength="8">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <?php foreach($roles as $role):?>
                <option value="<?=$role['id_role']?>"><?=$role['nom_role']?></option>
            <?php endforeach?>
        </select><br>
        <button type="reset" class="btn btn-success">Clear</button>
        <button type="submit" class="btn btn-primary">Insert</button><br><br>
    </form>

    <table id="example" class="table table-hover table-bordered table-triped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom utilisateur</th>
                <th>Email utilisateur</th>
                <th>role</th>
                <th>Actions</th>
            </tr>
        </thead>
            <tbody>
                <?php foreach($utilisateurs as $utilisateur):?>
                    <tr>
                        <td><?=$utilisateur['id_utilisateur']?></td>
                        <td><?=$utilisateur['nom_utilisateur']?></td>
                        <td><?=$utilisateur['email_utilisateur']?></td>
                        <td><?=$utilisateur['nom_role']?></td>
                        <td>
                        <a href="<?='../admin/modifadmin.php?id='.$utilisateur['id_utilisateur']?>" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg> Modify
                            </a> 
                            <a href="<?='../admin/supprimeradmin.php?id='.$utilisateur['id_utilisateur']?>" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg> Delete
                            </a>
                        </td>
                    </tr> 
                <?php endforeach;?>      
            </tbody>
    </table>
</div>