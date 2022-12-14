
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Lis of Topic</h2>
        <a class="btn btn-primary" href="/tama-project-app/create_topic.php" role="button">Create Topic</a>
        <br/>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>KBK</th>
                    <th>Kajian</th>
                    <th>Deskripsi Kajian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $connection = new mysqli('localhost', 'root', '', 'db_tama');
                $sql = "SELECT * FROM topic";

                $result = $connection->query($sql);

                if (!$result) {
                    die("invalid query: ". $connnection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id_topic]</td>
                        <td>$row[kbk]</td>
                        <td>$row[kajian]</td>
                        <td>$row[deskripsi_kajian]</td>
                        <td>
                            <a class='btn btn-danger btm-sm' href='edit_topic.php?id_topic=$row[id_topic]'>Edit</a>
                            <a class='btn btn-danger btm-sm' href='delete_topic.php?id_topic=$row[id_topic]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>