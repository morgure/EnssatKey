<?php
    require_once 'Model/DAO/implementationKeyDAO_Dummy.php';
    require_once 'Model/DAO/implementationKeychainDAO_Dummy.php';
    require_once 'Model/DAO/implementationKeyOnKeychainDAO_Dummy.php';
    require_once 'Model/DAO/implementationKeyOpenDoorDAO_Dummy.php';
    require_once 'Model/DAO/implementationDoorDAO_Dummy.php';
    require_once 'Model/DAO/implementationRoomDAO_Dummy.php';
    require_once 'Model/DAO/implementationUserDAO_Dummy.php';
    require_once 'Model/Service/implementationBorrowService_Dummy.php';
    require('fpdf/fpdf.php');

    $keyDAO = implementationKeyDAO_Dummy::getInstance();
    $keychainDAO = implementationKeychainDAO_Dummy::getInstance();
    $keyOnKeychainDAO = implementationKeyOnKeychainDAO_Dummy::getInstance();
    $keyopendoorDAO = implementationKeyOpenDoorDAO_Dummy::getInstance();
    $doorDAO = implementationDoorDAO_Dummy::getInstance();
    $roomDAO = implementationRoomDAO_Dummy::getInstance();
    $userDAO = implementationUserDAO_Dummy::getInstance();
    $borrowService = implementationBorrowService_Dummy::getInstance();

    if(isset($_POST['submit'])){
        if(isset($_POST) && isset($_POST['clef']) && isset($_POST['user']))
        {

            $keychain = $keychainDAO->newKeychain();
            $borrowService->borrowKeychain($_POST['user'],$keychain->getId(),(new DateTime)->modify('+20 day'));
            foreach ($_POST['clef'] as $clef)
            {
                $KeyOnKeychain = $keyOnKeychainDAO->newKeyOnKeychain();
                $KeyOnKeychain->setKey($clef);
                $KeyOnKeychain->setKeychain($keychain->getId());

            }

        }
    }
    else if(isset($_POST['commander'])){
        if(isset($_POST) && isset($_POST['clef']))
        {
            foreach ($_POST['clef'] as $clef)
            {
                $key = $keyDAO->getkeyByEnssatPrimaryKey($clef);
                foreach ($key as $k){
                    $k->setNombreExemplaire($k->getNombreExemplaire()+1);
                }

            }

        }
    }

    if(isset($_POST['change'])){
        $keychain = $keychainDAO->newKeychain();
        $borrowService->borrowKeychain($_POST['change'],$keychain->getId(),(new DateTime)->modify('+20 day'));
        $keyonkeychainTmp = $keyOnKeychainDAO->getKeyOnKeychainsByKeychain($_POST['idKeychain']);
        foreach($keyonkeychainTmp as $key) {
            $KeyOnKeychain = $keyOnKeychainDAO->newKeyOnKeychain();
            $KeyOnKeychain->setKey($key->getKey());
            $KeyOnKeychain->setKeychain($keychain->getId());
        }
    }

    if(isset($_POST['pdf'])){
        $borrow = $borrowService->getborrowByEnssatPrimaryKey($_POST['idKeychain']);
        $user = $userDAO->getUserByEnssatPrimaryKey($borrow['userEnssatPrimaryKey']);
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(30, 10, "Surname");
        $pdf->Cell(30, 10, "Name");
        $pdf->Cell(30, 10, "KeyChain");
        $pdf->Cell(30, 10, "Keys");
        $pdf->Ln(5);
        $pdf->Cell(30, 30, $user->getSurname());
        $pdf->Cell(30, 30, $user->getName());
        $pdf->Cell(30, 30, $_POST['idKeychain']);
        $keyonkeychainTmp = $keyOnKeychainDAO->getKeyOnKeychainsByKeychain($_POST['idKeychain']);
        foreach($keyonkeychainTmp as $key) {
            $pdf->Cell(5, 30, $key->getKey());
        }
        $pdf->Output();
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
            <li class="active"><a href="Inventory.php">Inventaire</a></li>
            <li><a href="Borrowing.php">Emprunt</a></li>
            <li><a href="Gestion.php">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">


    <div class="col-lg-6">
      <h2>Information clefs</h2>
      <table class="table table-hover">
          <thead>
          <tr>
              <th>Sélection</th>
              <th>IDclef</th>
              <th>Type de clefs</th>
              <th>Nombres exemplaires</th>
              <th>Provider</th>
          </tr>
          </thead>
          <tbody>
            <form method='post' action="">
          <?php
              $keys = $keyDAO->getkeys();
              foreach ($keys as $key) {
                              echo "<tr>";
                              echo "<td><input type='checkbox' name='clef[]' value='" . $key->getId() . "'></td>";
                              echo "<td>" . $key->getId() . "</td>";
                              echo "<td>" . $key->getType() . "</td>";
                              echo "<td>" . $key->getNombreExemplaire() . "</td>";
                              echo "<td>" . $key->getProvider(). "</td>";
                              echo "</tr>";
              }
          ?>
          <tr>
              <td>
                <select class="form-control"  name="user" input="KeyType">
                <?php
                $users = $userDAO->getUsers();
                foreach ($users as $id){
                    echo '<option value="'.$id->getenssatPrimaryKey().'">'.$id->getUsername().'</option>';
                }
                ?>
                </select>
              </td>
              <td><input type="submit" name="submit" value="Créer trousseau"></td>
              <td><input type="submit" name="commander" value="Commander Clé(s)"></td>
              <td></td>
              <td></td>
          </tr>

        </form>
          </tbody>
      </table>
    </div>
  <div class="col-lg-6">
  <h2>Information clefs/salle</h2>
    <div class="col-lg-8">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>IDclef</th>
                <th>Salle</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST['IDClef']) && $_POST['IDClef']!=null){
                    $keys = $keyDAO->getkeyByEnssatPrimaryKey($_POST['IDClef']);
                }else{
                    $keys = $keyDAO->getkeys();
                }
                foreach ($keys as $key) {
                    $keyopendoors = $keyopendoorDAO->getkeyopendoorsbyidKey($key->getId());
                    foreach ($keyopendoors as $open) {
                        $doors = $doorDAO->getDoorById($open->getDoor());
                        $rooms = $roomDAO->getRoomByid($doors->getRoom());
                        if(isset($_POST['KeyType'])) {
                            if($_POST['KeyType'] == "Tout") {
                                if (isset($_POST['Room']) && $_POST['Room'] != null) {
                                    if ($rooms->getName() == $_POST['Room']) {
                                        echo "<tr>";
                                        echo "<td>" . $key->getId() . "</td>";
                                        echo "<td>" . $rooms->getName() . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td>" . $key->getId() . "</td>";
                                    echo "<td>" . $rooms->getName() . "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                if($_POST['KeyType'] == $key->getType()){
                                    if (isset($_POST['Room']) && $_POST['Room'] != null) {
                                        if ($rooms->getName() == $_POST['Room']) {
                                            echo "<tr>";
                                            echo "<td>" . $key->getId() . "</td>";
                                            echo "<td>" . $rooms->getName() . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo "<td>" . $key->getId() . "</td>";
                                        echo "<td>" . $rooms->getName() . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        }else{
                            if (isset($_POST['Room']) && $_POST['Room'] != null) {
                                if ($rooms->getName() == $_POST['Room']) {
                                    echo "<tr>";
                                    echo "<td>" . $key->getId() . "</td>";
                                    echo "<td>" . $rooms->getName() . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td>" . $key->getId() . "</td>";
                                echo "<td>" . $rooms->getName() . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-4">
        <form method="post">

            <div class="form-group">
                <label for="IdClef">IDClef</label>
                <input type="text" class="form-control" id="IDClef" name="IDClef" placeholder="ID clef" value="<?php if(isset($_POST['IDClef'])){echo $_POST['IDClef'];}; ?>">

                <label for="Salle">Salle</label>
                <input type="text" class="form-control" id="Room" name="Room" placeholder="Salle" value="<?php if(isset($_POST['Room'])){echo $_POST['Room'];}; ?>">

                <label for="TypeClef">Type Clef</label>
                <select class="form-control" id="KeyType" name="KeyType" input="KeyType">
                    <option>Tout</option>
                    <option <?php if(isset($_POST['KeyType']) && $_POST['KeyType'] == "Total"){?>selected = "selected"<?php }?>>Total</option>
                    <option <?php if(isset($_POST['KeyType']) && $_POST['KeyType'] == "Simple"){?>selected = "selected"<?php }?>>Simple</option>
                    <option <?php if(isset($_POST['KeyType']) && $_POST['KeyType'] == "Partiel"){?>selected = "selected"<?php }?>>Partiel</option>
                </select>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>

        </form>
    </div>
  </div>


    <div class="col-lg-12">
        <div class="form-group">
            <label for="exampleInputFile">Insérer un fichier</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <button type="button" class="btn btn-default">Ajouter aux données</button>

        </div>

        <div class="col-lg-12">
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
                <?php
                $keychains = $keychainDAO->getKeychains();

                foreach ($keychains as $k){
                    $keyonkeychain = $keyOnKeychainDAO->getKeyOnKeychainsByKeychain($k->getId()); ?>
                    <tr>
                        <td><?php echo $k->getId() ?></td>
                        <td>
                            <?php foreach($keyonkeychain as $key){
                                echo $key->getKey()." ";
                            } ?>
                        </td>
                        <td>
                            <form method="post">
                                <select class="form-control" id="change" name="change" input="KeyType">
                                    <?php
                                    $users = $userDAO->getUsers();
                                    foreach ($users as $id){
                                        echo '<option value="'.$id->getenssatPrimaryKey().'">'.$id->getUsername().'</option>';
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="idKeychain" value="<?php echo $k->getId(); ?>">
                                <button type="submit" class="btn btn-primary" name="dupliquer" value="Dupliquer">Dupliquer</button>
                            </form>
                        </td>
                        <td><form method="post">
                                <button type="submit" class="btn btn-primary" name="pdf" value="PDF">Import PDF</button>
                                <input type="hidden" name="idKeychain" value="<?php echo $k->getId(); ?>">
                        </form></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>
