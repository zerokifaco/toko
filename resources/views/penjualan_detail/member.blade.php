<div class="modal" id="modal-member" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" area-label="Close"><span aria-hidden="true"> &times; </span></button>
				<h3 class="modal-title">Cari member</h3>
			</div>

			<div class="modal-body">
				<table class="table table-striped table-member">
					<thead>
						<tr>
							<th>Kode member</th>
							<th>Nama member</th>
							<th>Alamat</th>
							<th>Telpon</th>
							<th>Aktion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($member as $data)
						<tr>
							<th>{{ $data->kode_member }}</th>
							<th>{{ $data->nama }}</th>
							<th>{{ $data->alamat }}</th>
							<th>{{ $data->telpon }}</th>
							<th><a onclick="selectMember({{ $data->kode_member }})" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>

		</div>
	</div>	
</div>