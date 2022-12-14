<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_tama');
$topic = mysqli_query($conn, 'SELECT * FROM topic');


$kbk = "";
$kajian = "";
$deskripsi_kajian = "";
$content = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kbk = $_POST["kbk"];
    $kajian = $_POST["kajian"];
    $deskripsi_kajian = $_POST["deskripsi_kajian"];
    $content = $_POST["content"];

    do {
        if ( empty($kbk) || empty($kajian) || empty($deskripsi_kajian)) {
            $errorMessage = "All The Fields Are Required";
            break;
        }

        $sql = "INSERT INTO topic (kbk, kajian, deskripsi_kajian, content) " .
                "VALUES ('$kbk', '$kajian', '$deskripsi_kajian', '$content') ";

        $result = $conn->query($sql);
        
        print_r($result);

        if (!$result) {
            $errorMessage = "invalid query: " . $conn->error;
        }

        $kbk = "";
        $kajian = "";
        $deskripsi_kajian = "";
        $content = "";

        $successMessage = "Add Correctly";

    }while (false);
    header("location: /tama-project-app/table_topic.php");
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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
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
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Nama KBK</label>
                <div class="col-sm-6">
                <select name="kbk" class="form-control">
                    <option selected>Choose...</option>
                    <option value="Data">Data</option>
                    <option value="RPL">RPL</option>
                    <option value="Multimedia">Multimedia</option>
                </select>
                    <!-- <input type="text" class="form-control" name="kbk" value="<?php echo $kbk; ?>"> -->
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
                    <input type="text" class="form-control" name="deskripsi_kajian" value="<?php echo $deskripsi_kajian; ?>">
                </div> 
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-6">
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content" value="<?php echo"$content" ?>"></trix-editor>
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