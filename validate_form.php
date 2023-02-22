<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $error_message = '';

    // Validate the name field
    if (empty($name)) {
        $name_error .= 'Name is required';
        header('location:index.php?name_error=' . $name_error);
        exit();
    }

    // Validate the email field
    if (empty($email)) {
        $email_error .= 'Email is required';
        header('location:index.php?email_error=' . $email_error);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error .= 'Invalid email format';
        header('location:index.php?email_error=' . $email_error);
    }

    // Validate the message field
    if (empty($message)) {
        $error_message .= 'Message is required';
        header('location:index.php?error_message=' . $error_message);
    }

    if (empty($error_message)) {
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database_name";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if ($conn) {
            $final_error = "Couldn't Connect to DB";
            echo mysqli_connect_error();
            header('location:index.php?final_error=' . $final_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO test (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
        $sql_result = mysqli_query($conn, $sql);
        if ($sql_result) {
            $final_success = "Data Inserted Successfully";
            header('location:index.php?final_success=' . $final_success);
        } else {
            $final_error = "Some error occured";
            header('location:index.php?final_error=' . $final_error);
        }
    } else {
        echo $error_message;
    }
}
