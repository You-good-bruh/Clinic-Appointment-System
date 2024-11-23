<?php
include('src/config.php');
include('src/session_check.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE test_appointment SET status='rejected' WHERE Test_time='$id'";
    
    if(mysqli_query($con, $query)) {
        header('Location: upload.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    header('Location: upload.php');
}
?>
