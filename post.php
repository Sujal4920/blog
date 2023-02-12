<?php
include 'partials/header.php';

// fetch posts from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id"; 
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);

} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}

if(isset($_POST['post_comment'])){

    $name = $_POST['name'];
    $message = $_POST['message'];
    $blog = $post['id'];

    $sql = "INSERT INTO comments (name,message,blog) VALUES ('$name', '$message','$blog')";

    if($connection->query($sql) === TRUE){
        echo "";
    }else{
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}
?>
<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
            <?php
            // fetch author from users table using author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);

            ?>
            <div class="post__author-avatar">
                <img src="./images/<?= $author['avatar'] ?>">
            </div>
            <div class="post__author-info">
                <h5>BY: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                <small>
                    <?= date("M d, Y - h:i", strtotime($post['date_time'])) ?>
                </small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail']?>">
        </div>
        <p>
           <?= $post['body'];?>
        </p>
        <div class="wrapper">
            <form action = "" method="POST" class="form">
                <label><b>Comment Section</b></label>
                <input type = "text" class="name" name="name" placeholder="Name" >
                <textarea name="message" cols="30" rows="2" class="message" placeholder="Comment" ></textarea>
                <button type="submit" name="post_comment" class="btn">Post Comment</button>
            </form>
        </div>
        <div class="content">
            <?php 
            $b = $post['id'];
            $sql = "SELECT * FROM comments WHERE blog = $b";
            $result = $connection->query($sql);

            if($result->num_rows > 0){
                // output data of each row
                while($row = $result->fetch_assoc()){
            
            ?>
            <h3><?php echo $row['name'];?></h3>
            <p><?php echo $row['message'];?></p>
            <?php } } ?>
        </div>
    </div>
</section>
<!-- ============================================END OF SINGLE POSTS=========================================== -->
<?php
include 'partials/footer.php';
?>