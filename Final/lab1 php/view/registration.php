<!DOCTYPE html>
<html>
<head>
    <title>Registration log in Form</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td><p style='color:red'>required field *</p></td>
            </tr>

            <tr>
                <td><label for="name">Username:</label></td>
                <td><input type="text" id="name" name="name"></td>
                <td><p style='color:red'>*</p></td>
            </tr>

            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"></td>
                <td><p style='color:red'>*</p></td>
            </tr>

            <tr>
                <td><label for="website">Website:</label></td>
                <td><input type="url" id="website" name="website"></td>
                <td><p style='color:red'>*</p></td>
            </tr>

            <tr>
                <td><label for="comment">Comment:</label></td>
                <td><textarea name="comment" id="comment"></textarea></td>
                <td><p style='color:red'>*</p></td>
            </tr>

            <tr>
                <td><label>Gender:</label></td>
                <td colspan="2">
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female">Female</label>

                    <input type="radio" name="gender" id="male" value="Male" style="margin-left:15px;">
                    <label for="male">Male</label>

                    <input type="radio" name="gender" id="other" value="Other" style="margin-left:15px;">
                    <label for="other">Other</label>
                </td>
            </tr>

            <tr>
                <td><input type="submit" id="submit" name="submit"></td>
            </tr>

        </table>
    </form>
</body>
</html>