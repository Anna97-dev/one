<?php
            $query = "SELECT*FROM npa WHERE name = '$name' or category = '$category' or number = '$number'";
            $result = mysqli_query($connect,$query);
           
 while($row=mysqli_fetch_array($result)){
     ?>
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
<?php
 }               
?>   