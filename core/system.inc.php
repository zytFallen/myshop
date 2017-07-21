<?php
require_once 'SQLConnection.php';
require 'SepPage.php';
$connobj=new SQLConnect("mysql", "localhost", "root", "root", "myshop");
$conn=$connobj->connect();
$seppage=new SepPage();