<?php
    require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <title>Data of employed</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <td class="tb-title">Id</td>
                    <td class="tb-title">First name</td>
                    <td class="tb-title">Middle name</td>
                    <td class="tb-title">Last name</td>
                    <td class="tb-title">Email</td>
                    <td class="tb-title">Phone number</td>
                    <td class="tb-title">Date of birth</td>
                    <td class="tb-title">Degree</td>
                    <td class="tb-title" colspan="2" style="width: 50px;">Operations</td>
                </tr>
            </thead>
            <?php
                $select_query = "SELECT * FROM emp_data";

                $select_run = mysqli_query($connection, $select_query);

                if($select_run) {

                    while ($result = mysqli_fetch_array($select_run)) {
                    ?>
                        <thead>
                            <td class="td-result"><?php echo $result['id']; ?></td>
                            <td class="td-result"><?php echo $result['first_name']; ?></td>
                            <td class="td-result"><?php echo $result['middle_name']; ?></td>
                            <td class="td-result"><?php echo $result['last_name']; ?></td>
                            <td class="td-result"><?php echo $result['email']; ?></td>
                            <td class="td-result"><?php echo $result['phone_number']; ?></td>
                            <td class="td-result"><?php echo $result['date_of_birth']; ?></td>
                            <td class="td-result"><?php echo $result['degree']; ?></td>
                            <td class="td-result"><a href="update.php?id=<?php echo $result['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a></td>
                            <td class="td-result"><a href="delete.php?id=<?php echo $result['id']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a></td>
                        </thead>
                    <?php
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>
