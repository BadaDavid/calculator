<?php
    session_start();
    $link = mysqli_connect('localhost','root','08061646761','job');

    if (isset($_POST['register'])) {
        $name= $_POST['name'];
        $experience_years= $_POST['experience_years'];
        $salary= $_POST['salary'];
        $job_type= $_POST['job_type'];
        $job_title= $_POST['job_title'];

        $sql_check = "SELECT * FROM application_form WHERE name = '$name'";
        $check = mysqli_query($link, $sql_check);
        while ($row_check = mysqli_fetch_assoc($check)) {
            $find = $row_check['name'];
        }
        if($find !=""){
            echo("<script>alert('$name is already registered')</script>");
        }
        else {
            $sql_insert = "INSERT INTO application_form (name, experience_years, salary, job_type, job_title) VALUES('$name','$experience_years','$salary', '$job_type', '$job_title')";
            $result_insert = mysqli_query($link, $sql_insert);
            // used to check for errors
            printf("Errormessage: %s/n", mysqli_error($link));

            if ($result_insert==true) {
                echo("<script>alert('$name has been successfully registered')</script>");
            }
            else{
                echo("<script>alert('Sorry an Error Occured During Submittion, Please Contact Admin on 08105255648')</script>");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="plugins/bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="plugins/animate/animate.min.css">
        <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="plugins/wow/wow.min.js">
    </head>
    <body>
        <form action="" method="POST" name="registration_form" class="col-md-8 py-5 my-2 mx-auto border">
            <h5 class="text-center">REGISTRATION FORM</h5>
            <label for="name" class="form-label">Full Name:</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Fullname">
            <br><br>
            <label for="job" class="form-label">Job Title:</label>
            <input type="text" name="job_title" id="" class="form-control" placeholder="Enter Job Description">
            <br><br>
            <label for="experience" class="form-label">Years of Experience:</label>
            <input type="number" name="experience_years" id="" class="form-control" placeholder="Enter Years Of Experience">
            <br><br>
            <label for="salary" class="form-label">Salary:</label>
            <input type="text" name="salary" id="" class="form-control" placeholder="Enter Salary">
            <br><br>
            <label for="job_type" class="form-label">Job Type:</label>
            <select name="job_type" id="" class="form-control">
                <option value="" selected disabled class="">Job Type</option>
                <option value="full" class="">Full Time</option>
                <option value="full" class="">Part Time</option>
            </select>
            <br><br>
            <input type="submit" value="Register" class="btn btn-success col-5" name="register">

        </form>

        <script src="plugins/bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script>
            new WOW().init()
        </script>
        
        </body>
</html>