<?php
//session_start();
require_once("clientAdd.php");
$edit_data = new clientAdd();
$id = $_GET['id'];

$edit_data->setID($id);
$record = $edit_data->fetchOne();
// print_r($record);
$val = $record[0];
if (isset($_POST['edit'])) {
    //  require_once("functions_oop.php");
    //  echo "<script> alert('Data Updated Successfully');document.location='index.php'</script>";}

    $edit_data->setName($_POST['first_name']);
    $edit_data->setSurname($_POST['last_name']);
    $edit_data->setMobile($_POST['mobile']);
    $edit_data->setEmail($_POST['email']);
    $edit_data->setAddress($_POST['address']);
    // $edit_data->insertData();
    echo $edit_data->update();
    echo "<script> alert('Data Updated Successfully');document.location='index.php'</script>";
}


//echo $val['registration_date'];

?>


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
                                <input type="hidden" name="id" value="<?php echo $val['id']; ?>" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label> First Name</label>

                                <input type="text" name="first_name" value="<?php echo $val['first_name']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Last name</label>
                                <input type="text" name="last_name" value="<?php echo $val['last_name']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Mobile</label>
                                <input type="text" name="mobile" value="<?php echo $val['mobile']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Email</label>
                                <input type="email" name="email" value="<?php echo $val['email']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Address</label>
                                <input type="text" name="address" value="<?php echo $val['address']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit" class="btn btn-primary">Update Client's Data</button>
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