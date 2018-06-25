<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Bataille
 * Date: 01/06/18
 * Time: 17:33
 */
 require_once 'Model/DAO/implementationUserDAO_Dummy.php';
 require_once 'Model/DAO/implementationKeychainDAO_Dummy.php';
 require_once 'Model/Service/implementationBorrowService_Dummy.php';

 $borrowService = implementationBorrowService_Dummy::getInstance();
 $userDAO = implementationUserDAO_Dummy::getInstance();

 if (!empty($_POST))
{
  if((strcmp($_POST['submit'],"Rendu")) == 0)
  {
    $borrowService->setBorrowingStatus($_POST['id'],"Returned");
    //$borrowService->returnKeychain($_POST['id'],"");
  }
  if((strcmp($_POST['submit'],"Perdu")) == 0)
  {
    //$borrowService->lostKeychain($_POST['id'],"");
    $borrowService->setBorrowingStatus($_POST['id'],"Lost");
  }
  if(strcmp($_POST['submit'],"Prolonger") == 0)
  {
    $borrowService->setUpdateDueDate($_POST['id'],$_POST['dueDate']);
  }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Emprunt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<header><h1>Emprunt</h1></header>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">EnssatKey</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Inventory.php">Inventaire</a></li>
            <li class="active"><a href="Borrowing.php">Emprunt</a></li>
            <li><a href="Gestion.php">Gestion</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="col-lg-16">
        <h2>En circulation</h2>
        <p>Trousseaux en circulation</p>
        <table class="table table-hover">
            <thead>

            <tr>
                <th>IdTrousseau</th>
                <th>Emprunteur</th>
                <th>Date emprunt</th>
                <th>Date rendu</th>
                <th>Perdu</th>
                <th>Rendu </th>
            </tr>
            </thead>
            <tbody>
              <?php
              foreach ($borrowService->getBorrowings() as $value) {
                $user = $userDAO->getUserByEnssatPrimaryKey($value['userEnssatPrimaryKey']);
                if((strcmp($borrowService->getBorrowingStatus($value['borrowingId']),"Borrowed")) == 0)
                {
                  echo "<tr>";
                  //list('borrowingId'=>$borrowingId,'userEnssatPrimaryKey'=>$userEnssatPrimaryKey,'keychainId'=>$keychainId,'borrowDate'=>$borrowDate,'dueDate'=>$dueDate,'returnDate'=>$returnDate,'lostDate'=>$lostDate,'comment'=>$comment) = $value;
                  echo "<td>".$value['keychainId']."</td>";
                  echo "<td>".$user->getUsername()."</td>";
                  echo '<td>'.$value['borrowDate']->format('d-m-Y H:i:s').'</td>';
                  echo '<td>'.$value['dueDate']->format('d-m-Y H:i:s').'</td>';
                  echo "<td><form action='' method='post'><input type='text' name='id' value='".$value['borrowingId']."' hidden><input type='submit'  name='submit' value='Perdu'><form></td>";
                  echo "<td><form action='' method='post'><input type='text' name='id' value='".$value['borrowingId']."' hidden><input type='submit'  name='submit' value='Rendu'><form></td>";
                  echo "<td><form action='' method='post'><input type='text' name='id' value='".$value['borrowingId']."' hidden><input type='date' name='dueDate'><input type='submit'  name='submit' value='Prolonger'><form></td>";
                  echo "</tr>";
                }
              }
               ?>

            </tbody>
        </table>
    </div>

    <div class="col-lg-16">
        <h2>Trousseaux perdus</h2>
        <table class="table table-hover">
            <thead>
            <tr>
              <th>IdTrousseau</th>
              <th>Emprunteur</th>
              <th>Date perdu</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <?php
              foreach ($borrowService->getBorrowings() as $value) {
                $user = $userDAO->getUserByEnssatPrimaryKey($value['userEnssatPrimaryKey']);
                if((strcmp($borrowService->getBorrowingStatus($value['borrowingId']),"Lost")) == 0)
                {
                  echo "<tr>";
                  //list('borrowingId'=>$borrowingId,'userEnssatPrimaryKey'=>$userEnssatPrimaryKey,'keychainId'=>$keychainId,'borrowDate'=>$borrowDate,'dueDate'=>$dueDate,'returnDate'=>$returnDate,'lostDate'=>$lostDate,'comment'=>$comment) = $value;
                  echo "<td>".$value['keychainId']."</td>";
                  echo "<td>".$user->getUsername()."</td>";
                  echo '<td>'.$value['lostDate']->format('d-m-Y H:i:s').'</td>';
                  echo "</tr>";
                }
              }
               ?>

            </tr>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
