<?php
require_once('template/core/auth.php');
?>
<?php
include('template/header.php');
?>
<?php global $url?>

<h1>Dashboard</h1>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/viewer.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 feather-eye h1 text-primary"></div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">
                                <?php echo countTotal('viewers') ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Today Visitor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 feather-list h1 text-primary"></div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('posts') ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Post</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 feather-layers h1 text-primary"></div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('categories') ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Today Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 feather-users h1 text-primary"></div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('users') ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-top">
    <div class="col-12 col-mb-6 col-xl-7 mb-4">
        <div class="card overflow-hidden shadow">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4 class="mb-0">Visitors</h4>
                    <div class="">
                        <img src="<?php echo $url; ?>/template/core/assets/img/user/avatar1.jpg"
                            class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/template/core/assets/img/user/avatar2.jpg"
                            class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/template/core/assets/img/user/avatar3.jpg"
                            class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/template/core/assets/img/user/avatar4.jpg"
                            class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/template/core/assets/img/user/avatar5.jpg"
                            class="ov-img rounded-circle" alt="">
                    </div>


                </div>
                <canvas id="ov" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-5 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4 class="mb-0">Posts / Category</h4>
                    <div class="feather-pie-chart h4 mb-0 text-primary">
                    </div>

                </div>

                <canvas id="op" height="210" class="mt-3"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card mb-4 overflow-hidden">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4 class="mb-0 font-weight-bold">Recent Posts</h4>
                    <div class="">
                        <?php 
                        $current=$_SESSION['user']['id'];
                        $totalPost= countTotal('posts');
                        $currentUserPost= countTotal('posts',"user_id='$current'");
                        $currentUserPostPercentage=($currentUserPost/$totalPost)*100;
                        $finalPercentage=floor($currentUserPostPercentage);
                        ?>
                        <small>Your posts : <?php echo $currentUserPost ?></small>
                        <div class="progress" style="width:350px">
                            <div class="progress-bar progress-bar-animated progress-bar-striped bg-primary"
                                role="progressbar" aria-label="Success striped example"
                                style="width:<?php echo $finalPercentage ?>% " aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>
                <table class="table table-hover table-bordered mt-3 mb-0">
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
                        foreach (dashboardPosts(5) as $c) {
                        ?>
                        <tr class=" <?php echo $c['ordering']==1? "table-info" :'' ?> ">
                            <td><?php echo $c['id']; ?></td>
                            <td class="text-nowrap"><?php echo short($c['title']); ?></td>
                            <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>
                            <td class="text-nowrap"><?php echo category($c['category_id'])['title']; ?></td>
                            <?php
                                if ($_SESSION['user']['role'] == 0) {
                                ?>
                            <td>
                                <?php
                                        echo (user($c['user_id'])['name']);
                                        ?>
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
include('template/footer.php');
?>

<script>
$('.counter-up').counterUp({
    delay: 10,
    time: 1000
});

<?php
$dateArr=[];
$visitors=[];
$transactions=[];
$today=date("Y-m-d");
for ($i=1;$i<=10;$i++){
    $date=date_create($today);
    date_sub($date,date_interval_create_from_date_string("$i days"));
    $current=date_format($date,"Y-m-d");
    array_push($dateArr,$current);

    $total=countTotal('viewers',"CAST(created_at AS DATE) = '$current'");
    array_push($visitors,$total);

    $total1=countTotal('transaction',"CAST(created_at AS DATE) = '$current'");
    array_push($transactions,$total1);
}
echo json_encode($dateArr);
echo json_encode($visitors);
?>

let dateArray = <?php echo json_encode($dateArr) ?>;
let viewerCountArr = <?php echo json_encode($visitors) ?>;
let transactionCountArr = <?php echo json_encode($transactions) ?>;
const ctx = document.getElementById('ov').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dateArray,
        datasets: [{
                label: 'Visitor count',
                data: viewerCountArr,
                backgroundColor: [
                    '#28c7fa',
                ],
                borderColor: [
                    '#007bff',
                ],
                tension: 0,
                borderWidth: 1
            },
            {
                label: 'Transaction count',
                data: transactionCountArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor: [
                    'rgba(255, 1, 132, 1)',
                ],
                tension: 0,
                borderWidth: 1
            },

        ]
    },
    options: {
        scales: {
            y: [{
                display: false,
                beginAtZero: true,
            }],

            x: [{
                display: false,
                gridLines: {
                    drawBorder: false,
                },
            }]
        },
        legend: {
            display: true,
            position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle: true,
            }
        }

    }
});


<?php
$catName=[];
$postPerCat=[];
foreach(categories() as $c){
    array_push($catName,$c['title']);
    array_push($postPerCat,countTotal('posts',"category_id={$c['id']}"));
}
echo json_encode($catName);
echo json_encode($postPerCat);
?>

let catArr = <?php echo json_encode($catName);?>;
let countArr = <?php echo json_encode($postPerCat);?>;
var ctx1 = document.getElementById('op').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: catArr,
        datasets: [{
            label: "# of posts",
            data: countArr,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: [{
                beginAtZero: true,
                display: false,
            }, ]
        },
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle: true,
            }
        }
    }
});
</script>