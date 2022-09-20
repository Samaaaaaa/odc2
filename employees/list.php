<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';
$select = "SELECT * FROM `joindata`";
$s = mysqli_query($connication,  $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM employees WHERE id =$id ";
    mysqli_query($connication, $delete);
path('employees/list.php#return');
}
?>
<h1 class="text-center"> list Employees</h1>
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th> id </th>
                        <th> Name </th>
                        <th> Salary </th>
                        <th> Phone </th>
                        <th> Dempartment </th>
                        <TH> action</TH>
                    </tr>
                    <?php foreach ($s as $data) { ?>
                        <tr id="return">
                            <td><?= $data['empId'] ?> </td>
                            <td><?= $data['empName'] ?> </td>
                            <td><?= $data['salary'] ?> </td>
                            <td><?= $data['phone'] ?> </td>
                            <td><?= $data['depName'] ?> </td>
                            <td> <a class="btn btn-info" href="/odc2/employees/update.php?edit=<?= $data['empId'] ?>"> Update </a> </td>
                            <td> <a onclick="return confirm('are u sure !!')" class="btn btn-danger" href="/odc2/employees/list.php?delete=<?= $data['empId'] ?>"> Delete </a> </td>
                        </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>

    </div>


<?php

include '../shared/footer.php'
?>