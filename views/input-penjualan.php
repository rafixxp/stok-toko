<style>
	.fs-21{
		font-size: 12px;
	}
	.fs-22{
		font-size: 15px;
	}
	.fs-30{
		font-size: 25px;
	}
	.scroll{
		position: relative;
		overflow-y: scroll;
		height: 200px;
	}
</style>

<div class="container px-3 py-4">
	<h5>Barang Keluar</h5>
	<span class="fs-21"><span class="bi bi-house"></span> > Transaksi > Barang Keluar</span>
	<br>

	<div class="mt-4">
		<div class="row">
			<div class="col-3">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h6 class="card-title mt-2"><span class="bi bi-paperclip"></span> Header Transaksi</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="fs-21 fw-bold">Tanggal Input</label>
							<input type="date" id="tgl" class="form-control fs-22">
						</div>
						<div class="form-group mt-2">
							<label class="fs-21 fw-bold">Karyawan</label>
							<select id="karyawan" class="form-select">
								<option value="">Pilih Karyawan</option>
							</select>
						</div>
						<div class="form-group mt-2">
							<label class="fs-21 fw-bold">Nama Konsumen</label>
							<input type="text" id="konsumen" class="form-control fs-22">
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card border-1">
					<div class="card-header bg-primary">
						<h6 class="mt-2 text-white"><span class="bi bi-cart"></span> Detail Transaksi</h6>
					</div>
					<div class="card-body bg-white">
						<div class="row">
							<div class="col">
								<div class="form-group mb-3">
									<label class="fs-21 fw-bold">Cari Barang</label>
									<input type="text" id="find" class="form-control fs-22">
								</div>
								<div id="dropdown" class="dropdown-menu p-1 mt-0">
									<?php
										$id = $_SESSION['user']['company_id'];
										$search = $con->query("SELECT * FROM master_barang WHERE company_id = '$id'");
										foreach($search as $item):
									?>
									<div class="dropdown-item search-item px-4 py-2" data-kd="<?= $item['kd_brg'] ?>" data-nm="<?= $item['nm_brg'] ?>" data-sat="<?= $item['satuan'] ?>" data-beli="<?= $item['harga_beli'] ?>" data-jual="<?= $item['harga_jual'] ?>"><?= $item['nm_brg'] ?></div>
									<?php endforeach; ?>
							    </div>
							</div>
							<div class="col-2">
								<div class="form-group mb-3">
									<label class="fs-21 fw-bold">Kuantitas</label>
									<input type="number" id="qty" class="form-control fs-22" value="0">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group mb-3">
									<label class="fs-21 fw-bold">Harga</label>
									<input type="text" id="harga" class="form-control fs-22" value="Rp.0">
								</div>
							</div>
							<div class="col-12">
								<button class="btn btn-sm btn-primary w-100"><span class="bi bi-plus"></span> Tambahkan</button>
							</div>
						</div>
						<div class="scroll mt-3">
							<table class="table table-sm table-bordered fs-22">
								<thead>
									<th class="text-center">#</th>
									<th>Nama Barang</th>
									<th>Kuantitas</th>
									<th>Total</th>
									<th class="text-center">Aksi</th>
								</thead>
								<tbody>
									<tr>
										
									</tr>
								</tbody>
							</table>
						</div>
						<div class="bg-primary px-3 py-3 mt-3 text-white rounded">
							<span class="fs-30">Total: Rp.0</span>
						</div>
						<div class="form-group mt-2">
							<label class="fs-21 fw-bold mb-2">Total Pembayaran</label>
							<input type="number" id="payment" class="form-control fs-22 right-0">
						</div>
						<button class="btn btn-sm btn-primary w-100 mt-3"><span class="bi bi-floppy"></span> Simpan Transaksi</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#addBtn').on('click', function(){
		$('#addModal').modal('show');
	});

	$('#find').focus(function() {
        $('#dropdown').show();
    });

    $(document).on('click', '.search-item', function(){
    	var kd = $(this).data('kd');
    	var nm = $(this).data('nm');
    	var sat = $(this).data('sat');
    	var beli = $(this).data('beli');
    	var jual = $(this).data('jual');

    	$('#find').val(nm);
    	$('#harga').val(jual);
    	$('#qty').val(1);

    	$('#dropdown').hide();
    })

    $(document).click(function(event) {
        if (!$(event.target).closest('#find').length && !$(event.target).closest('#dropdown').length) {
            $('#dropdown').hide();
        }
    });

});
</script>