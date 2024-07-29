<?php
include '../includes/connection.php';

if (isset($_GET['delete'])) {

    $user_id = $_GET['delete'];

    // Delete related records in the attendance table first
    $delete_attendance_query = "DELETE FROM attendance WHERE user_id = '$user_id'";
    $delete_attendance_conn = mysqli_query($connection, $delete_attendance_query);

    if (!$delete_attendance_conn) {
        die("Failed to delete related attendance records! " . mysqli_error($connection));
    }
 
    // Now delete the user
    $delete_user_query = "DELETE FROM users WHERE user_id = '$user_id'";
    $delete_user_conn = mysqli_query($connection, $delete_user_query);

    if ($delete_user_conn) {
        header("Location: ../admin/users.php");
    } else {
        die("User is not deleted! " . mysqli_error($connection));
    }
}
?>
