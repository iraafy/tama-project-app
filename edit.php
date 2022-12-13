<?php

$connection = new mysqli('localhost', 'root', '', 'db_tama');

$id_topic = "";
$kbk = "";
$kajian = "";
$deskripsi_kajian = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if ( !isset($GET["id_topic"])) {
        header("location: /tama-project-app/table.php");
        exit;
    }


    $id_topic = $_GET["id"];

    $sql = "SELECT * FROM topic WHERE id=$id_topic";
    $result = $connection->query($sql);
   
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /tama-project-app/table.php");
        exit;
    }

    $kbk = $row["kbk"];
    $kajian = $row["kajian"];
    $deskripsi_kajian = $row["deskripsi_kajian"];
}
else{

    $kbk = $row["kbk"];
    $kajian = $row["kajian"];
    $deskripsi_kajian = $row["deskripsi_kajian"];

    do {
        if ( empty($kbk) || empty($kajian) || empty($deskripsi_kajian)) {
            $errorMessage = "All The Fields Are Required";
            break;
        }

        $sql = "UPDATE topic " .
                "SET kbk = '$kbk', kajian = '$kajian', deskrips_kajian = '$deskripsi_kajian' ".
                "WHERE id = $id_topic" ;

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->$error;
            break;
        }

        $successMessage = "Updated Correctly";

        header("location: /tama-project-app/table.php");
        exit;

    }while(false);

}

?>


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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Create New Topic</h2>

        <?php
        if ( !empty($errorMessage)){
            echo "
            <div class='alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id_topic; ?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Nama KBK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kbk" value="<?php echo $kbk; ?>">
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Kajian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kajian" value="<?php echo $kajian; ?>">
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Deskripsi Kajian</label>
                <div class="col-sm-6">
                    <textarea type="text" class="form-control" rows="5" name="deskripsi_kajian" value="<?php echo $deskripsi_kajian; ?>"></textarea>
                </div> 
            </div>

            <?php
            if ( !empty($successMessage)){
                echo "
                <div class='row -mb-3>
                    <div class='offset-sm-3 col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="table.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>