<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box active" id="login-form">
           <form action="login_register.php" method="post">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="password"required>
            <button type="submit" name="login">Login</button>
            <p>Don't have a account? <a onclick="showForm('Register-form')">Register</a></p>
           </form> 
        </div>
        <div class="form-box" id="Register-form">
           <form action="login_register.php" method="post">
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="password"required>
            <select name="role" required>
                <option value="">--Select Role--</option>
                <option value="user">USER</option>
                <option value="admin">ADMIN</option>
            </select>
            <button type="submit" name="register">Register</button>
            <p>Already have a account? <a onclick="showForm('login-form')">Login</a></p>
           </form> 
        </div>
    </div>
        <script src="script.js"></script>
</body>

</html>