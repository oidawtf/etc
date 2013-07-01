<?php

require '../includes.php';

if (!isset($_POST['id']) || !isset($_POST['status']))
    return;

$id = $_POST['id'];
$status = $_POST['status'];

controller::updateSeat($id, $status);

?>
