<?php session_start(); ?>
<?php require_once 'front_panel/head.php' ?>
<title>Home</title>
<?php require_once 'front_panel/side-header.php' ?>
<?php global $url ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $current = post($id);
}
else{
    linkTo('index.php');
}
if(!$current){

    linkTo('index.php');

}

    $currentCategory = $current['category_id'];
if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];
} else {
    $userId = 0;
}

viewerRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post Details</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <div class="">
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
                            <i
                                class="feather-layers text-success"></i><?php echo category($current['category_id'])['title']; ?>
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
            <div class="row">
                <?php
                foreach (fPostByCategory($currentCategory, 2, $id) as $p) {
                ?>
                <div class="col-6">
                    <div class="card shadow-sm my-3 post">
                        <div class="card-body">
                            <a href="detail.php?id=<?php echo $p['id']; ?>" class="text-primary text-decoration-none">
                                <h4><?php echo $p['title']; ?></h4>
                            </a>
                            <div class="">
                                <i class="feather-user text-primary"></i>
                                <?php
                                if(isset(user($current['user_id'])['name']))
                                    echo user($current['user_id'])['name'];
                                else
                                    echo "Unknown"
                                ?>
                                <i
                                    class="feather-layers text-success"></i><?php echo category($p['category_id'])['title']; ?>
                                <i
                                    class="feather-calendar text-danger"></i><?php echo date('j M Y',strtotime($p['created_at'])); ?>
                            </div>
                            <p class="text-black-50 my-3">
                                <?php echo short(strip_tags(html_entity_decode($p['description'])),200); ?></p>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>

            </div>
        </div>

        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>


<?php require_once 'front_panel/foot.php' ?>