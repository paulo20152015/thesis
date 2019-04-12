<?php

include_once('../../php/include.php');
session_unset();
session_destroy();
header("location:../../index.php");