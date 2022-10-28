<?php
require_once('template/core/auth.php');
?>
<?php global $url ?>

<?php
require_once('template/header.php');
?>
<?php 
    if(isset($_POST['payNow'])){
        if(payNow()){
            linkTo('payment_transfer.php');
        }
    }
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
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
                        <i class="feather-dollar-sign  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">My Wallet</h4>
                    </div>
                    <a href="#" class="feather-user btn btn-outline-primary">Your money :
                        $<?php echo user($_SESSION['user']['id'])['money'] ?></a>
                </div>
                <hr>
                <form action="#" method="post">
                    <div class="d-flex justify-content-between">
                        <div class="form-inline d-flex justify-content-between mr-2 ">
                            <select name="to_user" id="" class="form-control" required>
                                <option value="0" disabled selected>Select user</option>
                                <?php
                                        foreach(users() as $u){
                                            ?>
                                <option value="<?php echo $u['id'] ?>"
                                    class="<?php echo $u['id']==$_SESSION['user']['id']?'d-none':'' ?>">
                                    <?php echo $u['name'] ?></option>
                                <?php
                                        }
                                    ?>
                            </select>
                            <input type="number" class="form-control ml-2" name="amount" min="100"
                                max="<?php echo user($_SESSION['user']['id'])['money'] ?>" placeholder="Pay Amount"
                                required>
                            <input type="text" class="form-control ml-2" name="description" placeholder="For what"
                                required>
                        </div>

                        <div class="">
                            <button class="btn btn-primary" name='payNow'>Transfer</button>
                            <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>
                        </div>
                    </div>
                </form>
                <hr>

                <table class="table table-border table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>for What</th>
                            <th>Date / Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (transactions() as $t){?>
                        <tr>
                            <td><?php echo $t['id'] ?></td>
                            <td><?php echo (isset(user($t['from_user'])['name']))?  user($t['from_user'])['name']:"Unknown"?></td>
                            <td><?php echo (isset(user($t['to_user'])['name']))?  user($t['to_user'])['name']:"Unkknown" ?></td>
                            <td><?php echo $t['amount'] ?></td>
                            <td><?php echo $t['description'] ?></td>
                            <td><?php echo date("d-m-Y / h:i",strtotime($t['created_at'])) ?></td>
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
<script>
$(document).ready(function() {
    $('.table').DataTable({
        "order": [
            [0, "desc"]
        ]
    });
});
</script>