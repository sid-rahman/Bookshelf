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
<div class="container row">
    <div class="col-3"></div>
    <div class="col-6">
        <p class="display-2">Book inserted successfully</p> <br>
        <a href="insert.html">Add another book</a>

        <?php
            if(isset($_GET['submit'])){
              $bt=$_GET['bt'];
              $at=$_GET['at'];
              $pb=$_GET['pb'];
              $tp=$_GET['tp'];
              $gr=$_GET['gr'];
              $ratt=$_GET['ratt'];
              $ply=$_GET['ply'];
              $rev=$_GET['rev'];
              $q="insert into books(b_name,total_pages,genre,rating,p_year,review) values('$bt','$tp','$gr','$ratt','$ply','$rev');";
              $con=mysqli_connect('localhost','root','','bookshelf');
              $res=mysqli_query($con,$q);
              if($con)
              {
                $k="select * from books where b_name='$bt'";
                $kes=mysqli_query($con, $k);
                while($row=mysqli_fetch_row($kes))
                {
                  if($row[1]==$bt)
                  {
                    $bid2=$row[0];
                  }
                }

              }
              $a="insert into author(a_name,b_id) values('$at','$bid2');";
              $pes=mysqli_query($con,$a);


              $b="insert into publisher(p_name,b_id) values('$pb','$bid2');";
              $mes=mysqli_query($con,$b);
            }
        ?>
    </div>
    <div class="col-3"></div>


  </div>


</body>
</html>
