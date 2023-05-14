<?php
require_once("clientAdd.php");
$newClient = new clientAdd();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req'] == "delete") {

        $newClient->setID($_GET['id']);
        $newClient->deleteAppointment();

        echo "<script> alert('Data Deleted Successfully');document.location='index.php'</script>";
    }
}
