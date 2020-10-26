<h4>Login</h4>
<?php
if(!isset($_POST['logbtn'])) {
?>
    <form action="index.php?page=5" method="post">
        <div class="form-group">
            <label for="login">Login:
                <input type="text" class="form-control" name="login" id="login">
            </label>
        </div>

        <div class="form-group">
            <label for="pass">Password:
                <input type="password" class="form-control" name="pass" id="pass">
            </label>
        </div>

        <input type="submit" value="Login" name="logbtn" class="btn btn-primary">
    </form>
<?php
} else {
    if(login($_POST['login'], $_POST['pass'])) {
        echo "<h3 class='text-success'>Welcome, {$_SESSION['registered_user']}</h3>";
    }
}