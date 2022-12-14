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
        <a class="btn btn-primary" href="/tama-project-app/create.php" role="button">Create Topic</a>
        <br />
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
                    die("invalid query: " . $connnection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    $linkEdit = "/tama-project-app/edit.php?id=$row[id_topic]";
                    echo "
                    <tr>
                        <td>$row[id_topic]</td>
                        <td>$row[kbk]</td>
                        <td>$row[kajian]</td>
                        <td>$row[deskripsi_kajian]</td>
                        <td>
                            <a type='button' data-bs-toggle='modal' data-bs-target='#exampleModal-$row[id_topic]' class='btn btn-danger btm-sm' href='edit.php?id=$row[id_topic]'>Edit</a>
                            <a class='btn btn-danger btm-sm' href='delete.php?id_topic=$row[id_topic]'>Delete</a>
                        </td>
                    </tr>
                    ";
                    echo "
                    
                    ";
                }

                ?>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-<?= $row['id_topic'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>
</body>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>

</html>