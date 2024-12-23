<?php
include 'config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="name">
        <input type="email" name="email" placeholder="email">
        <select name="role" id="role">
            <?php
            $role = "SELECT * FROM role";
            $resultRule = $conn->query($role);
            while($rowRule = $resultRule->fetch_assoc()){
                echo("<option value=".$rowRule['roleId'].">".$rowRule['name']."</option>");
            }
            ?>
        </select>
        <button type="submit" name="submit">save</button>
    </form>

    <?php
    if(isset($_POST["submit"])){
        if(empty("name") || empty("email")){
            echo("remplir tous les champs");
        }else{
            $name=$_POST['name'];
            $email=$_POST['email'];
            $role=$_POST['role'];

            $stmt = $conn->prepare("INSERT INTO users(name, email, roleId) VALUES (?,?,?) ");
            $stmt->bind_param("ssi",$name, $email, $role);
            $stmt->execute();
            $stmt->close();

        }
    }
    
    ?>
</body>
</html>