<?php include 'header.php'; ?>
    <center>
        <h1>User Profile</h1>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">User ID:</td>
                    <td align="left"><?php echo $_SESSION['id'] ?></td>
                </tr>
                <tr>
                    <td align="right">Username:</td>
                    <td align="left"><?php echo $_SESSION['username'] ?></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td align="left"><?php echo $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td align="left"><?php echo $_SESSION['password'] ?></td>
                </tr>
                <tr>
                    <td align="right">Phone Number:</td>
                    <td align="left"><?php echo $_SESSION['phone'] ?></td>
                </tr>
                <tr>
                    <td align="right">Gender:</td>
                    <td align="left"><?php echo $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                    <td align="right">Joined:</td>
                    <td align="left"><?php echo $_SESSION['joined'] ?></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Modify">
        </form>
    </center>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("location: modifyProfile.php");
    die();
} ?>

<?php include 'footer.php' ?>