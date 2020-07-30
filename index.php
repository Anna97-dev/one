
<html>
 <head>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link href="air-datepicker-master/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
     <script src="air-datepicker-master/dist/js/datepicker.min.js"></script>
  <meta charset="utf-8">
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
            <div class="col-xl-7">
               <form>
                    <p><input id="name" type="text" placeholder="название документа"/ ></p>     
                    <p><input id="number" type="text" placeholder="Номер документа" /></p>
                   <p><select width="100%" id="category">
                        <option selected disabled>Вид документа</option>
                        <option value="Постановление">Постановление</option>
                        <option value="Распоряжение">Распоряжение</option>
                        <option value="Договор">Договор</option>
                    </select></p>
                    
                   <p><input id="date_one" type="date" placeholder="Дата публикации"/></p> 
                    <p><input id="date_two" type="date" placeholder="Дата публикации"/></p>
                    <button type='button' id='elem' class='btn btn-outline-info btn-lg btn-block '  >Поиск</button>
                </form>
            </div>
        </div> 
     </div>     
    <div class="container">
        <div class="row">            
            <div class="col-xl-7">
                <div   id='events' class='preview-small_block'>
             <?php
                include("connection.php");
                $query = "SELECT*FROM npa ORDER BY entry_id DESC";
                $result = mysqli_query($connect,$query);           
                while($row=mysqli_fetch_array($result)){
             ?>    
            <div  class="grid-2column">
             <?php   
                 $id = $row['entry_id'];
                 $number = $row['number'];
                 $category = $row['category'];
                 $name= $row['name'];
                 $data = $row['date'];
             ?>
                    <div class='preview-small_tag-block'>
                        <?php  
                            $number = "<div class='preview_number'>$number</div>";
                            echo $number;
                            $category = "<div class='preview_category'>$category</div>";
                            echo $category;
                        ?>
                    </div>
                    <div class='preview_title'>
                        <?php  
                            $title = "<a href='view.php?id=$id' target='_blank'>$name<br></a>";
                            echo $title;
                        ?>
                    </div> 
                    <div class='preview_date'>
                        <?php  
                            echo "Опубликован: $data";
                        ?>
                    </div> 
                </div>
                  
            <?php   
            }
             ?>   
                
                
            </div> 
                <div id="new_events" class="grid-2column">
                            
                    </div>  
        </div>
    </div>
</div>           
   
 </body>    
 <footer class="bull-foot">
    <div class="container">
        <div class="col-xl-7">
        <a href="admnkz.info"><div class="go_to">Перейти на сайт администрации</div></a>
        <div class="go_logo"></div>
        </div>    
     </div> 
</footer>
</html>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript" src="js/main.js"></script> 
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">  
         $(document).ready(function(){
            
         $('.btn').click(function(){
             document.getElementById('events').style.display = 'none';
            var nam =  $('#name').val();
            var number = $('#number').val();
            var category = $('#category').val();  
            var dat_one = $('#date_one').val();
            var dat_two = $('#date_two').val(); 
            $.ajax({
            type: "POST",                
            url: "get.php",
            data: {nam: nam,
                   category: category,
                   number: number,
                   dat_one: dat_one,
                   dat_two: dat_two
                  },    
         }).done(function( result ){
                  var  element = result;
            
            document.getElementById('new_events').innerHTML = element; 
         }); 
     
 });
   }); 
</script>  