<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","","book");
if(!$conn){
echo "Error: Unable to connect to MySql";
die();
}

$query ="select * from book where id='".$id."'";
$data = mysqli_query($conn,$query);
if($row = mysqli_fetch_array($data)){
?>
<!DOCTYPE html>
    <html>
    <head>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px;}
    #book_form{padding:50px;}
    label{display:inline-block; width:140px; }
    </style>
    </head>
    <body>
      <div id="book_form">
        <h1>UPDATE DATA OF BOOK</h1>
        <br/>
        <form action="book.php" method="post">
            <p>
            <label>Book Title</label>
            <input type="text" name="title" size="30" value ="<?php echo $row['title']; ?>">
            </p>
            <p>
            <label>Author Name</label>
            <input type="text" name="author" size="30" value ="<?php echo $row['author']; ?>" >
            </p>
            <p>
            <label>Pages of Book</label>
            <input type="text" name="pages" size="30" value ="<?php echo $row['pages']; ?>">
            </p>
            <p>
            <label>Genre</label>
              <select name="genre">
                      <option disabled>Pick a genre</option>
                      <option value="Horror">Horror</option>
                      <option value="Romance">Romance</option>
                      <option value="Fiction">Fiction</option>
              </select>            
            </p>
            <p>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" name="update" value="Update">
            <a href="viewbooks.php" class="btn btn-success pull-right">Back</a>
            </p>
        </form>
     </div>
     <?php  
        }
    ?>
    </body>
    </html>