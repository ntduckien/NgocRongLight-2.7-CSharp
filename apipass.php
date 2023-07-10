<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

function update_password($username, $old_password, $new_password) {
   global $conn;
   $stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();
   
   if ($result->num_rows === 0) {
      // User not found in database
      return false;
   } else {
      $row = $result->fetch_assoc();
      if (password_verify($old_password, $row["password"])) {
         // Hash the new password
         $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
         
         // Update the password in the database
         $stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
         $stmt->bind_param("ss", $hashed_password, $username);
         $stmt->execute();
         
         if ($stmt->affected_rows == 1) {
            // Password updated successfully
            return true;
         } else {
            // Password update failed
            return false;
         }
      } else {
         // Incorrect old password
         return false;
      }
   }
}

?>