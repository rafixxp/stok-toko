<style>
	.fs-21{
		font-size: 12px;
	}
</style>

<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h6>Tambah Barang</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Kode Barang</label>
	      	<input type="text" id="kd_brg" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Barang</label>
	      	<input type="text" id="nm_brg" class="form-control">
	      </div>
	      <div class="row">
	      	<div class="col">
	      		<div class="form-group">
			      	<label class="fs-21 fw-bold">Kelompok Barang</label>
			      	<select id="kel" class="form-select">
			      		<option value="">Pilih Kelompok</option>
			      		<option value="makanan">Makanan</option>
			      		<option value="minuman">Minuman</option>
			      		<option value="bahan masakan">Bahan Masakan</option>
			      	</select>
			    </div>
	      	</div>
	      	<div class="col">
	      		<div class="form-group">
			      	<label class="fs-21 fw-bold">Kategori Barang</label>
			      	<select id="kat" class="form-select">
			      		<option value="">Pilih Kategori</option>
			      		<option value="makanan ringan">Makanan Ringan</option>
			      		<option value="camilan">Camilan</option>
			      		<option value="bumbu basah">Bumbu Basah</option>
			      	</select>
			    </div>
	      	</div>
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Satuan</label>
	      	<select id="sat" class="form-select">
	      		<option value="">Pilih Satuan</option>
	      		<option value="pcs">Pcs</option>
	      		<option value="pak">Pak</option>
	      		<option value="bungkus">Bungkus</option>
	      		<option value="dus">Dus</option>
	      	</select>
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Harga Beli</label>
	      	<input type="number" id="beli" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Harga Jual</label>
	      	<input type="number" id="jual" class="form-control">
	      </div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
	      <button type="button" class="btn btn-sm btn-primary" id="savebtn">Simpan</button>
	    </div>
	  </div>
	</div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h6>Edit Barang</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Kode Barang</label>
	      	<input type="hidden" id="edit_id">
	      	<input type="text" id="edit_kd_brg" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Barang</label>
	      	<input type="text" id="edit_nm_brg" class="form-control">
	      </div>
	      <div class="row">
	      	<div class="col">
	      		<div class="form-group">
			      	<label class="fs-21 fw-bold">Kelompok Barang</label>
			      	<select id="edit_kel" class="form-select">
			      		<option value="">Pilih Kelompok</option>
			      		<option value="makanan">Makanan</option>
			      		<option value="minuman">Minuman</option>
			      		<option value="bahan masakan">Bahan Masakan</option>
			      	</select>
			    </div>
	      	</div>
	      	<div class="col">
	      		<div class="form-group">
			      	<label class="fs-21 fw-bold">Kategori Barang</label>
			      	<select id="edit_kat" class="form-select">
			      		<option value="">Pilih Kategori</option>
			      		<option value="makanan ringan">Makanan Ringan</option>
			      		<option value="camilan">Camilan</option>
			      		<option value="bumbu basah">Bumbu Basah</option>
			      	</select>
			    </div>
	      	</div>
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Satuan</label>
	      	<select id="edit_sat" class="form-select">
	      		<option value="">Pilih Satuan</option>
	      		<option value="pcs">Pcs</option>
	      		<option value="pak">Pak</option>
	      		<option value="bungkus">Bungkus</option>
	      		<option value="dus">Dus</option>
	      	</select>
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Harga Beli</label>
	      	<input type="number" id="edit_beli" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Harga Jual</label>
	      	<input type="number" id="edit_jual" class="form-control">
	      </div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
	      <button type="button" class="btn btn-sm btn-primary" id="saveEdit">Simpan</button>
	    </div>
	  </div>
	</div>
</div>

<div class="container px-5 py-4">
	<h5>Data Barang</h5>
	<span class="fs-21"><span class="bi bi-house"></span> > Master Data > Data Barang</span>
	<br>

	<div class="row">
		<div class="col">
			<button class="btn btn-sm btn-primary mt-4 fs-21" id="addBtn"><span class="bi bi-plus"></span> Tambah Barang</button>
		</div>
		<div class="col">
			<input type="text" id="search" placeholder="Cari Barang" class="form-control mt-4 w-50 float-end fs-21">
		</div>
	</div>
	
	<table class="table table-hover table-bordered fs-21 mt-2">
		<thead>
			<th>No.</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php
				$branch = $_SESSION['user']['branch_id'];
				$company = $_SESSION['user']['company_id'];
				$barang = $con->query("SELECT * FROM master_barang");
				foreach($barang as $item):
			?>
			<tr>
				<td>1</td>
				<td><?= $item['kd_brg'] ?></td>
				<td><?= $item['nm_brg'] ?></td>
				<td>Rp.<?= $item['harga_jual'] ?></td>
				<td>
					<button class="btn btn-sm btn-success" id="editBtn" data-id="<?= $item['id'] ?>" data-kd="<?= $item['kd_brg'] ?>" data-nm="<?= $item['nm_brg'] ?>" data-kel="<?= $item['kelompok'] ?>" data-kat="<?= $item['kategori'] ?>" data-sat="<?= $item['satuan'] ?>" data-beli="<?= $item['harga_beli'] ?>" data-jual="<?= $item['harga_jual'] ?>"><span class="bi bi-pencil fs-21"></span></button>
					<button class="btn btn-sm btn-danger" id="delete" data-nm="<?= $item['nm_brg'] ?>" data-id="<?= $item['id'] ?>"><span class="bi bi-trash fs-21"></span></button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script>
$(document).ready(function(){
	$('#addBtn').on('click', function(){
		$('#addModal').modal('show');
	});

	$('#savebtn').on('click', function(){
		var kd = $('#kd_brg').val();
		var nm = $('#nm_brg').val();
		var kel = $('#kel').val();
		var kat = $('#kat').val();
		var sat = $('#sat').val();
		var beli = $('#beli').val();
		var jual = $('#jual').val();

		$.ajax({
			url: './functions/master_barang.php?aksi=simpan',
			type: 'POST',
			data:{
				kd: kd,
				nm: nm,
				kel: kel,
				kat: kat,
				sat: sat,
				beli: beli,
				jual: jual
			},
			success: function(){
				$('#addModal').modal('hide');

				Swal.fire({
					icon: 'success',
					title: 'Data barang berhasil ditambahkan !'
				});

				window.location.reload();
			},
			error:function(){
				Swal.fire({
					icon: 'error',
					title: 'Data barang gagal ditambahkan !'
				})
			}
		})
	});

	$(document).on('click', '#editBtn', function(){
		var id = $(this).data('id');
		var kd = $(this).data('kd');
		var nm = $(this).data('nm');
		var kel = $(this).data('kel');
		var kat = $(this).data('kat');
		var sat = $(this).data('sat');
		var beli = $(this).data('beli');
		var jual = $(this).data('jual');

		$('#edit_id').val(id);
		$('#edit_kd_brg').val(kd);
		$('#edit_nm_brg').val(nm);
		$('#edit_kel').val(kel);
		$('#edit_kat').val(kat);
		$('#edit_sat').val(sat);
		$('#edit_beli').val(beli);
		$('#edit_jual').val(jual);

		$('#editModal').modal('show');
	});

	$(document).on('click', '#saveEdit', function(){
		var id = $('#edit_id').val();
		var kd = $('#edit_kd_brg').val();
		var nm = $('#edit_nm_brg').val();
		var kel = $('#edit_kel').val();
		var kat = $('#edit_kat').val();
		var sat = $('#edit_sat').val();
		var beli = $('#edit_beli').val();
		var jual = $('#edit_jual').val();

		$.ajax({
			url: './functions/master_barang.php?aksi=edit',
			type: 'POST',
			data:{
				id: id,
				kd: kd,
				nm: nm,
				kel: kel,
				kat: kat,
				sat: sat,
				beli: beli,
				jual: jual
			},
			success: function(){
				$('#editModal').modal('hide');

				Swal.fire({
					icon: 'success',
					title: 'Data barang berhasil diupdate !'
				});

				window.location.reload();
			},
			error:function(){
				Swal.fire({
					icon: 'error',
					title: 'Data barang gagal diupdate !'
				})
			}
		})
	});

	$(document).on('click', '#delete', function(){
		var barang = $(this).data('nm');
		var id = $(this).data('id');
		Swal.fire({
			icon: 'question',
			title: 'Hapus data barang ini ? ',
			text: `Barang yang akan dihapus : ${barang}`
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url: `./functions/master_barang.php?aksi=hapus&id=${id}`,
					type: 'GET',
					success: function(){
						Swal.fire({
							icon: 'success',
							title: 'Data barang berhasil dihapus !'
						});

						window.location.reload();
					}
				})
			}
		});
	});

});
</script>