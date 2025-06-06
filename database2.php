<?php
$db = mysqli_connect('localhost', 'root', '', 'd_pas');

function select($query) 
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create_pendaftaran($data) {
 global $db;
 $username = $data['username'];
 $email = $data['email'];
 $password = $data['password'];
 $query = "INSERT INTO data_pendaftaran VALUES (null, '$username', '$email', '$password')";
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}
?>