<?php

//connect to database
$conn = mysqli_connect("localhost", "root", "", "db_tama");

//fungsi registrasi
function registrasi($data)
{

    global $conn;
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $data["password"]));
    $password2 = htmlspecialchars(mysqli_real_escape_string($conn, $data["password2"]));

    //cek duplicate username
    $result_username = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    $result_email = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result_username)) {
        echo "<script>
				alert('username sudah terdaftar!');
			</script>";

        return false;
    }

    if (mysqli_fetch_assoc($result_email)) {
        echo "<script>
				alert('email sudah terdaftar!');
			</script>";

        return false;
    }

    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";

        return false;
    }

    //enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    //add to db
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

function query($query)
{

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
