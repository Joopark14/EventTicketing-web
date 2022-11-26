<?php
include 'function.php';
session_start();


if (!isset($_SESSION["account_id"])) {
    header("location: ../login.php");
    exit();
} else {

    ticket_to_cart($_GET["cart_id"]);
    // echo $_GET["add_to_cart"];
}
