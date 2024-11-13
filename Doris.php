<?php
// Database connection details
$host = 'localhost';  // Database server (usually localhost)
$username = 'root';   // Database username
$password = '';       // Database password
$dbname = 'feedback_system';  // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback_text = $conn->real_escape_string($_POST['feedback_text']);

    // SQL query to insert feedback into the database
    $sql = "INSERT INTO feedback (name, email, feedback_text) VALUES ('$name', '$email', '$feedback_text')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "<p>Feedback submitted successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <h2>Submit Your Feedback</h2>
    <form action="feedback_system.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="feedback_text">Your Feedback:</label><br>
        <textarea id="feedback_text" name="feedback_text" rows="5" required></textarea><br><br>

        <input type="submit" value="Submit Feedback">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

<!---
NUWAHEREZA633/NUWAHEREZA633 is a ✨ special ✨ repository because its `README.md` (this file) appears on your GitHub profile.
You can click the Preview link to take a look at your changes.
--->
