<?php
$datafile = "../data.json";

if(file_exists($datafile)){
    $data = file_get_contents($datafile);
    $users = json_decode($data, true);
} else {
    $users = [];
}

// get last user safely
$lastUser = end($users);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>

<h2>Last Registered User</h2>

<table border="1">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Website</th>
    <th>Comment</th>
    <th>Gender</th>
</tr>

<?php
if($lastUser) {
?>
<tr>
    <td><?= $lastUser["Name"] ?></td>
    <td><?= $lastUser["Email"] ?></td>
    <td><?= $lastUser["Website"] ?></td>
    <td><?= $lastUser["Comment"] ?></td>
    <td><?= $lastUser["Gender"] ?></td>
</tr>
<?php
}
?>

</table>

</body>
</html>