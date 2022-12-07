<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_tama');
$topic = mysqli_query($conn, 'SELECT * FROM topic');
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
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<iconify-icon inline icon="fluent-emoji:robot" class="fs-2"></iconify-icon>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-5">
					<li class="nav-item">
						<a class="nav-link" href="index.php#about">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php#feature">Our Feature</a>
					</li>
					<?php if (isset($_SESSION["login"])) { ?>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Login</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">
								<iconify-icon inline icon="clarity:logout-line" style="color: #592c75;"></iconify-icon> Logout
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>

	<!-- <br><br><br><br>
        <h1 class="text-center">TOPIK SKRIPSI</h1>
        <br>
		<div class="row">
			<div class="col-4">
                <div class="border-end bg-white" id="sidebar-wrapper">
                    <div class="sidebar-heading border-bottom bg-light">Jenis Program</div>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">UI/UX Designer</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Web Developer</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Backend Engineer</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Frontend Engineer</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Data Analyst</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Machine Learning</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Mobile Programming</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="assets/img/denah.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="assets/img/denah.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="assets/img/denah.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="assets/img/denah.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                          <div class="col-md-4">
                            <img src="assets/img/denah.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>

	</div> -->
	<div class="wrappers mt-5">
		<div id="sidebar">
			<!-- <div class="row"> -->
			<div class="mt-3 pt-4">
				<?php foreach ($topic as $keytopic) { ?>
					<ul>
						<li>
							<?php $getID = $keytopic['id_topic'] ?>
							<a href="topik_skripsi.php?id_topic=<?php echo $getID ?>" style="color: black;">
								<?= $keytopic['kajian']; ?>
							</a>
						</li>
					</ul>
				<?php } ?>
			</div>
			<!-- </div> -->
		</div>

		<div id="content" class="p-4">
			<button class="btn btn-outline-danger hidden-btn mt-2 mb-4 ps-2 pe-2" id="sidebarBtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="iconify-inline" data-icon="cil:menu"></span>
				&nbsp;Materi
			</button>
			<div class="row">
				<?php if (isset($_GET['id_topic'])) { ?>
					<?php foreach ($topic as $keyytopic) { ?>
						<?php if ($_GET['id_topic'] == $keyytopic['id_topic']) { ?>
							<div class="row pe-4 mb-5 mt-3">
								<h4>
									<?php echo $keyytopic['deskripsi_kajian']; ?>
								</h4>
								<!-- <p class="mt-2" style="text-align: justify">
									<?php echo $keyytopic['content']; ?>
								</p> -->
								<!-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/8gS8ecKG63k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
							</div>
						<?php } ?>
					<?php } ?>
				<?php } else { ?>
					<h5 class="pt-3">Silahkan Pilih Topik</h5>
				<?php } ?>
			</div>
		</div>
	</div>



	<button class="btn btn-outline-danger hidden-btn mt-2 mb-4 ps-2 pe-2" id="sidebarBtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="iconify-inline" data-icon="cil:menu"></span>
		&nbsp;Materi
	</button>

	<!-- iconify -->
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#sidebarBtn').on('click', function() {
				$('#sidebar').toggleClass('active');
				$(this).toggleClass('active');
			});
		});
	</script>
	<!-- <script>
		const li = document.querySelectorAll('.nav-item');
		const sec = document.querySelectorAll('section');

		function activeMenu() {
			let len = sec.length;
			while (--len && window.scrollY + 97 < sec[len].offsetTop) {}
			li.forEach(ltx => ltx.classList.remove('active'));
			li[len].classList.add('active');
		}
		activeMenu();
		window.addEventListener('scroll', activeMenu);
	</script> -->
</body>

</html>