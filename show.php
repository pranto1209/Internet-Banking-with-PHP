<?php
session_start();
if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>iBanking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from useraccounts where id = '$_GET[id]'"))
    {
      header("location:mindex.php");
    }
  } ?>
</head>
<body style="background: url(images/manager.jpg);background-size: 100%">
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
        <a class="nav-link active" href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">Feedback</a></li>


    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<?php 
  $array = $con->query("select * from useraccounts,branch where useraccounts.id = '$_GET[id]' AND useraccounts.branch = branch.branchId");
  $row = $array->fetch_assoc();
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account Information of <?php echo $row['name'];?>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Account Name</td>
          <th><?php echo $row['name'] ?></th>
          <td>Account Number</td>
          <th><?php echo $row['accountNo'] ?></th>
        </tr>
        <tr>
          <td>Branch Name</td>
          <th><?php echo $row['branchName'] ?></th>
          <td>Branch Code</td>
          <th><?php echo $row['branchNo'] ?></th>
        </tr>
        <tr>
          <td>Email</td>
          <th><?php echo $row['email'] ?></th>
          <td>Password</td>
          <th><?php echo $row['password'] ?></th>
        </tr>
        <tr>
          <td>Available Balance</td>
          <th><?php echo $row['balance'] ?></th>
          <td>Account Type</td>
          <th><?php
          if($row['accountType'] == "saving") echo "Savings";
          else echo "Current"
          ?></th>
        </tr>
        <tr>
          <td>Customer ID</td>
          <th><?php echo $row['cnic'] ?></th>
          <td>City</td>
          <th><?php echo $row['city'] ?></th>
        </tr>
        <tr>
          <td>Contact Number</td>
          <th><?php echo $row['number'] ?></th>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
        </tr>
        <tr>
        <td>Account Created</td>
        <th><?php echo $row['date']; ?></th>
        <td></td>
        <th></th>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
    <?php echo bankname; ?>
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