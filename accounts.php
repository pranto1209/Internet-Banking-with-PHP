<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>iBanking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>

</head>
<body style="background: url(images/user.jpg);background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item active ">  <a class="nav-link" href="accounts.php">Account Details</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Fund Transfer</a></li> -->


    </ul>
    <?php include 'sideButton.php'; ?>
   
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Account Information
  </div>
  <div class="card-body">
  <table class="table table-striped table-dark w-75 mx-auto">
    <tbody>
      <tr>
        <th scope="row">Account Name</th>
        <td><?php echo $userData['name']; ?></td>
      </tr>
      <tr>
        <th scope="row">Account Number</th>
        <td><?php echo $userData['accountNo']; ?></td>
      </tr>
      <tr>
        <th scope="row">Customer ID</th>
        <td><?php echo $userData['cnic']; ?></td>
      </tr>
      <tr>
        <th scope="row">Email</th>
        <td><?php echo $userData['email']; ?></td>
      </tr>
      <tr>
        <th scope="row">Branch Name</th>
        <td><?php echo $userData['branchName']; ?></td>
      </tr>
      <tr>
        <th scope="row">Branch Code</th>
        <td><?php echo $userData['branchNo']; ?></td>
      </tr>
      <tr>
        <th scope="row">Available Balance</th>
        <td><?php echo $userData['balance']; ?></td>
      </tr>
      <tr>
        <th scope="row">Account Type</th>
        <td><?php 
        if($userData['accountType'] == "saving") echo "Savings";
        else echo "Current"
        ?></td>
      </tr>
      <tr>
        <th scope="row">City</th>
        <td><?php echo $userData['city']; ?></td>
      </tr>
      <tr>
        <th scope="row">Address</th>
        <td><?php echo $userData['address']; ?></td>
      </tr>
      <tr>
        <th scope="row">Account Created</th>
        <td><?php echo $userData['date']; ?></td>
      </tr>
    </tbody>
  </table>
      
  </div>
  <div class="card-footer text-muted">
   <?php echo bankname ?>
  </div>
</div>

</div>

<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(0,0,0,0.7);
   color: white;
   text-align: center;">
  <h6 style="color: white;"><b>Develpoed by Masum Pranto<br>Copyright &copy 2021-2022 iBanking</b></h6>
</div>

</body>
</html>