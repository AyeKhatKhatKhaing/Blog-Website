<?php
include 'template/core/auth.php';
?>
<?php
include 'template/header.php';
?>

<?php global $url?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ads</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if(isset($_POST['addAdsdBtn'])){
    if(adsAdd()){
        linkTo('index.php');
    }
}
        ?>
<form class="row" method="post" enctype="multipart/form-data">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-plus-circle  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Create Ads</h4>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Owner Name</label>
                    <input type="text" name="owner" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="text" name="photo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="link" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" name="sDate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" name="eDate" class="form-control">
                </div>

            </div>
            <button class="btn btn-primary" name="addAdsdBtn">Add Ads</button>
        </div>
    </div>

</form>
<?php
include 'template/footer.php';
?>