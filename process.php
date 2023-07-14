<?php
    $fullName = $_POST['name'];
    $EmailID = $_POST['email'];
    $Enquiry = $_POST['knew'];
    $OtherEnquiry = $_POST['knew2'];
    $FavMonument = $_POST['monument'];
    $MonumentOfMonth = $_POST['moy'];
    $Message = $_POST['Message'];
    // DataBase Connection Code
    $conn = new mysqli('localhost', 'root', '', 'moi');
    if($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("inser into registration(Full_Name,Email_ID,Enquiry,Other_Enquiry,Fav_Monument,MOY,Message) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $fullName, $EmailID,$Enquiry,$OtherEnquiry,$FavMonument,$MonumentOfMonth,$Message);
        $stmt->execute();
        echo "Registration Successful";
        $stmt->close();
        $conn->close();
    }
?>