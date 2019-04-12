<?php
error_reporting(0);
session_start();
include_once('classes.php');
include_once('formClasses.php');
include_once('tester.php');
include_once('smsGateway.php');


// form class object
$formClass = new forms();
$classes = new classes();
$tester = new tester();
$formClass->getToken();
$smsGateway = new SmsGateway('paupaumartinez97@gmail.com', 'radiusdud');
  $deviceID = 65978;