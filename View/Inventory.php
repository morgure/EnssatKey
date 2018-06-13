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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
            <li class="active"><a href="Inventory.php">Inventaire</a></li>
            <li><a href="Ressources.php">Ressources</a></li>
            <li><a href="#">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="col-lg-10">
        <h2>En circulation</h2>
        <p>Cles en circulation</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>date</th>
                <th>proprietaire</th>
                <th>type d'acces</th>
                <th>Type de clé </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>45684</td>
                <td>12/02/2002</td>
                <td>john</td>
                <td>acces enseignant</td>
                <td>passe presque partout</td>
            </tr>
            <tr>
                <td>12548</td>
                <td>25/12/2015</td>
                <td>David</td>
                <td>acces etudiant</td>
                <td>clef unique</td>
            </tr>
            <tr>
                <td>98547</td>
                <td>13/01/1985</td>
                <td>Christophe</td>
                <td>acces illimté</td>
                <td>passe partout</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-2">
    <div class="MenuInventaire">
        <h2>Prolonger</h2>
        <label for="date">Date prolongement</label>
        <input type="date" class="form-control" id="usr">
        <button type="button" class="btn btn-default">prolonger</button>
        <button type="button" class="btn btn-default">Prolonger</button>
    </div>
    </div>

    <div class="col-lg-10">
<h2>Trousseau</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nb clefs</th>
            <th>IDclefs</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>T1</td>
            <td>7</td>
            <td>1/2/3/4/5/6/7</td>
        </tr>
        <tr>
            <td>T2</td>
            <td>4</td>
            <td>8/9/10</td>
        </tr>
        </tbody>
    </table>
    </div>

    <div class="col-lg-2">

            <h2>Dupliquer</h2>
            <label for="date">Nombre de fois a dupliquer</label>
            <input type="number" class="form-control" id="nb">
            <button type="button" class="btn btn-default">Dupliquer trousseau</button>
    </div>
    </div>
</body>
</html>
