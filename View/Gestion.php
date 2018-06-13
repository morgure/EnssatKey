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
    <title>Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<header><h1>Inventaire</h1></header>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">EnssatKey</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="Inventory.php">Inventaire</a></li>
            <li><a href="Ressources.php">Ressources</a></li>
            <li class="active"><a href="Gestion.php">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="col-lg-6">
    <div class="Emprunt">
        <h2>Emprunt</h2>
        <div class="formEmprunt">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>

    <div class="Retour">
        <h2>Retour</h2>
        <div class="formRetour">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="IdClef">IDClef</label>
            <input type="text" class="form-control" id="IDClef" placeholder="ID clef">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>

    <div class="Perte">
        <h2>Perte</h2>
        <div class="formPerte">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="IdClef">IDClef</label>
            <input type="text" class="form-control" id="IDClef" placeholder="ID clef">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>


    <div class="Pret">
        <h2>Pret</h2>
        <div class="formPret">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <label for="IdClef">IDClef</label>
            <input type="text" class="form-control" id="IDClef" placeholder="ID clef">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>

    </div>

    <div class="col-lg-6">

    <div class="Transfert">
        <h2>Transfert</h2>
        <div class="formTransfert">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <label for="IdClef">IDClef</label>
            <input type="text" class="form-control" id="IDClef" placeholder="ID clef">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>


    <div class="Relance">
        <h2>Relance</h2>
        <div class="formRelance">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Name" placeholder="Nom">
            <label for="Type">Type de clé</label>
            <select class="form-control" id="KeyType">
                <option>passe partout</option>
                <option>accès restreint</option>
                <option>Acces visiteur</option>
                <option>Acces etudiant</option>
                <option>Acces professeur / chercheur</option>
            </select>
            <label for="Nom">Mail</label>
            <input type="email" class="form-control" id="mail" placeholder="adresse mail">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>
    </div>




</div>
</body>
</html>
