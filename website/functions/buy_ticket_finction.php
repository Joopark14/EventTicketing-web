<?php
include 'function.php';
session_start();


if (!isset($_SESSION["account_id"])) {
    header("location: ../login.php");
    exit();
} else {
    ticket_to_cart($_POST["add_to_cart"]);
}
