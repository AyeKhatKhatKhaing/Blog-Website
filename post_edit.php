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
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-plus-circle  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Update Post</h4>
                    </div>
                    <a href="<?php echo $url;?>/post_list.php" class="feather-list btn btn-outline-primary"></a>
                </div>
                <hr>
                <?php
        if(isset($_POST['addPostBtn'])){
            postAdd();

        }
    ?>
                <?php 
                    $id=$_GET['id'];
                    if(isset($_POST['updatePost'])){
                        if(postUpdate()){
                            linkTo('post_list.php');
                        }
                    }
                ?>

                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" value="<?php echo post($id)['id'] ?>" name="id" hidden>
                        <label for="">Post title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo post($id)['title'] ;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" id="" class="form-control custom-select">
                            <?php foreach (categories() as $c){
                                ?>
                            <option value="<?php echo $c['id']; ?>"
                                <?php echo $c['id']==post($id)['category_id']?"selected":""; ?>>
                                <?php echo $c['title']; ?>
                            </option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post description</label>
                        <textarea name="description" class="form-control description"
                            rows="15"><?php  echo post($id)['description'];?></textarea>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" name="updatePost">Update post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>