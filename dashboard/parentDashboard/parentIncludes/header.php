<?php
include_once('../../php/include.php');
if(isset($_SESSION['parentId']) && isset($_SESSION['parentToken'])){
    $CurrenUserId        = $formClass->c($_SESSION['parentId']);
    $username            = $formClass->c($_SESSION['parentUsername']);
}else{
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>NCA</title>
<link rel="icon" type="image/png" href="../../image/favicon-32x32.png" sizes="32x32" />
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>
