<?php
include 'template/core/auth.php';
?>
<?php
include 'template/header.php';
global $url;
?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-list  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Post List</h4>
                    </div>
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php"
                            class="feather-plus-circle btn btn-outline-primary"></a>
                        <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>
                    </div>
                </div>
                <hr>
                <table class="table table-hover table-bordered mt-5 mb-0 table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php
                            if ($_SESSION['user']['role'] == 0) {
                            ?>
                            <th>User</th>
                            <?php } ?>
                            <th>Viewer Count</th>
                            <th>Control</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (posts() as $c) {
                        ?>
                        <tr class=" <?php echo $c['ordering']==1? "table-info" :'' ?> ">
                            <td><?php echo $c['id']; ?></td>
                            <td class="text-nowrap"><?php echo short($c['title']); ?></td>
                            <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>
                            <td class="text-nowrap"><?php echo category($c['category_id'])['title']; ?></td>
                            <?php
                            if(isset(user($c['user_id'])['name']))
                            {
                                if ($_SESSION['user']['role'] == 0) {
                                ?>
                            <td>
                                <?php
                                        echo (user($c['user_id'])['name']);
                                        ?>
                            </td>

                            <?php }} else{ ?>
                                    <td>
                                        Unknown
                                    </td>
                                <?php } ?>


                            <td>
                                <?php
                                echo count(viewerCountByPost($c['id']));
                                ?>

                            </td>
                            <td class="text-nowrap">
                                <a href="post_detail.php?id=<?php echo $c['id']; ?>"
                                    class="btn btn-outline-info feather-info btn-sm"></a>
                                <a href="post_delete.php?id=<?php echo $c['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                    class="btn btn-outline-danger feather-trash btn-sm"></a>
                                <a href="post_edit.php?id=<?php echo $c['id']; ?>"
                                    class="btn btn-outline-success feather-edit-2 btn-sm"></a>

                                <?php if($c['ordering']!=1){
                                        ?>
                                <a href="post_pin_to_top.php?id=<?php echo $c['id'];?>"
                                    class="btn btn-outline-info feather-upload btn-sm"></a>
                                <?php } else {?>
                                <a href="post_remove_pin.php?id=<?php echo $c['id'];?>"
                                    class="btn btn-outline-warning feather-arrow-down btn-sm"></a>
                                <?php } ?>
                            </td>
                            <td class="text-nowrap"><?php echo showTime($c['created_at']); ?></td>

                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>