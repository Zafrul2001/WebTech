<?php
include '../controller/showWorker-control.php';



if ($result) {
?>
    <h2>Worker Details</h2>
    <form>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $result['username']; ?>" readonly><br><br>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $result['full_name']; ?>" readonly><br><br>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $result['gender']; ?>" readonly><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $result['email']; ?>" readonly><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>" readonly><br><br>

        <label for="profession">Profession:</label>
        <input type="text" id="profession" name="profession" value="<?php echo $result['profession']; ?>" readonly><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $result['address']; ?>" readonly><br><br>

        <label for="picture">Picture:</label><br>
        <img src="<?php echo $result['picture']; ?>" alt="Worker Picture" style="max-width: 150px;"><br><br>

        <label for="document">Document:</label>
        <a href="<?php echo $result['document']; ?>" download>Download Document</a><br><br>
    </form>
<?php
} else {
    echo "<p>No worker found with the provided username.</p>";
}
?>
