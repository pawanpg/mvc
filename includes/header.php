<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ZunaWeb MVC">
    <meta name="author" content="ZunaWeb">
    <title><?php if(isset($title)) echo $title; else echo 'ZunaWeb'; ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>views/themes/errortheme/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

</head>

<body>
    <div class="container"> 
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="<?= URL ?>">ZunaWeb</a>
            </div>
            <ul class="nav navbar-nav">
                <li <?php if(!empty($page) and $page == 'home') echo 'class="active"'; ?> ><a href="<?= URL ?>">Home</a></li>
                <li <?php if(!empty($page) and $page == 'about') echo 'class="active"'; ?> ><a href="<?= URL ?>about">About Us</a></li>
                <li <?php if(!empty($page) and $page == 'contact') echo 'class="active"'; ?> ><a href="<?= URL ?>contact">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php if(!empty($page) and $page == 'register') echo 'class="active"'; ?> ><a href="<?= URL ?>register/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></a></li>
                <li <?php if(!empty($page) and $page == 'login') echo 'class="active"'; ?> ><a href="<?= URL ?>login/"><span class="glyphicon glyphicon-log-in"></span> Login</a></a></li>
            </ul>
        </div>
        </nav>