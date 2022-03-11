<?php
    include '../includes/header.php';
    include 'users.php'
?>
    <center>
        <h1>Create An Account</h1><br>
        <form style="max-width: 25rem" name="f" action="" method="POST" novalidate>
            <table>
                <tr>
                    <td align="right">Username</td>
                    <td align="left">
                        <label for="username"></label>
                        <input type="text" id="username" name="username">
                    </td>
                </tr>
                <tr>
                    <td align="right">Email</td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="text" id="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td align="left">
                        <label for="password"></label>
                        <input type="password" id="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td align="right">Confirm Password</td>
                    <td align="left">
                        <label for="cpassword"></label>
                        <input type="password" id="cpassword" name="cpassword">
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone Number</td>
                    <td align="left">
                        <label for="phone"></label>
                        <input type="text" id="phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td align="right">Gender</td>
                    <td align="left">
                        <input type="radio" id="male" name="gender" value="Male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                    </td>
                </tr>
            </table>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') register($user) ?>
            <br>
            <input type="submit" value="Register">
            <br><br><br>
            <span>Already have an account? <a href="login.php">Login</a></span>
        </form>
    </center>

<?php include '../includes/footer.php' ?>