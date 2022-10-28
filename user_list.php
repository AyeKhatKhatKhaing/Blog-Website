<?php
include 'template/core/auth.php';
?>
<?php include 'template/core/is_admin.php' ?>
<?php global $url ?>

<?php
include 'template/header.php';
?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users </li>
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
                        <i class="feather-users  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Users Manager</h4>
                    </div>
                    <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>

                </div>
                <hr>
                <table class="table table-hover mt-5 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Control</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (users() as $c) {
                        ?>
                        <tr>
                            <td><?php echo $c['id']; ?></td>
                            <td><?php echo $c['name']; ?></td>
                            <td><?php echo $c['email']; ?></td>
                            <td><?php echo $role[$c['role']]; ?></td>
                            <td>
                                <a href="user_delete.php?id=<?php echo $c['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                    class="btn btn-outline-danger feather-trash btn-sm"></a>
                                <a href="user_info.php?id=<?php echo $c['id']; ?>"
                                    class="btn btn-outline-info feather-info btn-sm"></a>
                            </td>
                            <td><?php echo showTime($c['created_at']); ?></td>

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
<script>
$('.table').dataTable({
    "order": [
        [0, "desc"]
    ]
});
</script>