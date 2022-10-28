<?php 
require_once "core/base.php";
require_once "core/function.php";
?>
<?php global $url?>


<!-- for sidebar -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="<?php echo $url; ?>/template/core/assets/vendor/feather-icons-web/feather.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/core/assets/css/style.css">

</head>

<body>
    <section class="main container-fluid">
        <div class="row">
            <!-- sidebar start -->
            <?php include 'template/sidebar.php'; ?>
            <!-- sidebar end -->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 content">
                <div class="row header mb-4">
                    <div class="col-12">
                        <div class="bg-primary rounded p-2 d-flex justify-content-between align-items-center">
                            <button class="text-light show-sidebar-btn  feather-menu btn btn-primary d-block d-lg-none"
                                style="font-size:2em">
                            </button>
                            <form action="" class="d-none d-md-block">
                                <div class="form-inline d-flex">
                                    <input type="text" class="form-control mr-2">
                                    <button class="btn btn-light feather-search text-primary ml-2 "
                                        style="font-size:1em"></button>
                                </div>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?php echo $url; ?>/template/core/assets/img/<?php echo $_SESSION['user']['photo'] ?>"
                                        class="admin-img shadow-sm" alt="">
                                    <?php echo $_SESSION['user']['name'] ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $url;?>/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>