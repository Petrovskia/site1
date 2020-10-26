<h4>Gallery</h4>
<form action="index.php?page=3" method="post">
    <label for="ext">Select ext:
        <select name="ext" id="ext">
            <option value="" selected disabled hidden>Choose ext</option>
            <?php
            $path = 'images/';
            if($dir = opendir($path)) {
                $ar = [];
                while($file = readdir($dir)) {
                    // получаем расширение файла и делаем в нижнем регистре
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                    // проверяем, нет ли расширения в массиве
                    if(!in_array($ext, $ar) and $ext !== '') {
                        $ar[] = $ext; // аналог append в js, т.е. добавления в конец массива
                        echo "<option>$ext</option>";
                    }
                }
                closedir($dir);
            }
            ?>
        </select>
    </label>

    <button type="submit" name="submit" class="btn btn-primary">Show images</button>
</form>
<?php

if(isset($_POST['submit'])) {
    $ext = $_POST['ext']; // name селекта
    $ar = glob("$path*.$ext"); // ищем изображения выбранного расширения
    foreach ($ar as $a) {
        echo "<img src=$a width='130px' height='100px'>";
    }
} else {
    $ar = glob("$path*.*");
     foreach ($ar as $a) {
         echo "<img src=$a width='130px' height='100px'>";
     }
}

