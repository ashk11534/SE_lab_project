<?php include('../includes/db_connect.php'); ?>

<?php
    if(isset($_GET['message_id'])){
        $message_id = $_GET['message_id'];
    }
    $sql = "DELETE FROM messages WHERE message_id='$message_id'";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE){
        $_SESSION['delete'] = 'Message deleted successfully.';
        header('location:'.ADMIN_PATH.'show-messages.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to delete.';
        header('location:'.ADMIN_PATH.'show-messages.php');
    }
?>