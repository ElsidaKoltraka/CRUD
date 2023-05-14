<?php
require_once("clientAdd.php");
$newClient = new clientAdd();
// $date = date('y-m-d');


if (isset($_POST['save_client'])) {
    require_once("clientAdd.php");
    $newClient = new clientAdd();
    $newClient->setName($_POST['first_name']);
    $newClient->setSurname($_POST['last_name']);
    $newClient->setMobile($_POST['mobile']);
    $newClient->setEmail($_POST['email']);
    //$newClient->setOperating_field($_POST['operating_field']);
    $newClient->setAddress($_POST['address']);
    //$newClient->insertDataOperatingField();
    $newClient->insertData();
    //echo "<script> alert('Data Created- Successfully');document.location='index.php'</script>";
}
