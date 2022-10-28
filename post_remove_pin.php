<?php
require_once('template/core/auth.php');
require_once('template/core/base.php');
require_once('template/core/function.php');

if(postRemovePin()){
    linkTo('post_list.php'); 
}