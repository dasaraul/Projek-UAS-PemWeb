<?php
// Include the database connection file
require_once("bwatkonek.php");

if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement    
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_DEFAULT));
    $namalengkap = mysqli_real_escape_string($mysqli, $_POST['namalengkap']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        
    // Check for empty fields
    if (empty($username) || empty($password) || empty($namalengkap) || empty($email)) {
        if (empty($username)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }

        if (empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }

        if (empty($namalengkap)) {
            echo "<font color='red'>Nama Lengkap field is empty.</font><br/>";
        }
        
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // If all the fields are filled (not empty) 

        // Insert data into database
        $result = mysqli_query($mysqli, "INSERT INTO users (`username`, `password`, `namalengkap`, `email`) VALUES ('$username', '$password', '$namalengkap', '$email')");
        
        // Display success message
        echo "<p><font color='green'>Data added successfully!</p>";
        echo "<a href='index.php'>View Result</a>";
    }
}
?>
