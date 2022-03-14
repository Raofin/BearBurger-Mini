<?php
    require 'header.php';
    require '../Controller/registration.php';
    if (isset($_SESSION['username'])) {
        header("location: home.php");
        die();
    }
?>
    <center>
        <h1>Create an Account</h1>
        <form style="max-width: 25rem" name="f" action="" method="POST" novalidate>
            <table>
                <tr>
                    <td align="right">Username</td>
                    <td align="left">
                        <label for="username"></label>
                        <input type="text" id="username" name="username"
                               value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Email</td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="text" id="email" name="email"
                               value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td align="left">
                        <label for="password"></label>
                        <input type="password" id="password" name="password"
                               value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Confirm Password</td>
                    <td align="left">
                        <label for="cpassword"></label>
                        <input type="password" id="cpassword" name="cpassword"
                               value="<?php echo isset($_POST['cpassword']) ? $_POST['cpassword'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone Number</td>
                    <td align="left">
                        <label for="phone"></label>
                        <input type="text" id="phone" name="phone"
                               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Gender</td>
                    <td align="left">
                        <input type="radio" id="male" name="gender" value="Male"
                            <?php echo isset($_POST['gender']) && $_POST['gender'] === "Male"
                                ? 'checked="checked"' : '' ?>
                               required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female"
                            <?php echo isset($_POST['gender']) && $_POST['gender'] === "Female"
                                ? 'checked="checked"' : '' ?>>
                        <label for="female">Female</label>
                    </td>
                </tr>
            </table>
            <?php
                if (isset($_SESSION['regSuccess'])) {
                    echo "<h3 style=\"color:forestgreen;\">Registration Successful.</h3>";
                    unset($_SESSION['regSuccess']);
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') register();
            ?>
            <br>
            <input type="submit" value="Register">
            <br><br><br>
            <span>Already have an account? <a href="login.php">Login</a></span>
        </form>
    </center>

<?php include 'footer.php' ?>