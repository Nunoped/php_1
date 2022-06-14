<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //SOMETHING WAS POSTED
    $user_name =   $_POST['user_name'];
    $password =   $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // save to datatbase
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
        mysqli_query($con, $query);

        header("Location: Login.php");
        die;
    } else {
        echo "please enter some valid information!";
    }
}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>

</head>

<body>
    <style type="text/css">
        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;

        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;

        }
    </style>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Sign up</div> <br><br>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="Submit" value="login"><br><br>
            <a href="login.php">Click to login</a><br><br>
        </form>
    </div>

</body>

</html>