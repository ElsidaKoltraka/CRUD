<!-- APPOINTMENT -->

<?php
require_once("clientAdd.php");
$edit_data = new clientAdd();
$id = $_GET['id'];

// Return current date from the remote server
$date = date('y-m-d h:i:s');


// $status = $edit_data->fetchAllStatusField();
// $contact_form = $edit_data->fetchAllContactForm();



$edit_data->setID($id);

if (isset($_POST['detailsAdd'])) {

    $edit_data->setStartTime($_POST['start_time']);
    $edit_data->setNote($_POST['notes']);
    $edit_data->setEndTime($_POST['end_time']);
    $edit_data->setID($id);

    $edit_data->setClientId($id);
    // $edit_data->setStatus($_POST['status']);
    $e = $edit_data->insertAppointmentDetails();
    print_r($e);
    exit;
    echo "<script> alert('Details inserted0 Successfully');document.location='index.php'</script>";
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Edit Client's Data
                            <a href="index.php" class="btn btn-success float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php /* 
                        if(isset($_GET['id'])) {
                            // echo    $client_id=$_GET['id'];
                            $client_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM clients WHERE id='$client_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $client= mysqli_fetch_array($query_run);
                                */ ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="id" class="form-control">

                            </div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="hidden" name="client_id" class="form-control">

                                </div>

                                <div class="mb-3">
                                    <label>Notes</label>

                                    <input type="text" name="notes" class="form-control">
                                </div>



                                <div class="mb-3">
                                    <label>START TIME</label>

                                    <input type="date" name="end_time" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>END TIME</label>

                                    <input type="date" name="start_time" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="detailsAdd" class="btn btn-primary">Update Client's Data</button>
                                </div>
                            </form>
                            <?php


                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>