<?php
    require 'header.php';
    verifyLoggedIn();
?>
    <center>
        <h1>Modify User Details</h1>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right"><b>User ID:</b></td>
                    <td align="left"><?php echo $_SESSION['id'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Username:</b></td>
                    <td align="left">
                        <label for="username"></label>
                        <input type="text" id="username" name="username"
                               value="<?php echo $_SESSION['username'] ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Email:</b></td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="email" id="email" name="email"
                               value="<?php echo $_SESSION['email'] ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Password:</b></td>
                    <td align="left">
                        <label for="password"></label>
                        <input type="password" id="password" name="password"
                               value="<?php echo $_SESSION['password'] ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Phone Number:</b></td>
                    <td align="left">
                        <label for="phone"></label>
                        <input type="text" id="phone" name="phone"
                               value="<?php echo $_SESSION['phone'] ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Gender:</b></td>
                    <td align="left"><?php echo $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Joined:</b></td>
                    <td align="left"><?php echo $_SESSION['joined'] ?></td>
                </tr>
            </table>
            <br>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') update() ?>
            <input type="submit" value="Update">
        </form>
    </center>

<?php include 'footer.php' ?>