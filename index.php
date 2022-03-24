<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- appel des liens css -->
    <?php include("./public/css/linkcss.php")?>
    <script src="./public/js/index.js" defer></script>
    <title>Gestion Materiel</title>
</head>
<body>
    <main class="container">
        <div class="form">
            <!-- formulaire de connexion  -->
            <form action="./app/auth/connexion.php" method="post" autocomplete="off">
                <h2>Connexion</h2>
                <div class="name">
                    <input type="text" name="name" id="name">
                    <label for="name" class="lb-name">name</label>               
                </div>
                <span class="erreurnom"></span>
                <div class="password">
                    <input type="password" name="password" id="password" maxlength="8">
                    <label for="password" class="lb-password">code</label>
                </div>
                <span class="erreurpassword"></span><br>
                <button type="submit" class="btn-hover">login</button>
            </form>
        </div>
    </main>
</body>
</html>