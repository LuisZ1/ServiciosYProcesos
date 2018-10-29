<html>
    <?php
    $selected_val = $_POST['gender'];
    if($selected_val === "male"){
        echo '<body style="background-color:cyan">';
    }else{
        if($selected_val === "female"){
            echo '<body style="background-color:hotpink">';
        }else{
            echo '<body style="background-color:forestgreen">';
        }
    }
    ?>
        <p>
            Welcome <?php echo $_POST["firstname"]; ?><br>
            Your lastname is: <?php echo $_POST["lastname"]; ?> <br>
        </p>
    </body>
</html>