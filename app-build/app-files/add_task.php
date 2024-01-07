<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    
    $employeeName = $data->employeeName;
    $taskDescription = $data->taskDescription;
    $taskDate = $data->taskDate;
//////////////////////////////////////////////////////////////////////////
    // Replace these values with your MySQL server configuration
    $host = "192.168.91.23";      #  IP of k8 cluster host or Rds IP 
    $username = "admin";
    $password = "password";
    $database = "todoapp";

    $conn = new mysqli($host, $username, $password, $database);

/////////////////////////////////////////////////////////////////////////


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tasks (employee_name, task_description, task_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $employeeName, $taskDescription, $taskDate);

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    if ($success) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>

