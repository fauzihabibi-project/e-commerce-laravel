<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-COMMERCE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		main {
			flex: 1;
		}
	</style>

	@livewireStyles
</head>

<body>

	<!-- Navbar -->
	<livewire:atom.navbar-user />

	<!-- Konten utama -->
	<main>
		{{ $slot }}
	</main>

	<!-- Footer -->
	<footer class="mt-auto">
		<livewire:atom.footer-user />
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	@livewireScripts
</body>

</html>