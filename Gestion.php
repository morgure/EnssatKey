<?php
/**
 * Created by PhpStorm.
 * User: Crusson Mathieu
 * Date: 01/06/18
 * Time: 17:33
 */

require_once 'Model/DAO/implementationUserDAO_Dummy.php';
require_once 'Model/DAO/implementationKeychainDAO_Dummy.php';
require_once 'Model/Service/implementationBorrowService_Dummy.php';
require_once 'Model/DAO/implementationRoomDAO_Dummy.php';
require_once 'Model/DAO/implementationDoorDAO_Dummy.php';
require_once 'Model/DAO/implementationKeyOpenDoorDAO_Dummy.php';
require_once 'Model/DAO/implementationKeyOnKeychainDAO_Dummy.php';
require_once 'Model/Service/implementationBorrowService_Dummy.php';

$borrowService = implementationBorrowService_Dummy::getInstance();
$userDAO = implementationUserDAO_Dummy::getInstance();
$roomDAO = implementationRoomDAO_Dummy::getInstance();
$doorDAO = implementationDoorDAO_Dummy::getInstance();
$openDoorDAO = implementationKeyOpenDoorDAO_Dummy::getInstance();
$keyOnKeychainDAO = implementationKeyOnKeychainDAO_Dummy::getInstance();
$borrowService = implementationBorrowService_Dummy::getInstance();

if(isset($_POST["name"])){
    $doors = $doorDAO->getDoorByIdRoom($_POST['id']);
    foreach($doors as $door) {
        $door->setLock($_POST["porte"]);
       /* $keyId = $openDoorDAO->getKeyOpenDoorByIdDoor($door->getId());
        foreach ($keyId as $key) {
            $keychainID = $keyOnKeychainDAO->getKeyOnKeychainsByKey($key->getId());
            print_r($keychainID);
            $borrows = $borrowService->getBorrowings();
            foreach($keychainID as $value){
                foreach ($borrows as $borrow){
                    if($borrow['keychainsId'] == $value){
                        echo $borrow[userEnssatPrimaryKey];
                    }
                }
            }
        }*/
    }
}

if(isset($_POST["send"])){
    if(isset($_POST["mail"])){
        $mail = $_POST["mail"];
        $message = "<html><head></head><body>La date de rendu est dépassée veuillez rendre votre trousseau au plus vite</body></html>";
        $sujet = "Date de rendu dépassé";
        $headers = "From: enssatKey@gmail.com";
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        mail($mail,$sujet,$message,$headers);
        //echo "envoi d'un mail à ".$mail;
    }
}
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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Inventory.php">Inventaire</a></li>
            <li><a href="Borrowing.php">Emprunt</a></li>
            <li class="active"><a href="Gestion.php">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
<!--
        <h2>Pret</h2>


            <label for="IdClef">IDClef</label>
            <input type="text" class="form-control" id="IDClef" placeholder="ID clef">
            <label for="Name">Nom</label>
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
   -->
    <div class="col-lg-16">
   <h2>Relance</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>IDClef</th>
            <th>Nom</th>
            <th>date rendu prévue</th>
            <th>mail</th>
            <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($borrowService->getBorrowings() as $value){
                $user = $userDAO->getUserByEnssatPrimaryKey($value['userEnssatPrimaryKey']);
                if (($value['dueDate']->format('d-m-Y')) < ($today = date("d-m-Y"))){
                    echo "<tr>";
                    echo "<td>".$value['keychainId']."</td>";
                    echo "<td>".$user->getUsername()."</td>";
                    echo "<td>".$value['dueDate']->format('d-m-Y')."</td>";
                    echo "<td>".$user->getEmail()."</td>";
                    echo "<td>".$user->getPhone()."</td>";
                    echo '<td><form method="post">';
                    echo  '<input type="hidden" name="mail" id="mail" value='.$user->getEmail().'>';
                    echo '<input type="submit" name="send" value ="Relancer"/></form>';
                    echo "</tr>";
                }

            }
            ?>

        </tbody>
    </table>
    </table>
    <h2>Changement de canon</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Numéro du porte</th>
            <th>Canon actuel</th>
            <th>Nouveau Canon</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($roomDAO->getRooms() as $value){
            ?>
            <tr>
                <td><?php echo $value->getName() ?></td>
                <td>
                    <?php
                    $doors = $doorDAO->getDoorByIdRoom($value->getId());
                    foreach ($doors as $door){
                        $lock = $door->getLock();
                        echo $lock;
                    }
                    ?>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="name" id="name" value="<?php echo $value->getName(); ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $value->getId(); ?>">
                        <input type="text" name="porte" id="porte" required />
                        <input type="submit" name="envoi" value ="Changer"/>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    </div>



</div>
</body>
</html>
