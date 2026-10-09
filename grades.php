


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Enroll History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enroll History
                        </div>
                        <!-- /.panel-heading -->
                        

    <form method="post">
        <!-- Displays all users in database in a select option -->
        <select name="students">
            <option>Student 1</option>
            <option>Student 2</option>

            <?php
                //This code below is what you will need to use for yours to pull values out of the database(changing the values to suit yours obviously).

                // $query = "SELECT * FROM students ORDER BY student_name ASC";
                // $result = mysqli_query($conn,"$query");

                // while($row = mysqli_fetch_assoc($result)){
                //     echo "<option>" . $row['student_name'] . "<br></option>";
                // }
            ?>

        </select><br>

        <!-- All the different input fields for maths, english and science -->

        <input type="text" name="eng_grade" value="" placeholder="Enter English Grade"><br>
        <input type="text" name="math_grade" value="" placeholder="Enter Maths Grade"><br>
        <input type="text" name="science_grade" value="" placeholder="Enter Science Grade"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php 

        //If submit is pressed
        if (isset($_POST['submit'])) {

            //this gets the value of the student name from the select box and stores it as $student
            $student = $_POST['students'];

            //These gets the values stored in the inputs above and store them in the 3 vairables
            $english = $_POST['eng_grade'];
            $maths = $_POST['math_grade'];
            $science = $_POST['science_grade'];

            //this is a mysql query that updates the data with whatever you put into the database(to add to existing tables you will have to dig abit deeper and create your
            //database with all the correct fields!
            $query = "UPDATE students SET maths_grade = '$maths', $english_grade = '$english', science_grade = '$science' WHERE student_name = '$student'";
            $update = mysqli_query($conn,  "$query"); //<-- this inserts the values into the database, changing the current #null value (null means nothing is in it)
        }

    ?>
</body>
</html>

