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
	      <h6>Tambah Gudang</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Gudang</label>
	      	<input type="text" id="nm" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Contact Person</label>
	      	<input type="text" id="cp" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">No. Telepon</label>
	      	<input type="text" id="tlp" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Alamat</label>
	      	<textarea rows="3" class="form-control" id="almt"></textarea>
	      </div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
	      <button type="button" class="btn btn-sm btn-primary" id="saveBtn">Simpan</button>
	    </div>
	  </div>
	</div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h6>Edit Gudang</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Gudang</label>
	      	<input type="hidden" id="edit_id">
	      	<input type="text" id="edit_nm" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Contact Person</label>
	      	<input type="text" id="edit_cp" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">No. Telepon</label>
	      	<input type="text" id="edit_tlp" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Alamat</label>
	      	<textarea rows="3" class="form-control" id="edit_almt"></textarea>
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
	<h5>Data Gudang</h5>
	<span class="fs-21"><span class="bi bi-house"></span> > Master Data > Data Gudang</span>
	<br>

	<div class="row">
		<div class="col">
			<button class="btn btn-sm btn-primary mt-4 fs-21" id="addBtn"><span class="bi bi-plus"></span> Tambah Gudang</button>
		</div>
		<div class="col">
			<input type="text" id="search" placeholder="Cari Gudang" class="form-control mt-4 w-50 float-end fs-21">
		</div>
	</div>

	<table class="table table-hover table-bordered fs-21 mt-2">
		<thead>
			<th>No.</th>
			<th>Nama Gudang</th>
			<th>Alamat</th>
			<th>Contact Person</th>
			<th>No.Telepon</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php 
				$sup = $con->query("SELECT * FROM branches");
				foreach($sup as $item):
			?>
			<tr>
				<td>1</td>
				<td><?= $item['name'] ?></td>
				<td><?= $item['address'] ?></td>
				<td><?= $item['contact_person'] ?></td>
				<td><?= $item['no_telp'] ?></td>
				<td>
					<button class="btn btn-sm btn-success" id="editBtn" data-id="<?= $item['id'] ?>" data-nm="<?= $item['name'] ?>" data-cp="<?= $item['contact_person'] ?>" data-tlp="<?= $item['no_telp'] ?>" data-almt="<?= $item['address'] ?>"><span class="bi bi-pencil fs-21"></span></button>
					<button class="btn btn-sm btn-danger" id="delete" data-id="<?= $item['id'] ?>"><span class="bi bi-trash fs-21"></span></button>
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

	$('#saveBtn').on('click', function(){
		var nm = $('#nm').val();
		var cp = $('#cp').val();
		var tlp = $('#tlp').val();
		var almt = $('#almt').val();

		$.ajax({
			url: './functions/master_gudang.php?aksi=simpan',
			type: 'POST',
			data: {
				nm: nm,
				cp: cp,
				tlp: tlp,
				almt: almt
			},
			success: function(){
				$('#addModal').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Data gudang berhasil ditambahkan !'
				});

				window.location.reload();
			}
		})
	})

	$(document).on('click', '#editBtn', function(){
		var id = $(this).data('id');
		var nm = $(this).data('nm');
		var tlp = $(this).data('tlp');
		var almt = $(this).data('almt');
		var cp = $(this).data('cp');

		$('#edit_id').val(id);
		$('#edit_nm').val(nm);
		$('#edit_cp').val(cp);
		$('#edit_tlp').val(tlp);
		$('#edit_almt').val(almt);

		$('#editModal').modal('show');
	});

	$(document).on('click', '#saveEdit', function(){
		var id = $('#edit_id').val();
		var nm= $('#edit_nm').val();
		var cp = $('#edit_cp').val();
		var tlp= $('#edit_tlp').val();
		var almt = $('#edit_almt').val();

		$.ajax({
			url: './functions/master_gudang.php?aksi=edit',
			type: 'POST',
			data: {
				id: id,
				nm: nm,
				cp: cp,
				tlp: tlp,
				almt: almt
			},
			success: function(){
				$('#editModal').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Data gudang berhasil diupdate !'
				});

				window.location.reload();
			}
		})
	});

	$(document).on('click', '#delete', function(){
		var id = $(this).data('id');
		Swal.fire({
			icon: 'question',
			title: 'Hapus Gudang ini ? ',
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url: `./functions/master_gudang.php?aksi=hapus&id=${id}`,
					type: 'GET',
					success: function(){
						Swal.fire({
							icon: 'success',
							title: 'Data Gudang berhasil dihapus !'
						});

						window.location.reload();
					}
				})
			}
		});
	});
});
</script>