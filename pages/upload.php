<h4>Upload</h4>
<?php
if(!isset($_POST['uppbtn'])) {
?>

<form action="index.php?page=2" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="myfile">Choose picture:
            <input type="file" id="myfile" class="form-control-file" name="myfile" accept="image/*">
        </label>
    </div>
    <button type="submit" class="btn btn-primary" name="uppbtn">Send file</button>
</form>

<?php
} else {
    if($_FILES['myfile']['error'] != 0) {
        echo '<h3 class="text-danger">'. $_FILES['myfile']['error'] .'</h3>';
        exit; //  прерывает дальнейшее выполнение кода (аналог в функции - return false)
    }

    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        move_uploaded_file($_FILES['myfile']['tmp_name'], "images/".$_FILES['myfile']['name']);
        echo "<h3 class='text-success'>Image has been uploaded</h3>";
    }
}