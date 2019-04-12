<?php
include_once('include.php');
$message= array();

if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    /*for student*/
  if(isset($_POST['studentForm']))
      {
      echo 'hello';
      }
  else
  {
echo 'hello';
  }
  /*end*/
  /*for faculty*/
   if(isset($_POST['facultyForm']))
      {
      echo 'hello';
      }
  else
  {
    echo'kik';
  }
  /*end*/
}

