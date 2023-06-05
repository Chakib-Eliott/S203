<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Avis S203</title>
        <meta name="description" content="Page d'avis sur la SAé S203">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="asset/style.css">
    </head>
    <body>
        <header>
            <h1>Avis S203</h1>
        </header>
        <form action="sqlrequest.php" method="post">
            <label for="pseudo">Votre pseudo :</label>
            <input type="text" required id="pseudo" name="pseudo"/><br><br>
            <label for="comment">Votre commentaire :</label><br>
            <textarea id="comment" name="comment" required rows="5" cols="33"> </textarea><br><br>
            <input type="submit" id="submit" name="submit" value="Poster">
        </form>
        <?php
            if (isset($_POST['submit'], $_POST['pseudo'], $_POST['comment'])){
                // Récupère les informations du formulaire
                $pseudo = $_POST['pseudo'];
                $comment = $_POST['comment'];
                // Connection à mysql
                $token = (bool)($connexion = mysqli_connect("localhost","root","S203"));
                // je verifie ma connexion
                if($token){
                    // Connection à la base
                    $token2 = ($bd=mysqli_select_db($connexion,"comment"));
                    if($token2){
                        $req = "INSERT INTO comment (pseudo, comment) VALUES ('$pseudo', '$comment')";
                        $req = mysqli_query($connexion,$req);
                    }
                }
            }
        ?>
    </body>
</html>
