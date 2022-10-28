<?php
include 'template/core/auth.php';
?>
<?php
include 'template/header.php';
?>
<?php global $url ?>

<?php
$id = $_GET['id'];
$current = post($id);
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    echo $current['title'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-info  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Post Detail</h4>
                    </div>
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php"
                            class="feather-plus-circle btn btn-outline-primary"></a>
                        <a href="<?php echo $url; ?>/post_list.php" class="feather-list btn btn-outline-primary"></a>
                    </div>
                </div>
                <hr>
                <h4>
                    <?php echo $current['title'] ?>
                </h4>
                <div class="">
                    <i class="feather-user text-primary"></i>
                    <?php
                    if(isset(user($current['user_id'])['name']))
                        echo user($current['user_id'])['name'];
                    else
                        echo "Unknown"
                    ?>
                    <i class="feather-layers text-success"></i><?php echo category($current['category_id'])['title']; ?>
                    <i
                        class="feather-calendar text-danger"></i><?php echo date('j M Y', strtotime($current['created_at'])); ?>
                </div>
                <div class="my-3">
                    <?php
                    echo html_entity_decode($current['description'], ENT_QUOTES);
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-eye  text-primary h4 mr-2"> </i>
                        <h3 class="mb-0"> Post Viewer</h3>
                    </div>
                    <div class="">
                        <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Who</th>
                            <th>Device</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (viewerCountByPost($id) as $vc) {
                        ?>
                        <tr>
                            <td class="text-nowrap text-capitalize">
                                <?php
                                    if ($vc['user_id'] == 0) {
                                        echo "Guest";
                                    } else {
                                        echo user($vc['user_id'])['name'];
                                    }
                                    ?>
                            </td>
                            <td>
                                <?php echo $vc['device']; ?>
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