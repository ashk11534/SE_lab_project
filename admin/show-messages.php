<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css">
<?php include('../includes/db_connect.php'); ?>
<?php
    if(isset($_SESSION['delete'])){
        ?>
         <p class="text-center font-weight-bold vanish" style="color: #2ed573; background: #333; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['delete']; ?></p>
        <?php
        unset($_SESSION['delete']);
    }
?>
<script>
    const p = document.querySelector('.vanish');
    setTimeout(() => {
        p.parentNode.removeChild(p);
    }, 3000);
</script>
<?php
        $sql = 'SELECT * FROM messages ORDER BY message_id DESC';
        $res = mysqli_query($conn, $sql);
       
        if($res == TRUE){
            $count = mysqli_num_rows($res);
            ?>
            <div class="container-fluid">
            <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
            <?php
            if($count > 0){
                while($row = mysqli_fetch_assoc($res)){ // $row = ['admin_first_name'=>'joy', 'admin_last_name'=>'mojumdar']
                    $message_id = $row['message_id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $message = $row['message_body'];
                    ?>
                        <tr>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $message; ?></td>
                            <td><a href="<?php echo ADMIN_PATH; ?>message-delete.php?message_id=<?php echo $message_id; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                }
                
            }
            else{
                echo "<tr>
                        <td colspan='7' style='text-align: center;'>
                            <h2>No New Messages Available</h2>
                        </td>
                     </tr>";
            }
            ?>
            </table>
            </div>
            <?php
        }

    ?>