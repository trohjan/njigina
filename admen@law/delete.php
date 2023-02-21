<?php
require_once "config.php";
require_once "auth_session.php";

$delete = false;
if (isset($_GET['delUser'])) {
    $id = $_GET['delUser'];
    mysqli_query($con, "DELETE FROM appointment WHERE id='$id'");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissible ">
    <strong>Successful!</strong> Appointment deleted.</div>';
    header('location: units.php');

}
if (isset($_GET['delMs'])) {
    $id = $_GET['delMs'];
    mysqli_query($con, "DELETE FROM message WHERE id='$id'");
	$_SESSION['message'] = '<div class="alert alert-success alert-dismissible ">
    <strong>Successful!</strong> User deleted.</div>';
    header('location: unread.php');

}

if (isset($_GET['upt'])) {
    $id = $_GET['upt'];
    mysqli_query($con, "UPDATE appointment SET status = '2' WHERE id='$id'");
    $_SESSION['message'] = '<div class="alert alert-success">
    <strong>Successful!</strong>Appointment Has been Reviewed.</div>';
    header('location: units.php');


}
/*
if (isset($_GET['desuspend'])) {
    $id = $_GET['desuspend'];
    mysqli_query($con, "UPDATE members SET status='1' WHERE id='$id'");
    $_SESSION['message'] = '<div class="alert alert-success">
    <strong>Successful!</strong> User has been desuspended to use the system.</div>';
    header('location: units.php');


}
*/
?>