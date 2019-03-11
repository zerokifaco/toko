<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			
			<form class="form-horizontal" data-toggle="validator" method="post" id="token">
				{{ csrf_field() }} {{ method_field('POST') }}

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true"> &times; </span>
					</button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body">
					
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="kode" class="col-md-3 control-label">Kode</label>
						<div class="col-md-6">
							<input type="number" id="kode" name="kode" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="nama" class="col-md-3 control-label">nama</label>
						<div class="col-md-6">
							<input type="text" id="nama" name="nama" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="alamat" class="col-md-3 control-label">alamat</label>
						<div class="col-md-6">
							<input type="text" id="alamat" name="alamat" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="telpon" class="col-md-3 control-label">Telpon</label>
						<div class="col-md-6">
							<input type="number" id="telpon" name="telpon" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save modal-button">
						<i class="fa fa-floppy-o"></i> Simpan
					</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-arrow-circle-left"></i> Batal
					</button>
				</div>
			</form>
		</div>
	</div>
</div>