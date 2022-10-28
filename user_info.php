<?php
include 'template/core/auth.php';
?>
<?php
include 'template/header.php';
?>
<?php global $url ?>

<?php
$id = $_GET['id'];
$current = user($id);
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    echo $current['name'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-eye  text-primary h4 mr-2"> </i>
                        <h3 class="mb-0">Viewed posts</h3>
                    </div>
                    <div class="">
                        <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (viewerCountByUser($id) as $vc) {
                        ?>
                        <tr>
                            <td class="text-nowrap text-capitalize">
                                <?php
                                    echo $current['name'];
                                    ?>
                            </td>
                            <td>
                                <?php
                                    echo post($vc['post_id'])['title'];
                                    ?>
                            </td>
                            <td class="text-nowrap">
                                <?php echo showTime($vc['created_at']); ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>