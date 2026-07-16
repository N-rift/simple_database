<?php

$conn = new mysqli("localhost", "root", "", "robot_db");

if ($conn->connect_error) {
    die("Connection failed");
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users(name, age)
            VALUES('$name','$age')";

    $conn->query($sql);
}

if(isset($_GET['toggle'])){

    $id = $_GET['toggle'];

    $result = $conn->query(
        "SELECT status FROM users WHERE id=$id"
    );

    $row = $result->fetch_assoc();

    $newStatus = $row['status'] ? 0 : 1;

    $conn->query(
        "UPDATE users
         SET status=$newStatus
         WHERE id=$id"
    );
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>User Form</title>

    <link rel="stylesheet"
          href="style.css">

</head>
<body>

<h1>User Management</h1>

<form method="POST">

    <input
        type="text"
        name="name"
        placeholder="Name"
        required>

    <input
        type="number"
        name="age"
        placeholder="Age"
        required>

    <button
        type="submit"
        name="submit">
        Submit
    </button>

</form>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php

$result = $conn->query(
    "SELECT * FROM users"
);

while($row = $result->fetch_assoc()){

    echo "<tr>";

    echo "<td>".$row['id']."</td>";

    echo "<td>".$row['name']."</td>";

    echo "<td>".$row['age']."</td>";

    echo "<td>".$row['status']."</td>";

    echo "<td>
          <a href='?toggle=".$row['id']."'>
          Toggle
          </a>
          </td>";

    echo "</tr>";
}

?>

</table>

</body>
</html>