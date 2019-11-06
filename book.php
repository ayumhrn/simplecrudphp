<?php 
session_start();

//create connection
$conn = mysqli_connect("localhost", "root", "", "book");

//check connection
if (!$conn) {
    echo "Error: Unable to connect to MySql";
    die();
}
echo "Connected successfully";

//initialize variable
$title = '';
$pages = '';
$author = '';
$genre = '';

//create data of book
if (isset ($_POST['save'])) {
   $title = $_POST['title'];
   $pages = $_POST['pages'];
   $author = $_POST['author'];
   $genre = $_POST['genre'];
   
   $query = "INSERT INTO book(title, pages, author, genre) VALUES ('$title', '$pages', '$author', '$genre')";
   $result = mysqli_query($conn, $query);
   if ($result) {
       header('location:viewbooks.php');
   }
}

//update data of book
if (isset ($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $pages = $_POST['pages'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    
    $query = "update book set title ='$title', pages = '$pages', author = '$author' , genre='$genre' where id ='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:viewbooks.php');
    }
}

//delete data of book
if (isset ($GET['id'])) {

    $conn = mysqli_connect("localhost", "root", "", "book");
    
    $query = "delete from book where id =".$_GET['id'];
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:viewbooks.php');
    }
}


?>