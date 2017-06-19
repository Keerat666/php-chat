<?php 
 include 'db.php';
?>
 
<!DOCTYPE html>
<html>
<head>
    
<title>Lets chat </title>    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div id="container">
    
    <div id="chat_box">
     <?php
        $query="SELECT *  FROM chat2 ORDER BY id";
        $run=$con->query($query);
        while($row=$run->fetch_array()) :
            
            
        ?>
        
    
        <div id="chat_data">
        
            <span style="color:green"><?php echo $row['name']?></span>:
            <span style="color:brown"><?php echo $row['message']?></span>
            <span style="float:right"><?php echo $row['date']?></span>
        
        <?php endwhile;?>
        </div>
    
    </div>
    <form method="post" action="index.php">
    
    <input type="text" name="name" placeholder="Enter name"/>
      <textarea name="message" placeholder="Enter Message"></textarea>  
        <input type="submit" name="submit" value="Send it"/> 
    
    </form>
    <?php
    
    if(isset($_POST['submit']))
    {
            $name=$_POST['name'];
            $message=$_POST['message'];
            $query="INSERT INTO CHAT2 (name,message)values ('$name', '$message')";
            $run = $con->query($query);
        
        if($run)
            echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";

    }
    
    ?>
    
</div>
    
    
    
</body>
</html>