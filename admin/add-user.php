<?php
include 'partials/header.php';


// get back form data if there was an error
$firstname = $_SESSION['add-user-data']['firstname']??null;
$lastname = $_SESSION['add-user-data']['lastname']??null;
$username = $_SESSION['add-user-data']['username'] ??null;
$email = $_SESSION['add-user-data']['email'] ??null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ??null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ??null;

// delete session data
unset($_SESSION['add-user-data']);
?>


    <section class="form__section" style="margin-bottom: 7rem;">
        <div class="container form__section-container">
            <h2>Add User</h2>
           <?php if(isset($_SESSION['add-user'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>

           <?php endif ?>
            <form action="<?=ROOT_URL?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword?>" placeholder="Create Password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm Password">
                <select name="userrole" >
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form__control">
                    <label for="avatar">User avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer__socials">
            <a href="http://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
            <a href="http://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
            <a href="http://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
            <a href="http://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">Programming</a></li>
                    <li><a href="">Designing</a></li>
                    <li><a href="">Editing</a></li>
                    <li><a href="">Testing</a></li>
                    <li><a href="">Hosting</a></li>
                    <li><a href="">Publishing</a></li>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Call Numbers</a></li>
                    <li><a href="">Emails</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Categories</a></li>
                    <li><a href="">Food</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; 2023 ArrayBlogs</small>
        </div>
        <?php
include '../partials/footer.php';
 ?>