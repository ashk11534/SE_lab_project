<?php 
    include('tenant/includes/db_connect.php'); 
?>

<?php
    if(isset($_POST['first_name']) and isset($_POST['last_name']) and 
    isset($_POST['phone']) and isset($_POST['email']) and isset($_POST['message'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO messages SET
                first_name = '$first_name',
                last_name = '$last_name',
                phone = '$phone',
                email = '$email',
                message_body = '$message'
            ";
        $res = mysqli_query($conn, $sql);
        // echo $res2;
        if($res == TRUE){
            // echo 'Flat Added successfully';
            $_SESSION['message-success'] = 'Message received by the admin';
            header('location:'.HOME_PATH);
        }
        else{
            // echo 'Failed to add flat';
            $_SESSION['message-failed'] = 'Failed to send message';
            header('location:'.HOME_PATH);
        }
    }
    else{
        $_SESSION['message-failed'] = 'You have to fill up all informations';
    }
?>