<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Bataille
 * Date: 01/06/18
 * Time: 17:33
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ressources</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<header><h1>Ressources</h1></header>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">EnssatKey</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Accueil</a></li>
            <li class="active"><a href="Inventory.php">Inventaire</a></li>
            <li><a href="Ressources.php">Ressources</a></li>
            <li><a href="Gestion.php">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Clefs</h2>

    <div class="col-lg-10">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>IDclef</th>
                <th>Salle</th>
                <th>Type de clé</th>
                <th>Proprietaire</th>
                <th>Nombres clefs</th>
                <th>canon</th>
                <th>etat</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>45684</td>
                <td>05V</td>
                <td>1</td>
                <td>Craig</td>
                <td>6</td>
                <td>6</td>
                <td>dispo</td>
            </tr>
            <tr>
                <td>54786</td>
                <td>102H</td>
                <td>3</td>
                <td>Daniel</td>
                <td>3</td>
                <td>4</td>
                <td>non dispo</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="col-lg-2">
        <form>

            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" id="Name" placeholder="Nom">

                <label for="date">Date obtention</label>
                <input type="date" class="form-control" id="dateObtention">

                <label for="IdClef">IDClef</label>
                <input type="text" class="form-control" id="IDClef" placeholder="ID clef">

                <label for="Salle">Salle</label>
                <input type="text" class="form-control" id="Room" placeholder="Salle">

                <label for="TypeClef">Type Clef</label>
                <select class="form-control" id="KeyType">
                    <option>passe partout</option>
                    <option>accès restreint</option>
                    <option>Acces visiteur</option>
                    <option>Acces etudiant</option>
                    <option>Acces professeur / chercheur</option>
                </select>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>

        </form>
    </div>

    <div class="col-lg-10">
    <div class="form-group">
        <label for="exampleInputFile">Insérer un fichier</label>
        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
        <button type="button" class="btn btn-default">Ajouter aux données</button>

    </div>
    </div>

</div>
</body>
</html>
