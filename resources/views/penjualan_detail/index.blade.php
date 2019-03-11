@extends('layouts.app') 
@section('title') Daftar Member
@endsection
 
@section('breadcrumb') @parent
<li>Member</li>
@endsection
 
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">

			<div class="box-body">

				<form class="form form-horizontal form-produk" method="post">
					{{ csrf_field() }}
					<input type="text" name="idpenjualan" value="{{ $idpenjualan }}">

					<div class="form-group">
						<label for="kode" class="col-md-2 control-label">Kode Produk</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="number" name="kode" id="kode" class="form-control" autofocus="required">
								<span class="input-group-btn">
								<button onclick="showProduct()" type="button" class="btn btn-info">...</button>
							</span>
							</div>
						</div>
					</div>
				</form>

				<form class="form-keranjang">
					{{ csrf_field() }} {{ method_field('PATCH') }}
					<table class="table table-striped table-penjualan">
						<thead>
							<tr>
								<th width="30">No</th>
								<th>Kode Produk</th>
								<th>Nama Produk</th>
								<th align="right">Harga</th>
								<th>Jumlah</th>
								<th>Diskon</th>
								<th align="right">Sub Total</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</form>

				<div class="col-md-8">
					<div id="tampil-bayar" style="background: #dd4b39; color: #fff; font-size: 80px; text-align: center; height: 120px;">

					</div>
					<div id="tampil-terbilang" style="background: #338dbc; color: #fff; font-size: 25px; padding: 10px">

					</div>
				</div>

				<div class="col-md-4">
					<form class="form form-horizontal form-penjualan" method="post" action="transaksi/simpan">
						{{ csrf_field() }}
						<input type="hidden" name="idpenjualan" value="{{ $idpenjualan }}">
						<input type="hidden" name="total" id="total">
						<input type="hidden" name="totalitem" id="totalitem">
						<input type="hidden" name="bayar" id="bayar">

						<div class="form-group">
							<label for="totalrp" class="col-md-4 control-label">Total</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="totalrp" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="member" class="col-md-4 control-label">Kode Member</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" id="member" class="form-control" name="member" value="0">
									<span class="input-group-btn">
										<button onclick="showMember()" type="button" class="btn btn-info">...</button>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="diskon" class="col-md-4 control-label">Diskon</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="diskon" name="diskon" value="0" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="bayarrp" class="col-md-4 control-label">Bayar</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="bayarrp" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="diterima" class="col-md-4 control-label">Diterima</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="diterima" name="diterima" value="0">
							</div>
						</div>

						<div class="form-group">
							<label for="kembali" class="col-md-4 control-label">Kembali</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="kembali" value="0" readonly>
							</div>
						</div>

					</form>
				</div>

			</div>

			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right simpan"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
			</div>

		</div>
	</div>
</div>
	@include('penjualan_detail.produk')
	@include('penjualan_detail.member')
@endsection
 
@section('script')
<script type="text/javascript">
    var table;
    $(function(){
        $('.table-produk').DataTable();

        table = $('.table-penjualan').DataTable({
			"dom" : 'Brt',
			"bSort" : false,
            "processing" : true,
            "ajax" : {
                "url" : "{{ route('transaksi.data', $idpenjualan) }}",
                "type" : "GET"
            }
        });
	});

	function addItem(){
		$.ajax({
			url : "{{ route('transaksi.store') }}",
			type : "POST",
			data : $('.form-produk').serialize(),
			success : function(data){
				if(data.msg == "error"){
                    alert("kode kategori sudah digunakan");
                }else{
                    $('#kode').val('').focus();
					table.ajax.reload(function(){
						loadForm($('#diskon').val());
					});
                }
			},
			error : function(){
				alert("tidak dapat menyimpan data terplih");
			}
		});
	}

	function showProduct(){
		$('#modal-produk').modal('show');
	}

	function showMember(){
		$('#modal-member').modal('show');
	}
	function selectItem(kode){
		$('#kode').val(kode);
		$('#modal-produk').modal('hide');
		addItem();
	}

	function changeCount(id){
		$.ajax({
			url : "transaksi/"+id,
			type : "POST",
			data : $('.form-keranjang').serialize(),
			success : function(data){
				$('#kode').val('').focus();
				table.ajax.reload(function(){
					loadForm($('#diskon').val());
				});
			},
			error : function(){
				alert("tidak dapat menyimpan data change");
			}
		});
	}

	function selectMember(kode){
		$('#modal-member').modal('hide');
		$('#diskon').val('{{ $setting->diskon_member }}');
		$('#member').val(kode);
		loadForm($('#diskon').val());
		$('#diterima').val(0).focus().select();
	}

	function deleteItem(id){
		if (confirm("Apakah yakin akan menghapus Item")) {
			$.ajax({
				url : "transaksi/"+id,
				type : "POST",
				data : {
					'_method' : "DELETE",
					'_token' : $('meta[name=csrf-token]').attr('content')
				},
				success : function(data){
					table.ajax.reload(function(){
						loadForm($('#diskon').val());
					});
				},
				error : function(){
					alert("tidak bisa menghapus data");
				}
			});
		}
	}

	function loadForm(diskon=0, diterima=0){
		$('#total').val($('.total').text());
		$('#totalitem').val($('.totalitem').text());

		$.ajax({
			//transaksi/loadform/0/158000/200000
			url : "transaksi/loadform/"+diskon+"/"+$('.total').text()+"/"+diterima,
			type : "GET",
			dataType : 'JSON',
			success : function(data){
				$('#totalrp').val("Rp. "+data.totalrp);
				$('#bayarrp').val("Rp. "+data.bayarrp);
				$('#bayar').val(data.bayar);
				$('#tampil-bayar').html("<small>Bayar</small> Rp"+data.bayarrp);
				$('#tampil-terbilang').text(data.terbilang);

				$('#kembali').val("Rp. "+data.kembalirp);
				if ($('#diterima').val() != 0) {
					$('#tampil-bayar').html("<small>Kembali</small> Rp"+data.kembalirp);
					$('#tampil-terbilang').text(data.kembaliterbilang);
				}
			},
			error : function(){
				alert("tidak dapat menampilkan data loadForm");
			}
		});
	}

</script>
@endsection