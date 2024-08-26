<!-- connection -->
<?php
    $servername = "sql101.infinityfree.com";
    $username = "if0_36775807";
    $password = "gl5wFvGPlkIY";
    $database = "if0_36775807_student_DB";
  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
  
    // Check connection
    if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error);
    }else{  
      echo "connected! <br> " ;
    }   
?>
<?php
        function deleteData($emailDelete){

            global $conn;

            $delete = $conn->prepare("DELETE FROM student_info WHERE EMAIL_ADDRESS = ?");
            $delete->bind_param("s", $emailDelete);
            
            if($delete->execute()){
                if($delete->affected_rows > 0){
                echo "DATA DELETED";
                }else{
                echo "FAILED";
                }
            }

            
        }

    if(isset($_POST['submit-delete'])){
        deleteData($_POST['emailDelete']);
    }

    
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Delete Page</title>
    </head>

    <body>
    <div class="back">
        <a href="http://localhost/practice_php_1/index_select_page.php">
            <img class="allBack" src="back-svgrepo-com (1).svg">
        </a>
    </div>
        <div class="delete-page">
                <div class="delete">
                    <div class="delete-paragraph">
                        <p>DELETE DATA</p>
                    </div>
                    <div class="delete-form">
                        <form class="form" method="POST"action="http://localhost/practice_php_1/index_delete_page.php">
                            Enter Email <input type="text" name="emailDelete">
                            <input class="delete-button" type="submit" value="SUBMIT" name="submit-delete">
                        </form>
                    </div>

                </div>
        </div>
        
    </body>
</html>