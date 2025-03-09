<style>
	.fs-21{
		font-size: 12px;
	}
</style>

<div class="container px-5 py-4">
	<h5>Setting Aplikasi</h5>
	<span class="fs-21"><span class="bi bi-house"></span> > Setting Aplikasi</span>
	<br>

	<div class="mt-4">
		<form method="POST" action="./functions/setting_aplikasi.php" enctype="multipart/form-data">
			<?php
				$id = $_SESSION['user']['company_id'];
				$set = $con->query("SELECT * FROM companies WHERE id='$id'");
				foreach($set as $item):
			?>
			<div class="row">
				<div class="col text-center">
					<img src="./assets/img/<?= $item['logo'] ?>" width="200px" id="prev" class="rounded-pill mt-3"><br>
					<label class="mt-3 mb-4 btn btn-sm btn-primary">
						<input type="file" id="logo" name="logo" hidden>
						<span class="bi bi-camera"></span> Ubah Logo
					</label>
				</div>
				<div class="col">
					<div class="form-group mt-2">
						<label>Nama Perusahaan</label>
						<input type="text" name="nama" class="form-control" value="<?= $item['name'] ?>">
					</div>
					<div class="form-group mt-2">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?= $item['email'] ?>">
					</div>
					<div class="form-group mt-2">
						<label>No.Telepon</label>
						<input type="number" name="phone" class="form-control" value="<?= $item['phone'] ?>">
					</div>
					<div class="form-group mt-2">
						<label>Alamat</label>
						<textarea rows="4" name="address" class="form-control"><?= $item['address'] ?></textarea>
					</div>
					<button type="submit" class="btn btn-sm btn-primary w-100 mt-3" name="update"><span class="bi bi-save"></span> Simpan Perubahan</button>
				</div>
			</div>
			<?php endforeach; ?>
		</form>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#logo').on('change', function(event){
		var file = event.target.files[0];

		if(file){
			var read = new FileReader();
			read.onload = function (e){
				$('#prev').attr('src', e.target.result).show();
			};

			read.readAsDataURL(file);
		}
	});
});
</script>