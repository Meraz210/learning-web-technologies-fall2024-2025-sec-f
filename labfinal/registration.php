<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $marital_status = $_POST['marital_status'];

    
    if (empty($name) || empty($id) || empty($password) || empty($email) || empty($address) || empty($marital_status)) {
        
        header("Location: registration.html?error=1");
        exit();
    } else {
        
        echo "<h1>Registration Successful!</h1>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>ID:</strong> $id</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Marital Status:</strong> $marital_status</p>";

        $sql = "INSERT INTO users (name, id, password, email, address, marital_status) 
                VALUES ('$name', '$id', '$password', '$email', '$address', '$marital_status')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        
    }
} else {
   
    echo "<h1>Error: Form submission failed. Please try again.</h1>";
}
?>
