<?php

    require "connection.php";

    $id = $_GET['id'];

    $delete_query = "DELETE FROM emp_data WHERE id = $id";

    $delete_run = mysqli_query($connection, $delete_query);

    ?>
        <script>
            alert("Record delete successufully");
            window.location.replace("data.php");
        </script>
    <?php

?>