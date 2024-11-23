<?php
session_start();
include('src/config.php');

if ($_SESSION['log'] && $_SESSION['log']['role'] == 'admin') {
    if (isset($_POST['status'])) {
        $status = $_POST['status'] == 'open' ? 'open' : 'closed';
        $qry = mysqli_query($con, "UPDATE clinic_status SET status='$status', updated_at=NOW() WHERE id=1");

        if ($qry) {
            echo '<script>alert("Clinic status updated successfully."); window.location.href = "admin_status.php";</script>';
        } else {
            echo '<script>alert("Failed to update clinic status. Please try again.");</script>';
        }
    }

    $result = mysqli_query($con, "SELECT status FROM clinic_status WHERE id=1");
    $clinicStatus = mysqli_fetch_assoc($result)['status'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Admin Panel - Clinic Status</title>
        <?php include('src/head.php') ?>
    </head>
    <body>
        <?php include('src/header.php') ?>
        <div class="container">
            <h2>Change Clinic Status</h2>
            <form method="post">
                <div>
                    <label>Current Status: <b><?php echo ucfirst($clinicStatus); ?></b></label>
                </div>
                <div>
                    <label for="status">Set Status:</label>
                    <select id="status" name="status">
                        <option value="open" <?php if ($clinicStatus == 'open') echo 'selected'; ?>>Open</option>
                        <option value="closed" <?php if ($clinicStatus == 'closed') echo 'selected'; ?>>Closed</option>
                    </select>
                </div>
                <button type="submit">Update Status</button>
            </form>
        </div>
        <?php include('src/incfooter.php') ?>
    </body>
    </html>
    <?php
} else {
    header('Location: signin.php');
}
?>
