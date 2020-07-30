<!doctype html>
<html lang="ru">
 <head>
    <!-- Required meta tags--> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    
     <!-- Bootstrap CSS--> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css"> 
    
     <title>Электронный бюллетень</title>
    <div class="bull">  <div class="container">
         <div class="row">
                <div class="col" ><img src="image/gerb.png"/></div>
                <div class="col-10">
                    <div class=row-top>Электронный бюллетень</div>
                    <div class="row-button">Администрации города Новокузнецка</div>   
             </div>
     </div> 
     </div> </div>     
 </head>
 <body>   
     
     
     <div class="container">
          <div class="row">
                  <div class="col-xl-12">
             <?php        
                $entry_id = $_GET['id'];    
                include("connection.php");
                $query = "SELECT*FROM npa WHERE entry_id = '$entry_id'";
                $result = mysqli_query($connect,$query);
                  while($row=mysqli_fetch_array($result)){

                 $number = $row['number'];
                 $category = $row['category'];
                 $title= $row['name'];
                 $data = $row['date'];
                 $name = $row['npa_pdf'];     
                $title = "<h2 class='post_h2 m-3'>$title</h2>";
                echo $title;   
                      ?>
                   <div class='preview_date'>
                        <?php  
                            echo "Опубликован: $data";
                        ?>
                </div> 
                      <?php
                /**$number = "<h2 class='post_h2 m-3'>$number</h2>";
                echo $number; 
                $data = "<hr><p class='post_p p-3'>$data</p><hr>";
                echo $data;  **/
                echo "<iframe src='scans/$name' width='100%' height='600px'></iframe>";
                  }  ?>
                
                       
        </div>
          </div>
     </div>
  <footer>
     <div class="go to" href="admnkz.info">Перейти на сайт администрации</div>
      <div class="go_logo"></div>
 </footer>
    </body>
</html>