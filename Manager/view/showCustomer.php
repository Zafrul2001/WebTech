<?php
include '../controller/showCustomer-controll.php'; 

if ($result) { 
?>
    <h2>Customer Details</h2>
    <form action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $result['username']; ?>" readonly><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $result['first_name']; ?>" readonly><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $result['last_name']; ?>" readonly><br><br>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $result['gender']; ?>" readonly><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $result['email']; ?>" readonly><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>" readonly><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $result['address']; ?>" readonly><br><br>

        <label for="file_upload">Uploaded File:</label><br>
        <a href="<?php echo $result['file_upload']; ?>" download>Download File</a><br><br>

        <label for="is_active">Status:</label>
        <input type="text" id="is_active" name="is_active" value="<?php echo ($result['is_active'] == 1) ? 'Active' : 'Inactive'; ?>" readonly><br><br>
    </form>
<?php
} else {
    echo "<p>No customer found with the provided username.</p>";
}
?>
