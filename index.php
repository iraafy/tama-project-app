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
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item pe-5">
						<a class="nav-link" href="#about">About Us</a>
					</li>
					<li class="nav-item pe-5">
						<a class="nav-link" href="#feature">Our Feature</a>
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

	<div class="container pt-5">
		<div class="wrapper">
			<div class="space">
				<div class="row">
					<div class="card shadow">
						<div class="row p-4 space">
							<div class="col-lg-7 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="row">
									<h1 class="welcome-text text-color-primary fw-bold lh-1">
										Tama Hallo
									</h1>
									<p class="welcome-p-text">Membantu mahasiswa dalam permasalahan</p>
								</div>
							</div>
							<div class="col-lg-5 col-sm-12">
								<img src="assets/img/male.png" width="100%" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="p-5" id="about"></div>

			<div class="row" id="about">
				<h2 class="fw-bold text-color-primary text-center">
					Departemen Pendidikan Ilmu Komputer
				</h2>
				<p class="text-black-80 text-center mt-4 lh-lg">
					<i>
						" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nemo corporis aspernatur cum est blanditiis, nostrum totam quae porro facilis veniam in tenetur, quaerat natus dolores exercitationem iure reprehenderit sequi. lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nemo corporis aspernatur cum est blanditiis, nostrum totam quae porro facilis veniam in tenetur, quaerat natus dolores exercitationem iure reprehenderit sequi."
					</i>
				</p>
			</div>

			<div class="row mt-5 pt-5">
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<img src="assets/img/book.png" width="90%" alt="">
					</div>
					<div class="col-lg-6 col-sm-12 d-flex align-items-center justify-content-center">
						<h2 class="fw-bold text-color-primary" style="text-align: justify;">
							Informasi Beasiswa <br><br>
							<span class="text-black mt-4 fw-normal fs-6">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nemo corporis aspernatur cum est blanditiis, nostrum totam quae porro facilis veniam in tenetur, quaerat natus dolores exercitationem iure reprehenderit sequi. lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nemo corporis aspernatur cum est blanditiis, nostrum totam quae porro facilis veniam in tenetur.
							</span>
						</h2>
					</div>
				</div>
			</div>

			<br><br><br><br>
			<div class="row mt-5 p-5" id="feature">
				<h2 class="fw-bold text-color-primary text-center mb-5">
					Our Feature
				</h2>
				<div class="col-lg-6 col-sm-12 pb-4">
					<a href="topik_skripsi.php">
						<div class="card shadow d-flex justify-content-center align-items-center" style="min-height: 300px;">
							<img src="assets/img/skripsi.png" width="50%" class="" alt="skripsi">
							<p class="fs-4 text-color-primary pt-4">Topik Skripsi</p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 col-sm-12 pb-4">
					<a href="rec_ppl.php">
						<div class="card shadow d-flex justify-content-center align-items-center" style="min-height: 300px;">
							<img src="assets/img/ppl.png" width="40%" class="" alt="ppl">
							<p class="fs-4 text-color-primary pt-4">Rekomendasi PPL</p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 col-sm-12 pb-4">
					<a href="forum.php">
						<div class="card shadow d-flex justify-content-center align-items-center" style="min-height: 300px;">
							<img src="assets/img/forum.png" width="40%" class="" alt="forum">
							<p class="fs-4 text-color-primary pt-4">Forum Diskusi</p>
						</div>
					</a>
				</div>
				<div class="col-lg-6 col-sm-12 pb-4">
					<a href="https://ridzky.itch.io/tesproject">
						<div class="card shadow d-flex justify-content-center align-items-center" style="min-height: 300px;">
							<img src="assets/img/denah.png" width="40%" class="" alt="denah">
							<p class="fs-4 text-color-primary pt-4">Denah UPI</p>
						</div>
					</a>
				</div>
			</div>
			<br><br><br><br>

		</div>
	</div>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
	<script>
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
	</script>
</body>

</html>