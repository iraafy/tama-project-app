<?php

$connection = new mysqli('localhost', 'root', '', 'db_tama');

$id_topic = "";
$kbk = "";
$kajian = "";
$deskripsi_kajian = "";
$content = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if ( !isset($_GET["id_topic"])) {
        // header("location: /tama-project-app/table.php");
        exit;
    }


    $id_topic = $_GET["id_topic"];

    $sql = "SELECT * FROM topic WHERE id_topic=$id_topic";
    $result = $connection->query($sql);
   
    $row = $result->fetch_assoc();

    if (!$row) {
        // header("location: /tama-project-app/table.php");
        exit;
    }

    $kbk = $row["kbk"];
    $kajian = $row["kajian"];
    $deskripsi_kajian = $row["deskripsi_kajian"];
    $content = $row["content"];
}
else{

    $id_topic = $_POST["id_topic"];
    $kbk = $_POST["kbk"];
    $kajian = $_POST["kajian"];
    $deskripsi_kajian = $_POST["deskripsi_kajian"];
    $content = $_POST["content"];

    
        if ( empty($kbk) || empty($kajian) || empty($deskripsi_kajian) || empty($content)) {
            $errorMessage = "All The Fields Are Required";
        }

        $sql = "UPDATE topic " .
                " SET kbk = '$kbk', kajian = '$kajian', deskripsi_kajian = '$deskripsi_kajian' , content = '$content' ".
                " WHERE id_topic = $id_topic" ;

        $result = $connection->query($sql);

        print_r($result);

        if (!$result) {
            $errorMessage = "Invalid Query: ";
        }

        $successMessage = "Updated Correctly";

        header("location: /tama-project-app/table_topic.php");
        exit;

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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Topic</h2>

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
            <input type="hidden" name="id_topic" value="<?php echo $id_topic; ?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Nama KBK</label>
                <div class="col-sm-6">
                    <select name="kbk" class="form-control">
                        <option selected><?php echo $kbk; ?></option>
                        <option value="<?php echo $kbk; ?>">Data</option>
                        <option value="<?php echo $kbk; ?>">RPL</option>
                        <option value="<?php echo $kbk; ?>">Multimedia</option>
                    </select>
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Kajian</label>
                <div class="col-sm-6">
                    <option selected><?php echo $kajian; ?></option>
                    <option value="<?php echo $kajian; ?>">Big Data</option>
                    <option value="<?php echo $kajian; ?>">RPL</option>
                    <option value="<?php echo $kajian; ?>">Deep Learning</option>
                    
                    <option value="<?php echo $kajian; ?>">Design Mobile App</option>
                    <option value="<?php echo $kajian; ?>">Design Web App</option>
                    <option value="<?php echo $kajian; ?>">How To Make Games</option>
                    
                    <option value="<?php echo $kajian; ?>">Create AR</option>
                    <option value="<?php echo $kajian; ?>">Create Logo</option>
                    <option value="<?php echo $kajian; ?>">Photo Editing</option>
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Deskripsi Kajian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="deskripsi_kajian" value="<?php echo $deskripsi_kajian; ?>">
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-6">
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"><?php echo"$content" ?></trix-editor>
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