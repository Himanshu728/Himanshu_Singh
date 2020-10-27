<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //getting the roll number value from the home page
        $roll = $_GET["roll"];

        //the required parameter for mysql server connection
        $server = "hsdbserver.mysql.database.azure.com";
        $username = "Himanshu_Singh@hsdbserver";
        $password = "King@1234";
        $database = "student";

        //the server connection function.
        $conn = new mysqli($server, $username, $password, $database);

        if($conn->connect_error === TRUE)
        {
            echo "Sorry failed to connect to database";
        }
        else
        {
            echo "Connected to the database-server and the database" . "<br>";

            //the query to check for roll number in the database.
            $sql_query = "select * from student_info where roll = '$roll'";
            $result = $conn->query($sql_query);

            //checking the result of the query
            if($result->num_rows === 0)
            {
                echo "roll number not present in the database go back" . "<br>";
            }
            else if($result->num_rows >= 1)
            {
                //printing each row having roll value as the input
                while($row = $result->fetch_assoc())
                {
                    echo "Name: " . $row['name'] . "<br>";
                    echo "Roll: " .$row['roll'] . "<br>.";
                    echo "Cgpa: " .$row['cgpa'] . "<br>";
                    echo "Year: " .$row['year'] . "<br>";
                }
            }
        }
    ?>
</body>
</html>
