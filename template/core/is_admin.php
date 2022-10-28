<?php

if($_SESSION['user']['role'] != 0)
{
    header('Location:dashboard.php');
}

?>