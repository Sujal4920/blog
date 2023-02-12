<?php
// comment  section
 if(isset($_POST['post_comment'])){

    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO comments (name,message) VALUES ('$name', 'message')";

    if($conn->query($sql) == true){
        echo"";
    }else{
        echo "Error" . $sql . "<br>" . $conn->error;
    }

 }
?>