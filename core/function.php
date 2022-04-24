<?php
//common start

    function alertError($data,$color = "danger"){
        return "<p class='alert alert-$color'>$data</p>";
    }

    function query($sql){
        $con = conn();
        if (mysqli_query($con,$sql)){
            return true;
        }else{
            die("Fail :".mysqli_error($con));
        }
    }

    function href($h){
            header("location:$h");
    }

    function toLink($h){
        echo "<script>location.href='$h'</script>";
    }

    function fetch($sql){
        $query = mysqli_query(conn(),$sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    function fetchAll($sql){
        $query = mysqli_query(conn(),$sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($query) ) {
                array_push($rows, $row);
        }
        return $rows;
    }

    function showTime($format,$timestamp){
       return date($format, $timestamp);
    }

    function totalList($x){
        $sql = $x;
        $query = mysqli_query(conn(), $sql);
        $total = mysqli_num_rows($query);
        return $total;
    }

    function short($str, $length='35'){
        return substr($str, 0,$length).".....";
    }

    function textFilter($text){
        $text = trim($text);
        $text = htmlentities($text,ENT_QUOTES);
        $text = stripcslashes($text);
        return $text;
    }

//common end


// auth start

    function register(){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if ($password == $cpassword) {
            $pwd = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into users (name,email,password) values ('$name','$email','$pwd')";
            if (query($sql)) {
                href("login.php");
            }else{
                echo false;
            }
        }else{
            return alertError("Password Don't Match!");
        }

    }

    function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email = '$email'";
        $query = mysqli_query(conn(),$sql);
        $row = mysqli_fetch_assoc($query);
        if (!$row) {
            echo alertError('Email of Password is wrong!');
        }else{
            if (!password_verify($password, $row['password'])) {
                echo alertError("Email or Password is wrong!");
            }else{
                session_start();
                $_SESSION['user'] = $row;
                href("dashboard.php");
            }
        }
    }

// auth end

//user start 

    function user($id){
        $sql = "select * from users where id = $id";
        return fetch($sql);
    }
    function users(){
        $sql = "select * from users";
        return fetchAll($sql);
    }

//end

// category start

        

        function category_add(){
            $title = $_POST['title'];
            $userid = $_SESSION['user']['id'];
            $sql = "insert into categories(title,user_id) values ('$title','$userid')";

            if (query($sql)) {
                toLink("add_category.php");
            }
        }

        function category($id){
            $sql = "select * from categories where id = $id";
            return fetch($sql);
        }

        function categories(){
            $sql = "select * from categories order by ordering desc";
            return fetchAll($sql);
        }


        function PinCategory(){
            $id = $_GET['id'];

            $sql = "update categories set ordering='0'";
            mysqli_query(conn(),$sql);

            $sql = "update categories set ordering='1' where id = $id";
            query($sql);
            toLink("add_category.php");
        }

        function PinDelCategory(){
            $sql = "update categories set ordering='0'";
            query($sql);
            toLink("add_category.php");
        }

        function isCategory($id){
            if (category($id)) {
                return $id;
            }else{
                die('Fail');
            }
        }

//category end


// delete start 

    function delCat(){
        $id = $_GET['id'];
        $sql = "delete from categories where id = $id";
        query($sql);
        toLink("add_category.php");
    }

    function delPost(){
        $id = $_GET['id'];
        $sql = "delete from posts where id = $id";
        query($sql);
        toLink("post_list.php");
    }

//delete end

//edit start
    function category_up(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $sql = "update categories set title= '$title' where id = $id";
        query($sql);
        toLink("add_category.php");

    }

    function post_up(){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $sql = "update posts set title= '$title', description= '$description', category_id= '$category_id' where id = $id";
        query($sql);
        toLink("post_list.php");        

    }
//edit end

// post start


    function post_add(){
        $title = textFilter($_POST['title']);
        $description = textFilter($_POST['description']);
        $user_id = $_SESSION['user']['id'];
        $category_id = isCategory($_POST['category_id']);
        $sql = "insert into posts (title, description, user_id, category_id) values ('$title','$description','$user_id','$category_id')";
        
        if (query($sql)) {
            toLink("post_add.php");
        }
    }
    
    
    function posts($limit=99999){
        if ($_SESSION['user']['role'] == 2) {
            $current_id = $_SESSION['user']['id'];
            $sql = "select * from posts where user_id=$current_id LIMIT $limit";
            return fetchAll($sql);
        }
        else{
        $sql = "select * from posts LIMIT $limit";
        return fetchAll($sql);
    }
}

    function post($id){
        $sql = "select * from posts where id = $id";
        return fetch($sql);
    }
    

// post end


// front start

function fPost($orderCol="id",$orderType="DESC"){
    $sql = "select * from posts order by $orderCol $orderType";
    return fetchAll($sql);
}

function fCategories(){
    $sql = "select * from categories order by ordering desc";
    return fetchAll($sql);
}

function fPostOrder($category_id,$limit=9999,$post_id = 0){
    $sql = "SELECT * FROM posts WHERE category_id = $category_id AND id != $post_id ORDER BY id DESC LIMIT $limit" ;
    return fetchAll($sql);
}

function fSearch($search_key){
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search_key%' OR description LIKE '%$search_key%' ORDER BY id DESC";
    return fetchAll($sql);
}

function fSearchByDate($start,$end){
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}

// front end

// viewer count start

    function viewerControl($userId,$postId,$device){
        $sql = "INSERT INTO viewers (`user_id`,`post_id`,`device`) VALUES ('$userId','$postId','$device')";
        query($sql);
    }

    function viewerUser($userId){
        $sql = "select * from viewers where user_id = $userId";
        return fetchAll($sql);
    }

    function viewerPost($postId){
        $sql = "select * from viewers where post_id = $postId";
        return fetchAll($sql);
    }

// viewer count end

// ads start
    function ads(){
        $today = date("Y-m-d");
        $sql = "select * from ads where start <= '$today' and end > '$today'";
        // die($sql);
        return fetchAll($sql);
    }
// ads end

// payment start

    function payNow(){
        $from_user= $_SESSION['user']['id'];
        $to_user = $_POST['to_user'];
        $amount = $_POST['amount'];
        $message= $_POST['message'];
        // from User
        $fromUserDetail = user($from_user);
        $leftMoney = $fromUserDetail['money']-$amount;

        if ($fromUserDetail['money'] >= $amount) {
            $sql = "UPDATE users SET money=$leftMoney WHERE id=$from_user";
            mysqli_query(conn(),$sql);
            // to User
            $toUserDetail = user($to_user);
            $newMoney = $toUserDetail['money']+$amount;
            $sql = "UPDATE users SET money=$newMoney WHERE id = $to_user";
            mysqli_query(conn(),$sql);
            // record to database
            $sql = "INSERT INTO transition(`from_user`,`to_user`,`amount`,`message`) VALUES ('$from_user','$to_user','$amount','$message')";
            query($sql);
        }else{
            echo alertError("Something is Wrong!");
        }
    }

    function transition($id){
        $sql = "select * from transition where id = $id";
        return fetch($sql);
    }

    function transitionAll(){

        $userID = $_SESSION['user']['id'];
        if ($_SESSION['user']['role']==0) {
            $sql = "select * from transition";
        }else{
            $sql = "select * from transition where from_user=$userID or to_user=$userID";
        }

    return fetchAll($sql);
}
// payment end

// dashboard function

function postsDash($limit=99999){
    if ($_SESSION['user']['role'] == 2) {
        $current_id = $_SESSION['user']['id'];
        $sql = "select * from posts where user_id=$current_id order by id DESC LIMIT $limit";
        return fetchAll($sql);
    }
    else{
    $sql = "select * from posts order by id DESC LIMIT $limit ";
    return fetchAll($sql);
}
}

// api start

    function apiOutPut($arr){
        
        echo json_encode($arr);

    }

// api end