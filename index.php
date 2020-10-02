<?php
    require "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <h3>Insert the data</h3>
    <div class="container">
        <form method="post">
            <table>
                <tr>
                    <br>
                    <input type="text" name="fname" class="box" placeholder="First Name" required>
                </tr>
                <tr>
                    <br>
                    <input type="text" name="mname" class="box" placeholder="Middle Name" required>
                </tr>
                <tr>
                    <br>
                    <input type="text" name="lname" class="box" placeholder="Last Name" required>
                </tr>
                <tr>
                    <br>
                    <input type="email" name="email" class="box" placeholder="Email" required>
                </tr>
                <tr>
                    <br>
                    <input type="number" name="phone_number" class="box" placeholder="Phone Number" required>
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
    if(isset($_POST['submit'])) {
        
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

        $insert_query = "INSERT INTO emp_data (first_name, middle_name, last_name, email, phone_number, date_of_birth, degree) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$phone_number', '$date_of_birth', '$degree')";

        $insert_run = mysqli_query($connection, $insert_query);

        if($insert_run) {
        ?>
            <script>alert("Record can insert successfully");</script>
        <?php
        } else {
        ?>
            <script>alert("Record cannot inserted");</script>
        <?php
        }
    }
?>
