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
	      <h6>Tambah Supplier</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Kode Supplier</label>
	      	<input type="text" id="kd_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Supplier</label>
	      	<input type="text" id="nm_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Contact Person</label>
	      	<input type="text" id="cp_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nomor Telepon</label>
	      	<input type="number" id="tlp_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Alamat Supplier</label>
	      	<textarea id="almt_sup" class="form-control" rows="3"></textarea>
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
	      <h6>Edit Supplier</h6>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Kode Supplier</label>
	      	<input type="hidden" id="edit_id">
	      	<input type="text" id="edit_kd_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nama Supplier</label>
	      	<input type="text" id="edit_nm_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Contact Person</label>
	      	<input type="text" id="edit_cp_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Nomor Telepon</label>
	      	<input type="number" id="edit_tlp_sup" class="form-control">
	      </div>
	      <div class="form-group">
	      	<label class="fs-21 fw-bold">Alamat Supplier</label>
	      	<textarea id="edit_almt_sup" class="form-control" rows="3"></textarea>
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
	<h5>Data Supplier</h5>
	<span class="fs-21"><span class="bi bi-house"></span> > Master Data > Data Supplier</span>
	<br>

	<div class="row">
		<div class="col">
			<button class="btn btn-sm btn-primary mt-4 fs-21" id="addBtn"><span class="bi bi-plus"></span> Tambah Supplier</button>
		</div>
		<div class="col">
			<input type="text" id="search" placeholder="Cari Supplier" class="form-control mt-4 w-50 float-end fs-21">
		</div>
	</div>

	<table class="table table-hover table-bordered fs-21 mt-2">
		<thead>
			<th>No.</th>
			<th>Kode Supplier</th>
			<th>Nama Supplier</th>
			<th>VIC/Contact Person</th>
			<th>Nomor Telepon</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php 
				$sup = $con->query("SELECT * FROM master_supplier");
				foreach($sup as $item):
			?>
			<tr>
				<td>1</td>
				<td><?= $item['kd_sup'] ?></td>
				<td><?= $item['nm_sup'] ?></td>
				<td><?= $item['contact_person'] ?></td>
				<td><?= $item['no_tlp'] ?></td>
				<td>
					<button class="btn btn-sm btn-success" id="editBtn" data-id="<?= $item['id'] ?>" data-kd="<?= $item['kd_sup'] ?>" data-nm="<?= $item['nm_sup'] ?>" data-cp="<?= $item['contact_person'] ?>" data-tlp="<?= $item['no_tlp'] ?>" data-almt="<?= $item['alamat'] ?>"><span class="bi bi-pencil fs-21"></span></button>
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
		var kd = $('#kd_sup').val();
		var nm = $('#nm_sup').val();
		var cp = $('#cp_sup').val();
		var tlp = $('#tlp_sup').val();
		var almt = $('#almt_sup').val();

		$.ajax({
			url: './functions/master_supplier.php?aksi=simpan',
			type: 'POST',
			data: {
				kd: kd,
				nm: nm,
				cp: cp,
				tlp: tlp,
				almt: almt
			},
			success: function(){
				$('#addModal').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Data supplier berhasil ditambahkan !'
				});

				window.location.reload();
			}
		})
	})

	$(document).on('click', '#editBtn', function(){
		var id = $(this).data('id');
		var nm = $(this).data('nm');
		var kd = $(this).data('kd');
		var tlp = $(this).data('tlp');
		var almt = $(this).data('almt');
		var cp = $(this).data('cp');

		$('#edit_id').val(id);
		$('#edit_kd_sup').val(kd);
		$('#edit_nm_sup').val(nm);
		$('#edit_cp_sup').val(cp);
		$('#edit_tlp_sup').val(tlp);
		$('#edit_almt_sup').val(almt);

		$('#editModal').modal('show');
	});

	$(document).on('click', '#saveEdit', function(){
		var id = $('#edit_id').val();
		var kd= $('#edit_kd_sup').val();
		var nm= $('#edit_nm_sup').val();
		var cp = $('#edit_cp_sup').val();
		var tlp= $('#edit_tlp_sup').val();
		var almt = $('#edit_almt_sup').val();

		$.ajax({
			url: './functions/master_supplier.php?aksi=edit',
			type: 'POST',
			data: {
				id: id,
				kd: kd,
				nm: nm,
				cp: cp,
				tlp: tlp,
				almt: almt
			},
			success: function(){
				$('#editModal').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Data supplier berhasil diupdate !'
				});

				window.location.reload();
			}
		})
	});

	$(document).on('click', '#delete', function(){
		var id = $(this).data('id');
		Swal.fire({
			icon: 'question',
			title: 'Hapus supplier ini ? ',
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url: `./functions/master_supplier.php?aksi=hapus&id=${id}`,
					type: 'GET',
					success: function(){
						Swal.fire({
							icon: 'success',
							title: 'Data supplier berhasil dihapus !'
						});

						window.location.reload();
					}
				})
			}
		});
	});
});
</script>