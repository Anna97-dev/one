 <?php
 include("connection.php");
            $name = $_REQUEST['nam'];
            $category = $_REQUEST['category'];
            $number = $_REQUEST['number'];
            $data_one = $_REQUEST['dat_one'];
            $data_two = $_REQUEST['dat_two'];
  
    if( "$name" != "" and "$number" != "" and "$category" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны название, номер, категория и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and number ='$number' and name = '$name' and category = '$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$number" != "" and "$category" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны номер, категория и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and number ='$number' and category = '$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$name" != "" and "$category" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны название, категория и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and name ='$name' and category = '$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$name" != "" and "$number" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны название, номер и даты 
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and name ='$name' and number ='$number'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$name" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны название и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and name ='$name'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$number" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны номер и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and number ='$number'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$category" != "" and "$data_one" != "" and "$data_two" != ""){//Если известны категория и даты
            $query = "SELECT * FROM npa WHERE date >= '$data_one' and date <= '$data_two' and category ='$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if( "$name" != "" and "number" != "" and "category" != ""){//Известны название, номер, категория
            $query = "SELECT * FROM npa WHERE name = '$name' and number = '$number' and  category ='$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else if("$name" !== "" && "$number" != ""){ //Если известны номер и название
             $query = "SELECT*FROM npa WHERE name = '$name' and number = '$number'";
             $result = mysqli_query($connect,$query);
             addFunction($result); 
    }else if( "$name" != "" and "$category" !=""){ //Если  известны категория и название
            $query = "SELECT*FROM npa WHERE name = '$name' and category = '$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result); 
    }else if( "$number" != "" and "$category" != ""){ //Если известны номер и категория
            $query = "SELECT*FROM npa WHERE number = '$number' and category ='$category'";
            $result = mysqli_query($connect,$query);
            addFunction($result);
    }else{ 
            $query = "SELECT*FROM npa WHERE (name = '$name') or (number = '$number') or (category = '$category') or (date >='$data_one' and date <='$data_two')";
            $result = mysqli_query($connect,$query);  
            addFunction($result); 
    }

?>
<?php  function addFunction($result) {
                 while($row=mysqli_fetch_array($result)){ ?>
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

<?php }
        } ?>