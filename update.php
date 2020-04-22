<?php

    require "connection.php";

    $num = $_GET['id'];

    $select = "SELECT * FROM emp_data WHERE id = $num";

    $select_run = mysqli_query($connection, $select);

    if ($select_run) {
        $data = mysqli_fetch_array($select_run);
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body{
            background-color: beige;
            font-size: 30px;
            font-family: verdana;
            color: brown;
            margin: 0;
            padding: 0;
        }
        ::placeholder{
            font-family: verdana;
            text-align: center;
        }
        h3{
            text-align: center;
            font-style: italic;
        }
        .container{
            background-color: white;
            height: 470px;
            width: 400px;
            margin-left: 30%;
        }
        .box{
            height: 20px;
            width: 200px;
            margin-left: 40px;
            margin-bottom: 10px;
        }
        .opt{
            height: 30px;
            width: 75px;
            margin-left: 10px;
            font-family: verdana;
        }
        .btn{
            color: white;
            font-family: verdana;
            background-color: #7f23a5;
            border: 2px solid #7f23a5;
            border-radius: 5px;
            height: 30px;
            width: 70px;
            margin-left: 40px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h3>Update the data</h3>
    <div class="container">
        <form method="post">
            <table>
                <tr>
                    <br>
                    <input type="text" name="fname" class="box" placeholder="Fist Name" value="<?php echo $data['first_name']; ?>" required>
                </tr>
                <tr>
                    <br>
                    <input type="text" name="mname" class="box" placeholder="Middle Name" value="<?php echo $data['middle_name']; ?>" required>
                </tr>
                <tr>
                    <br>
                    <input type="text" name="lname" class="box" placeholder="Last Name" value="<?php echo $data['last_name']; ?>" required>
                </tr>
                <tr>
                    <br>
                    <input type="email" name="email" class="box" placeholder="Email" required value="<?php echo $data['email']; ?>">
                </tr>
                <tr>
                    <br>
                    <input type="number" name="phone_number" class="box" placeholder="Phone Number" value="<?php echo $data['phone_number']; ?>" required>
                </tr>
                <tr>
                    <br>
                    <select name="day" class="opt" style="margin-left: 40px" required>
                        <option selected disabled>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select name="month" class="opt" required>
                        <option selected disabled>Month</option>
                        <option value="jan">Jan</option>
                        <option value="feb">feb</option>
                        <option value="march">march</option>
                        <option value="aepril">Aepril</option>
                        <option value="may">May</option>
                    </select>
                    <select name="year" class="opt" required>
                        <option selected disabled>Year</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                    </select>
                </tr>
                <tr>
                    <br>
                    <select name="degree" class="opt" style="margin-left: 40px; margin-top: 20px" required>
                        <option selected disabled>Degree</option>
                        <option value="bca">BCA</option>
                        <option value="btech">BTECH</option>
                        <option value="mca">MCA</option>
                        <option value="mtech">MTECH</option>
                    </select>
                </tr>
                <tr>
                    <br>
                    <button type="submit" name="submit" class="btn">SUBMIT</button>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
    <?php
        if (isset($_POST['submit'])) {
            
            $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
            $middle_name = mysqli_real_escape_string($connection, $_POST['mname']);
            $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $phone_number = $_POST['phone_number'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $date_of_birth = $day . "/" . $month . "/" . $year;
            $degree = $_POST['degree'];
            
            $update_query = "UPDATE emp_data SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', email = '$email', date_of_birth = '$date_of_birth', degree = '$degree' WHERE id = $num";

            $update_run = mysqli_query($connection, $update_query);

            if($update_query) {
            ?>
                <script>
                    alert("Record can update successfully");
                    window.location.replace("data.php");
                </script>
            <?php
            }
        }
    }
    
?>