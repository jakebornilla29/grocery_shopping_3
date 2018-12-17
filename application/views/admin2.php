<?php include "include/head_admin2.php";?>
<?php include "include/head_admin.php";?>

    <br/><br/>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Dish Image</th>
            <th>Dish Name</th>
            <th>Dish Category</th>
            <th>Dish description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if(isset($dish)){
                foreach ($dish as $row){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row->d_id ?></th>
                        <td><img height="250px" width="250px" src="<?php echo base_url() ?>uploads/<?php echo $row->file_name ?>"></td>
                        <td><?php echo $row->dish_name ?></td>
                        <td><?php echo $row->dish_category ?></td>
                        <td><?php echo $row->dish_des ?></td>
                        <td><a href="<?php echo base_url('Admin2/editDish?id='.$row->d_id) ?>"><span style="color: green;" class="fa fa-pencil"></span></a></td>
                        <td><a href="<?php echo base_url('Admin2/delDish?id='.$row->d_id) ?>"><span style="color: red;" class="fa fa-trash"></span></a></td>
                    </tr>
                    <?php
                }
            }
        ?>

        </tbody>
    </table>

    <?php include "include/footer2.php";?>