<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

if (isset($_POST['send'])) {
    $name = $_POST["empName"];
    $salary = $_POST["empSalary"];
    $phone = $_POST["empPhone"];
    $depId = $_POST["depId"];
    $insert = "INSERT INTO `employees` values(null,'$name',$salary,'$phone',$depId)";
    $insertEmployeeCheck =  mysqli_query($connication, $insert);
    // testMessage($insertEmployeeCheck, "insert");
    path('employees/create.php');
}
$selectDep = "SELECT * FROM department";
$departments = mysqli_query($connication,  $selectDep);
?>

<h1 class="text-center"> Add New Employees </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input class="form-control" type="text" name="empName">
                </div>
                <div class="form-group">
                    <label for="">Employee salary</label>
                    <input class="form-control" type="text" name="empSalary">
                </div>
                <div class="form-group">
                    <label for="">Employee phone</label>
                    <input class="form-control" type="text" name="empPhone">
                </div>
                <div class="form-group">
                    <label for="">Employee Department : </label>
                    <select class="form-control" type="text" name="depId">
                        <?php foreach ($departments as $data) { ?>

                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                        <?php  } ?>
                    </select>
                </div>

                <button name="send" class="btn btn-info"> Send </button>

            </form>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php';
?>