<h4>Registration</h4>
<?php
if(!isset($_POST['regbtn'])) {
?>
<form action="index.php?page=4" method="post">
    <div class="form-group">
        <label for="login">Login:
            <input type="text" id="login" class="form-control" name="login" required autocomplete="off">
        </label>
    </div>

    <div class="form-group">
        <label for="pass1">Password:
            <input type="password" id="pass1" class="form-control" name="pass1" required>
        </label>
    </div>

    <div class="form-group">
        <label for="pass2">Password confirm:
            <input type="password" id="pass2" class="form-control" name="pass2" required>
        </label>
    </div>

    <div class="form-group">
        <label for="email">Email:
            <input type="email" id="email" class="form-control" name="email" required>
        </label>
    </div>

    <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
</form>
<?php
} else {
    if(register($_POST['login'], $_POST['pass1'], $_POST['email'])) {
        echo "<h3 class='text-success'>User has been added</h3>";
    }
}
