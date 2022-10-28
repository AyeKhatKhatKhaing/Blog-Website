<?php require_once "../template/core/base.php";?>
<?php require_once"../template/core/function.php";?>
<?php
header("Content-Type: application/json; charset=UTF-8");

$sql= "SELECT * FROM posts WHERE 1";
if(isset($_GET['limit'])){
    $limit=$_GET['limit'];
    $sql.=" LIMIT $limit";
}
if(isset($_GET['offset'])){
    $offset=$_GET['offset'];
    $sql.=" OFFSET $offset";
}
$rows=[];
$query = mysqli_query(conn(),$sql);
while ($row=mysqli_fetch_assoc($query)){
    $arr=[
        'id'=>$row['id'],
        'title'=>$row['title'],
        'description'=>$row['description'],
        'category'=>category($row['category_id'])['title'],
    ];
    array_push($rows,$arr);
}
print_r(json_encode($rows));
