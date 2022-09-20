<?php
include '../genral/env.php';
include '../genral/functions.php';
include '../shared/header.php';
include '../shared/nav.php';



if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $selectEmployee = "SELECT * FROM `joindata` where empId =$id ";
    $employee =   mysqli_query($connication, $selectEmployee);
    $row = mysqli_fetch_assoc($employee);

    if (isset($_POST['update'])) {
        $name = $_POST["empName"];
        $salary = $_POST["empSalary"];
        $phone = $_POST["empPhone"];
        $depId = $_POST["depId"];
        $update = "UPDATE employees SET name ='$name' ,salary=$salary , phone='$phone',departmentId=$depId where id =$id";
        mysqli_query($connication, $update);
        header("location: index.php");
    }
}

$selectDep = "SELECT * FROM department";
$departments = mysqli_query($connication,  $selectDep);
?>

<h1 class="text-center"> Update Employees </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input class="form-control" value="<?=  $row['empName'] ?>" type="text" name="empName">
                </div>
                <div class="form-group">
                    <label for="">Employee salary</label>
                    <input class="form-control"   value="<?=  $row['salary'] ?>" type="text" name="empSalary">
                </div>
                <div class="form-group">
                    <label for="">Employee phone</label>
                    <input class="form-control" value="<?=  $row['phone'] ?>" type="text" name="empPhone">
                </div>
                <div class="form-group">
                    <label for="">Employee Department : </label>
                    <select class="form-control" type="text" name="depId">
                        <option disabled  selected value="<?= $row['depid'] ?> "> <?= $row['depName'] ?>  </option>
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