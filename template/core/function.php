<?php require_once "base.php";
?>

<?php
//common start
function alert($data, $color = "danger")
{
    return "<p class='alert alert-$color'>$data</p>";
}
function runQuery($sql)
{
    if (mysqli_query(conn(), $sql)) {
        return true;
    }
    else{
        die(mysqli_connect_error(conn()));
    }
}
function redirect($location)
{
    header("location:$location");
}
function linkTo($location)
{
    echo "<script>location.href='$location'</script>";
}

function fetchAll($sql)
{
    $query = mysqli_query(conn(), $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }
    return $rows;
}


function fetch($sql)
{
    $query = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function showTime($timeStamp, $format = "d-m-y")
{
    return date($format, strtotime($timeStamp));
}

function countTotal($table,$condition=1)
{
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function short($str, $length = "100")
{
    return substr($str, 0, $length) . "...";
}

function textFilter($text)
{
    $text = trim($text);
    $text = htmlentities($text, ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}
//common end

//auth start
function register()
{
    $userName = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $securePassword = password_hash($password, PASSWORD_DEFAULT);
    if ($password == $confirmPassword) {
        $sql = "INSERT INTO users (name,email,password) VALUES ('$userName','$email','$securePassword')";
        
        if (runQuery($sql)) {
            redirect("login.php");
        }
    } else {
        return alert("Password don't match");
    }
}
//auth end


//login start
function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query(conn(), $sql);
        $row = mysqli_fetch_assoc($query);
        if (!$row) {
            return alert("Email or password don't match!");
        } else {
            if (!password_verify($password, $row['password'])) {
                return alert("Email or password don't match!");
            } else {
                session_start();
                $_SESSION['user'] = $row;
                redirect("post_list.php");
            }
        }
    
}

//login end

//user start 
function user($id)
{
    $sql = "SELECT * FROM users WHERE id = '$id'";
    return fetch($sql);
}

function users()
{
    $sql = "SELECT * FROM users ORDER BY id DESC";
    return fetchAll($sql);
}

function userDelete($id)
{
    $sql = "DELETE FROM users WHERE id = '$id'";
    return runQuery($sql);
}
//user end

//category start

function categoryAdd()
{
    $title = textFilter(strip_tags($_POST['title']));
    $userId = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title', '$userId')";
    if (runQuery($sql)) {
        linkTo("category_add.php");
    }
}

function category($id)
{
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    return fetch($sql);
}

function categories()
{
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function categoryDelete($id)
{
    $sql = "DELETE FROM categories WHERE id = '$id'";
    return runQuery($sql);
}
function categoryUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title='$title' WHERE id = '$id' ";
    return runQuery($sql);
}

function categoryPinToTop($id)
{
    $sql = "UPDATE categories SET ordering='0' ";
    mysqli_query(conn(), $sql);
    $sql = "UPDATE categories SET ordering='1' WHERE id = '$id' ";
    return runQuery($sql);
}

function categoryRemovePin()
{
    $sql = "UPDATE categories SET ordering='0'";
    return runQuery($sql);
}

function postsPerCategory($id){
    $sql="SELECT COUNT(id) FROM posts WHERE category_id=$id";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}
//category end

//post start
function isCategory($id){
    if(category($id)){
        return $id;
    }
    else{
        return 0;
    }
}
function postAdd()
{
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory($_POST['category_id']);
    if($category_id!=0){
        $user_id = $_SESSION['user']['id'];
        $sql = "INSERT INTO posts (title,description,category_id,user_id) VALUES ('$title','$description','$category_id','$user_id')";
        if (runQuery($sql)) {
            linkTo("post_add.php");
        }
    }
    else{
        echo "Something went wrong";
    }
    
}
function post($id)
{
    $sql = "SELECT * FROM posts WHERE id = '$id'";
    return fetch($sql);
}

function posts($limit=99999999)
{
    if ($_SESSION["user"]['role'] == 2) {
        $currentUser = $_SESSION["user"]['id'];
        $sql = "SELECT * FROM posts WHERE user_id='$currentUser' ORDER BY ordering DESC LIMIT $limit";
        return fetchAll($sql);
    } else {
        $sql = "SELECT * FROM posts ORDER BY ordering DESC LIMIT $limit";
        return fetchAll($sql);
    }
}

function postDelete($id)
{
    $sql = "DELETE FROM posts WHERE id = '$id'";
    return runQuery($sql);
}
function postUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $sql = "UPDATE posts SET title='$title',category_id='$category_id',description='$description' WHERE id = '$id' ";
    return runQuery($sql);
}

function postPinToTop($id)
{
    $sql = "UPDATE posts SET ordering='0' DESC";
    mysqli_query(conn(), $sql);
    $sql = "UPDATE posts SET ordering='1' WHERE id = '$id' ";
    return runQuery($sql);
}
function postRemovePin()
{
    $sql = "UPDATE posts SET ordering='0'";
    return runQuery($sql);
}
//post end

//front panel start 

function fPosts($col = "ordering", $orderType = "DESC")
{
    $sql = "SELECT * FROM posts ORDER BY $col $orderType";
    return fetchAll($sql);
}

function fCategories()
{
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function fPostByCategory($category_id, $limit = "99999", $postId = 0)
{
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id!=$postId ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}

function fSearch($searchKey)
{
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%'  ORDER BY id DESC";
    return fetchAll($sql);
}

function fSearchByDate($start, $end)
{
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}
//front panel end

//viewer count start 
function viewerRecord($userId, $postId, $device)
{
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$userId','$postId','$device')";
    runQuery($sql);
}
function viewerCount(){
    $sql = "SELECT * FROM viewers";
        return fetchAll($sql);
    
}
function viewerCountByPost($postId)
{
    $sql = "SELECT * FROM viewers WHERE post_id = $postId";
    return fetchAll($sql);
}
function viewerCountByUser($userId)
{
    $sql = "SELECT * FROM viewers WHERE user_id = $userId";
    return fetchAll($sql);
}
//viewer count end 

//ads srart
function adsAdd(){
    $owner=$_POST['owner'];
    $photo = $_POST['photo'];
    $link = $_POST['link'];
    $start=$_POST['sDate'];
    $end=$_POST['eDate'];
    $sql = "INSERT INTO ads (owner_name,photo,link,start,end) VALUES ('$owner','$photo','$link','$start','$end')";

    return runQuery($sql);
}
function ads()
{
    $today = date('Y-m-d');
    $sql = "SELECT * FROM ads WHERE start<='$today' AND end>='$today'";
    return fetchAll($sql);
}

//ads end

//payment start
function payNow(){
    $from=$_SESSION['user']['id'];
    $to=$_POST['to_user'];
    $amount=$_POST['amount'];
    $description=$_POST['description'];
    //from user money update
    $fromUserDetail=user($from);
    if($fromUserDetail['money'] > $amount ){
        $remainingAmount=$fromUserDetail['money']-$amount;
        $sql="UPDATE users set money =$remainingAmount WHERE id=$from";
        mysqli_query(conn(), $sql);

        //to user money update
        $toUSerDetail=user($to);
        $newAmount=$toUSerDetail['money']+$amount;
        $sql="UPDATE users set money =$newAmount WHERE id=$to";
        mysqli_query(conn(), $sql);
    
        $sql = "INSERT INTO transaction (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
    }
    runQuery($sql);

}

function transaction($id){
        $sql = "SELECT * FROM transaction WHERE id='$id'";
        return fetch($sql);
}

function transactions(){
    $user_id=$_SESSION['user']['id'];
    if($_SESSION['user']['role'] == 0){
        $sql = "SELECT * FROM transaction";
    }else{
        $sql="SELECT * FROM transaction WHERE from_user=$user_id OR to_user=$user_id";
    }

        return fetchAll($sql);
}
//payment end

//dashboard start
function dashboardPosts($limit=99999999)
{
    if ($_SESSION["user"]['role'] == 2) {
        $currentUser = $_SESSION["user"]['id'];
        $sql = "SELECT * FROM posts WHERE user_id='$currentUser' ORDER BY id DESC LIMIT $limit";
        return fetchAll($sql);
    } else {
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
        return fetchAll($sql);
    }
}
//dashboard end

//api start
function apiOutput($arr){
    echo json_encode($arr);
}

//api end
?>