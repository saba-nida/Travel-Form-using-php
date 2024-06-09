<?php
$insert=false;
if(isset($_POST['name'])){
//setting connection variables
$insert = true;
$server = "localhost";
$username= "root";
$password = "";
//create a connection
$con = mysqli_connect($server,$username,$password);

//check for connection success

if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
// echo "Success connecting to the db";

//collect post variables
$name = $_POST['name'];

$gender=$_POST['gender'];

$age=$_POST['age'];
if($age>100){
    echo "invalid age";
}


$email=$_POST['email'];

$phone=$_POST['phone'];

$desc=$_POST['desc'];

$sql = "INSERT INTO `trip`.`trip`( `name`, `age`, `gender`, `email`, `phone`, `comments`, `date`) VALUES
 ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql)==true){
    //flag for a successful insertion
    $insert = true;
    // echo "successfully inserted";
}
else{
    echo "ERROR: $sql <br> $con->error";
    $not_insert=true;
}

//close the database connection
$con->close();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sriracha&display=swap" rel="stylesheet">

</head>
<body>
    <img class="bg" src="./images/bg.avif" alt="University image">
    <div class="container">
        <h1> Welcome To Travel Form</h1>
        <p>Enter your details  and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert==true){
        echo "<P class='submitmsg'>Thanks for submitting your form.We are happy to see you joining Japan trip with us.</P>";}


        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="number" name="age" id="age" placeholder="Enter your age" max="100" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Comments"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
