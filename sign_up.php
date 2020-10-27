<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //getting the values from the sign up page
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $cgpa = $_POST["cgpa"];
        $year = $_POST["year"];

        //passing the connecion parameter
        $server = "hsdbserver.mysql.database.azure.com";
        $username = "Himanshu_Singh@hsdbserver";
        $password = "King@1234";
        $database = "student";

        //checking the connection
        $conn = new mysqli($server, $username, $password, $database);
        if($conn->connect_error === TRUE)
        {
            echo "Sorry connection to database failed" . "<br>";
        }
        else
        {
            echo "Connected to the database-server and the database" . "<br>";

            //entering the value into the database
            $sql_query = "insert into student_info (name, roll, cgpa, year) values('$name', '$roll', '$cgpa', '$year')";

            //checking the query
            if($conn->query($sql_query) === TRUE)
            {
                echo "Created the record successfully";
            }
            else
            {
                echo "Failed to enter the record";
            }
        }
    ?>
</body>
</html>
