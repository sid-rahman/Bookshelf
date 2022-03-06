<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bookshelf</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css\styles.css">
  <link rel="icon" href="resources/favicon F.ico">
</head>
<body>
  <!-- Navbar content -->
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">BOOKSHELF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
        </li>
        
      </ul>
      <form action="search_books.php" method="GET" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search a book" name="bk">
        <input type="submit" value="Search" name="sub" class="form-control btn btn-info">
      </form>
    </div>
  </nav>

  <br>



  <!-- main -->
  <div class="container main-div">
        <div class="center-div">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead  class="table-success">
                        <tr >
                            <th scope="col">Author</th>
                            <th scope="col">Publication</th>
                            <th scope="col">Total Pages</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Published Year</th>
                            <th scope="col">Review</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
            if(isset($_GET['sub'])){
                $name=$_GET['bk'];
                $con=mysqli_connect('localhost','root','','bookshelf');
                echo "<h3>Book Title | <strong> $name </strong></h3> <hr> <br>";
                if($con){
                  $q="select a_name, p_name, total_pages, genre, rating, p_year, review  from books inner join author using(b_id) inner join publisher using(b_id) where b_name='$name';";
                    $res=mysqli_query($con,$q);
                    while($row=mysqli_fetch_row($res)){

                        ?>
                        <tr style="color: black; background-color: #f4f1ea;">
                            <td><?php echo $m=$row[0]; ?> </td>
                            <td><?php echo $m=$row[1]; ?> </td>
                            <td><?php echo $m=$row[2]; ?> </td>
                            <td><?php echo $m=$row[3]; ?> </td>
                            <td><?php echo $m=$row[4]; ?> </td>
                            <td><?php echo $m=$row[5]; ?> </td>
                            <td><?php echo $m=$row[6]; ?> </td>
                        </tr>

                        <?php
                         }
                        }
                    }
                          ?>    
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</body>
</html>
