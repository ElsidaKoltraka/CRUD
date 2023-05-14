<?php

require_once "clientAdd.php";
$user_data = new clientAdd();
$all = $user_data->fetchAll();
// print_r($all);
// exit;
$results = $user_data->search();
// print_r($results);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#hide").click(function() {
                $(".card-body1").hide(100020);
                $(".card-body").show();
                location.reload(true);
            });
            $("#show").click(function() {
                $(".card-body1").show();
                $(".card-body").hide(100020);


            });
        });
    </script>
    <script src="searchBar.js"></script>
</head>

<body>
    <div class="container mt-5">
        <?php

        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <form action="index.php" method="post">
                            <input type="text" placeholder=" Search for clients" name="key">
                            <button id="show" type="submit" value="submit" name="submit">Show</button>
                            <button id="hide">Hide</button>

                        </form>
                    </div>
                    <div class="card-header">
                        <h4> Client Details
                            <a href="user-create.php" class="btn btn-info float-end"> Add New Client</a>
                            </Details>
                        </h4>
                    </div>


                    <!-- IF THE SUBMIT BUTTON IS NOT CLICK, ALL RESULTS WILL BE SHOWN -->
                    <?php if (!isset($_POST['submit'])) { ?>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($all as $key => $val) {
                                    ?>
                                        <tr>
                                            <td><?= $val['id']; ?></td>
                                            <td><?= $val['first_name']; ?></td>
                                            <td><?= $val['last_name']; ?></td>
                                            <td><?= $val['mobile']; ?></td>
                                            <td><?= $val['email']; ?></td>

                                            <td><?= $val['address']; ?></td>
                                            <td>
                                                <a href="client-view.php?id=<?= $val['id']; ?>" class="btn btn-info btn-sm">View Details</a>
                                                <a href="client-edit.php?id=<?= $val['id'] ?>" class="btn btn-success btn-sm">Edit Client Details</a>
                                                <a href="Appointment.php?id=<?= $val['id'] ?>" class="btn btn-success btn-sm">New Appointment</a>
                                                <form action="code.php " method="POST" class="d-inline">
                                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $val['id'] ?>&req=delete">Delete</a>

                                                </form>
                                            </td>
                                        </tr><?php


                                            } ?>
                                </tbody>
                            </table>
                        </div>


                    <?php }
                    /*<!-- IF THE SUBMIT BUTTON IS  CLICKED,ONLY THE RESULTS WE ARE LOOKING FOR WILL BE SHOWN -->*/ else {
                        $key = $_POST['key'];
                        $user_data->setKey($_POST['key']);
                        $results = $user_data->search();
                        $rows = $user_data->rowCount1();


                    ?>

                        <div class="card-body1">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($rows != 0) {
                                        foreach ($results as $key => $val) {
                                    ?>

                                            <tr>
                                                <td><?= $val['id']; ?></td>
                                                <td><?= $val['first_name']; ?></td>
                                                <td><?= $val['last_name']; ?></td>
                                                <td><?= $val['mobile']; ?></td>
                                                <td><?= $val['email']; ?></td>
                                                <td><?= $val['address']; ?></td>
                                                <td>
                                                    <a href="client-view.php?id=<?= $val['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="client-edit.php?id=<?= $val['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="detailsAdd.php?id=<?= $val['id'] ?>" class="btn btn-success btn-sm">Add details</a>
                                                    <form action="code.php " method="POST" class="d-inline">
                                                        <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $val['id'] ?>&req=delete">Delete</a>

                                                    </form>
                                                </td>
                                            </tr><?php


                                                }
                                            } else {
                                                echo '<h4 class="text-danger"> no results</h4>';
                                            }  ?>
                                    <tr>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>

</html>