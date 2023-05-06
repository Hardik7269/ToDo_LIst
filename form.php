<html>
<head>
    <title>Add Data to Database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align = "center">
    <div class = "div1">
        
        
        <form method="post" action="">
        <p class = "todowiz">To-Do Wizard </p>
        <input type="date" name="date" class = "date">
        <input type="text" name="task" class = "task" placeholder=" So, What you gonna Do Today 😎"><br><br>
            <input type="submit" name="add" value="Add Task" class = "add" id = "submit" onclick="addfunction()" >
            <input type="submit" name="delete" value="Task Done" class = "done" id = "submit" onclick = "deletefuction()">
        </form>
    </div>
<div class = "div2">
<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "student";

// Establishing connection
$conn = new mysqli($server, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['add'])) {
    // Retrieve data from form
    $date = $_POST["date"];
    $task = $_POST["task"];

    // Insert data into database
    $sql = "INSERT INTO todolist (Date, Task) VALUES ('$date', '$task')";
    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully 👍";
        echo "<br> <br>";
    }

    header('Location: form.php');
}
//for deleting from the table
if (isset($_POST['delete'])) {
    // Retrieve data from form
    $sql = "DELETE FROM todolist";
    mysqli_query($conn, $sql);

    // header('Location: form.php');
}

//printing data
$sql = "SELECT * FROM todolist";
$result = $conn->query($sql);
echo "<table class = 'table' align = center >";
echo "<tr><th>Date</th><th>Task</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Date"] . "</td><td>" . $row["Task"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2' align = 'center'>No Task ToDo 🫠</td></tr>";
}
echo "</table>";

$conn->close();
?>
<script>
    function addfunction(){
        alert("Task is Added 😁.! Wihs you Luck 😉👍");
    }
    function deletefuction(){
        alert("Well Done 👌");
    }
</script>
</div>
</body>
</html>