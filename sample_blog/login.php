<?php 
require_once "template/core/base.php";
require_once "template/core/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/template/core/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/core/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/core/assets/css/style.css">
</head>

<body style="background:#c0c0c0">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-4 ">
                <div class="card">
                    <h4 class="feather-users text-center mt-3 text-primary">Login to Admin</h4>
                    <hr>
                    <div class="card-body">
                        <?php
                            if(isset($_POST['loginBtn'])){
                                echo login();
                            }
                        ?>
                        <form action="" method="post">

                            <div class="form-group">
                                <label for="" class="feather-mail text-primary">
                                    <i class="text-dark">Email</i>
                                </label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="feather-lock text-primary">
                                    <i class="text-dark">Password</i>
                                </label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-primary" name="loginBtn">Login</button>
                                <a href="register.php" class="btn btn-outline-primary">Register</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo $url; ?>/template/core/assets/vendor/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/way_point/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/counter_up/counter_up.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/chart_js/chart.min.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/js/app.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/data_table/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/vendor/bootstrap/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo $url; ?>/template/core/assets/js/app.js"></script>

</body>

</html>