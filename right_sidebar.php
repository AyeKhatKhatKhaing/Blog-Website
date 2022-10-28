<div class="col-12 col-md-4">
    <div class="front-panel-right-sidebar">
        <div class="card">
            <div class="card-body">
                <?php global $url ?>

                <?php 
                if (isset($_SESSION['user'])) { ?>
                <p>Hi <b><?php echo $_SESSION['user']['name'] ?></b> </p>
                <a href="<?php echo $url; ?>/post_list.php" class="btn btn-primary">Go Dashboard</a>
                <?php } 
                else { ?>
                <p>Hi <b>Guest</b> </p>
                <a href="<?php echo $url; ?>/register.php" class="btn btn-primary">Register here</a>
                <?php } ?>
            </div>
        </div>
        <h4>Category List</h4>
        <div class="list-group">
            <a href="<?php echo $url; ?>/index.php"
                class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '' : 'active' ?>">All
                Categories</a>
            <?php
            foreach (fCategories() as $c) {
            ?>
            <a href="category_based_posts.php?category_id=<?php echo $c['id'] ?>" class="list-group-item list-group-item-action 
                <?php echo isset($_GET['category_id']) ? $_GET['category_id'] == $c['id'] ? 'active' : '' : ''?>
                ">
                <?php if ($c['ordering'] == 1) {
                    ?>
                <i class="feather-paperclip text-primary"></i>
                <?php
                    } ?>
                <?php echo $c['title'] ?>
            </a>
            <?php
            }
            ?>
        </div>
        <div class="my-4">
            <h4>Search by Date</h4>
            <div class="card">
                <div class="card-body">
                    <form action="search_by_date.php" method="post">
                        <div class="form-group mb-3">
                            <label for="">Start date</label>
                            <input type="date" required name="start" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">End date</label>
                            <input type="date" required name="end" class="form-control">
                        </div>
                        <button class="btn btn-primary feather-calendar mt-3">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>