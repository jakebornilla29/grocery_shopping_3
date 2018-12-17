<?php include "include/head_admin2.php";?>
<?php include "include/head_admin.php";?>
<br/>
<div class="container">
    <div class="well">

        <?php echo form_open_multipart('Admin2/updateDish');

        if(isset($suc_mess)){
            echo '<div align="center" class="mainmenu-area"><b>'.$suc_mess. '</b></div>';
        }

        if(isset($edDish)){
        foreach ($edDish as $row){
        ?>

        <div class="form-group">
            <label for="">Dish Name:</label>
            <input type="text" value="<?php echo set_value('dish_name', $row->dish_name); ?>" name="dish_name" class="form-control" id="email">
            <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
        </div>

        <div class="form-group">
            <label for="">Dish category:</label>
            <input type="text" name="dish_cat" class="form-control" value="<?php echo set_value('dish_name', $row->dish_category); ?>" id="pwd">
        </div>

        <div class="form-group">
            <label for="">Dish Price:</label>
            <input type="text" name="dish_price" class="form-control" value="<?php echo set_value('dish_name', $row->dish_price); ?>" id="pwd">
        </div>

        <div class="form-group">
            <label for="">Dish Description:</label>
            <textarea class="form-control" name="dish_des" id="exampleTextarea" rows="5"><?php echo set_value('dish_name', $row->dish_des); ?></textarea>
        </div>

        <label for="">Previous Picture:</label><br/>
        <img height="350px" width="350px" src="<?php echo base_url() ?>uploads/<?php echo $row->file_name ?>">

        <br /><br />

        <input  type="submit" value="update" />

    </div>
</div>
<?php
form_close();
?>
<?php
}
}

?>


<?php include "include/footer2.php";?>


