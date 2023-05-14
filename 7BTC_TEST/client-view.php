<?php
require_once "clientAdd.php";
$show_data = new clientAdd();
$id = $_GET['id'];
//echo $id;
$show_data->setID($id);
$record1 = $show_data->fetchOne($id);
//$record1=$show_data->fetchAll();
// print_r($record1);
$record = $show_data->fetchClientDetails($id);
// print_r($record);
// exit;
//$show_data->fetchAll();
$val = $record[0];
$val1 = $record1;

$user_data = new clientAdd();
$all = $user_data->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Info
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        /*  if (isset($_GET['id'])) {
                            // echo    $client_id=$_GET['id'];
                            $client_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM client WHERE id='$client_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $client= mysqli_fetch_array($query_run);
                              */  ?>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label> Client Name :</label>
                                    <?= $val1['first_name']; ?>
                                </div>
                                <div class="mb-3">
                                    <label> Last name: </label>
                                    <?= $val1['last_name']; ?>
                                    </>
                                </div>

                                <div class="mb-3">
                                    <label> mobile: </label>

                                    <?= $val1['mobile']; ?>

                                </div>
                                <div class="mb-3">
                                    <label>email: </label>

                                    <?= $val1['email']; ?>

                                </div>
                                <div class="mb-3">
                                    <label>address: </label>
                                    <?= $val1['address']; ?>
                                </div>


                            </div>


                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <tr>
                                        <th scope="row"><label>id</label></th>
                                        <th scope="row"><label> client_id</label></th>
                                        <th scope="row"><label> notes</label></th>
                                        <th scope="row"><label> start_time</label></th>
                                        <th scope="row"><label> end_time</label></th>
                                        <th scope="row"><label>ACTION</label></th>

                                    </tr>
                                    <?php foreach ($record as $row => $val) {
                                    ?> <tr>
                                            <td> <?= $val['id']; ?></td>
                                            <td> <?= $val['client_id']; ?></td>
                                            <td> <?= $val['notes']; ?></td>
                                            <td> <?= $val['start_time']; ?></td>
                                            <td><?= $val['end_time']; ?></td>
                                            <td>
                                                <form action="code.php " method="POST" class="d-inline">
                                                    <a class="btn btn-danger btn-sm" href="deleteAppointment.php?id=<?= $val['id'] ?>&req=delete">Delete</a>

                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                            </div>
                            </table>
                        </div>

                    </div>



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