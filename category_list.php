<?php
require_once 'template/core/auth.php';
?>
<?php require_once 'template/core/function.php'?>
<?php require_once 'template/header.php'?>
<?php require_once 'template/footer.php'?>


<table class="table table-hover mt-5 mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>User</th>
            <th>Control</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach(categories() as $c){
        ?>
        <tr class="<?php echo $c['ordering']==1? "table-info" :'' ?>">
            <td><?php echo $c['id'] ;?></td>
            <td><?php echo $c['title']; ?></td>
            <td>
                <?php 
                echo(user($c['user_id'])['name']);                                
                ?>
            </td>
            <td>
                <a href="category_delete.php?id=<?php echo $c['id'];?>"
                    onclick="return confirm('Are you sure you want to delete this category?')"
                    class="btn btn-outline-danger feather-trash btn-sm"></a>
                <a href="category_edit.php?id=<?php echo $c['id'];?>"
                    class="btn btn-outline-success feather-edit-2 btn-sm"></a>

                <?php if($c['ordering']!=1){
                        ?>
                <a href="category_pin_to_top.php?id=<?php echo $c['id'];?>"
                    class="btn btn-outline-info feather-upload btn-sm"></a>
                <?php } else {?>
                <a href="category_remove_pin.php?id=<?php echo $c['id'];?>"
                    class="btn btn-outline-warning feather-arrow-down btn-sm"></a>
                <?php } ?>

            </td>
            <td><?php echo showTime($c['created_at']); ?></td>

        </tr>

        <?php
            }
        ?>
    </tbody>
</table>