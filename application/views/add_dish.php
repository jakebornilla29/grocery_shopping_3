<?php include "include/head_admin2.php";?>
<?php include "include/head_admin.php";?>
<br/>
<div class="container">
    <div class="well">

        <?php echo form_open_multipart('Admin2/add_dish');

            if(isset($error)){
                echo '<div align="center" class="mainmenu-area"><b>'.$error. '</b></div>';
            }

            if(isset($suc_mess)){
                echo '<div align="center" class="mainmenu-area"><b>'.$suc_mess. '</b></div>';
        }

        ?>

        <div class="form-group">
            <label for="">Dish Name:</label>
            <input type="text" name="dish_name" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="">Dish category:</label>
            <input type="text" name="dish_cat" class="form-control" id="pwd">
        </div>

        <div class="form-group">
            <label for="">Dish Recipe:</label>
            <textarea class="form-control" name="dish_recipe" id="exampleTextarea" rows="5"></textarea>
        </div>

        <div class="form-group">
        <label for="exampleInputFile">Upload File</label>
        <input type="file" class="form-control-file" name="userfile" size="20" />
        </div>

        <br /><br />

        <input  type="submit" value="upload" />

    </div>
</div>
<?php
    form_close();
?>

<?php include "include/footer2.php";?>

