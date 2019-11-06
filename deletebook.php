<?php
$conn = mysqli_connect("localhost","root","","book");
if(!$conn){
echo "Error: Unable to connect to MySql";
die();
}

if(isset($_GET['id'])){
$query = "delete from book where id =".$_GET['id'];
$result = mysqli_query($conn, $query);
if($result){
?>
<div class="msg">
<h3>Success!</h3>
<p>
Book deleted Successfully!<br/>
<a href="viewbooks.php">View All Books</a>
</p>
</div>
<?php
}
}
?>