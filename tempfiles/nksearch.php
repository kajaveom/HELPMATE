<?php
          if(isset($_POST['ssub']))
          {
            if(isset($_POST['cname']))
            {
              $cn = $_POST['cname'];
              $f = 0;
              $host = 'localhost:3306';
              $dbusername = 'root';
              $dbPassword = '';
              $dbName = 'pdctarp';

              $con = mysqli_connect($host,$dbusername,$dbPassword,$dbName);

              if($con)
              {
                
                $sql = "SELECT * FROM cropinfo WHERE name == '$cn'";
                $result = mysqli_query($con,$sql);
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0)
                {
                  //echo "<h2>Sorry, no records found..</h2>"
                  $f = 2;
                }
              }
              else{
                $f = 1;
                //echo "<h1>Error connecting to database</h1>";
              }

              
            }
          }
?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <?php
  $rows = mysqli_fetch_assoc($res);
  ?>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="http://localhost/HELPMATE/Stylesheets/search_styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@1,500&family=Lobster+Two:ital@1&family=Noto+Sans+TC&family=Poiret+One&family=Poppins:wght@300&family=Srisakdi&family=Tangerine:wght@700&family=Varela+Round&display=swap"
      rel="stylesheet"
    />
    <title>SEARCH CROP</title>
  </head>
  <body>
    <div class="imgc">
        <div class="nav_bar">
          <ul>
            <li><a href="https://mkisan.gov.in">NEWS</a></li>
            <li><a href="http://localhost/HELPMATE/Webpages/homepage.html">HOME</a></li>
            <li><a href="http://localhost/HELPMATE/Webpages/login.html" id="lo">LOGOUT</a></li>
          </ul>
        </div>
      <div class="search">
        <h1>CROP SEARCH ENGINE</h1>
        <form action="", method = 'POST'>
          <input
            type="text"
            name="cname"
            id="sb"
            placeholder="Get to know about the crop..."
          />
          <button type="submit" name = 'ssub'>
            <img src="http://localhost/HELPMATE/Resources/search.png" alt="search icon" />
          </button>
        </form>
        <div class="resp">

          <?php
          if ($f == 1)
          {
            echo "<h1>Error in connecting to database!";
          }
          else if($f == 2)
          {
            echo "<h1>Sorry, no records found!";
          }
          else
          {
            echo "<h1>$cn</h1>";
          }
          ?>

          <ol>
            <li>Area Required : <?php echo $rows['grea'];?></li>
            <li>Suitable seaso : <?php echo $rows['Season'];?></li>
            <li>Growth duration : <?php echo $rows['month'];?></li>
            <li>Crop Uses : <?php echo $rows['uses'];?></li>
            <li>Possible Changes : <?php echo $rows['changes'];?></li>
            <li>Fertilizer required : <?php echo $rows['fertilizer'];?></li>
            <li>Pesticide required : <?php echo $rows['pesticide'];?></li>
          </ol>

        </div>
      </div>
    </div>
  </body>
</html>
