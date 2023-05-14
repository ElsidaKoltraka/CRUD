<?php
//session_start();
require_once "clientAdd.php";
$fetch_data = new clientAdd();
// $all = $fetch_data->fetchAllOperatingField();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Add client's data
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="add_client.php" method="POST">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label"> First Name</label>
                                <input type="text" name="first_name" class="form-control" id="validationCustom01" required>

                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label"> Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="validationCustom02" required>
                                </div>

                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"> mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="validationCustomUsername" required>
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"> Email</label>
                                    <input type="text" name="email" class="form-control" id="validationCustomUsername" required>
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label"> Address</label>
                                    <input type="text" name="address" class="form-control" id="validationCustomUsername" required>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="validationCustom04"> operating field options</label>
                                <select name="operating_field_id" class="" id="validationCustom04" required>
                                    <?php foreach ($all as $key => $val) {
                                        //print_r($all);
                                        $id = $val['operating_id'];
                                        $value =  $val['operating_field'];

                                        echo "<option value='$id'>" . $value . "</option>";
                                    }
                                    ?>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <button type="submit" name="save_client" class="btn btn-primary float-end">Save Client's Data</button>
                            </div>
                    </div>



                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>