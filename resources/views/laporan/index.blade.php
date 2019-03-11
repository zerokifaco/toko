@extends('layouts.app')

@section('title')
	Laporan Pendapatan {{ tanggal_indonesia($awal, false) }} s/d {{ tanggal_indonesia($akhir, false) }}
@endsection

@section('breadcrumb')
	@parent
	<li>laporan</li>
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<a onclick="periodeForm()" class="btn btn-success"><i class="fa fa-plus-circle"> Ubah Periode</i></a>
				<a href="laporan/pdf/{{$awal }}/{{ $akhir }}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"> Export PDF</i></a>
			</div>
			<div class="box-body">
				<table class="table table-striped table-laporan">
					<thead>
						<tr>
							<th width="30">No</th>
							<th>Tanggal</th>
							<th>Penjualan</th>
							<th>Pembelian</th>
							<th>Pengeluaran</th>
							<th>Pendapatan</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
	
			</div>
		</div>
	</div>
</div>
@include('laporan.form')
@endsection

@section('script')
<script type="text/javascript">
	var table, awal, akhir;
	$(function(){
		

		table = $('.table-laporan').DataTable({
			"dom" : 'Brt',
			"bSort" : false,
			"bPaginate" : false,
			"processing" : true,
			"serverside" : true,
			"ajax" : {
				"url" : "laporan/data/{{ $awal }}/{{ $akhir }}",
				"type" : "GET"
			}
		});
	});

	function periodeForm(){
		$('#modal-form').modal('show');
	}
</script>
@endsection