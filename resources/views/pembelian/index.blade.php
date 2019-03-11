@extends('layouts.app')

@section('title')
    Daftar pembelian
@endsection

@section('breadcrumb')
    @parent
    <li>pembelian</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Transaksi Baru</a>
                @if(!empty(session('idpembelian')))
                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info"><i class="fa fa-plus-circle"> Transaksi Aktif</i></a>
                @endif
            </div>
            <div class="box-body">

                <table class="table table-striped table-pembelian">
                    <thead>
                        <tr>
                            <th width="30">NO</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('pembelian.detail')
@include('pembelian.supplier')
@endsection

@section('script')
<script type="text/javascript">
    var table, save_method, table1;
    $(function(){
        //menampilkan data dengan plugin datatables
        table = $('.table-pembelian').DataTable({
            "processing" : true,
            "ajax" : {
                "url" : "{{ route('pembelian.data') }}",
                "type" : "GET"
            }
        });

        table1 = $('.table-detail').DataTable({
        	"dom" : 'Brt',
        	"bSort" : false,
        	"processing" : true
        });

        $('.table-supplier').DataTable();
    });

    function addForm(){
        $('#modal-supplier').modal('show');
    }

    function showDetail(id){
    	$('#modal-detail').modal('show');

    	table1.ajax.url("pembelian/"+id+"/lihat");
    	table1.ajax.reload();
    }

    function deleteData(id){
        if(confirm("Apakah yakin Data Akan Di hapus?")){
            $.ajax({
                url : "pembelian/"+id,
                type : "POST",
                data : {
                    '_method' : 'DELETE',
                    '_token' : $('meta[name=csrf-token]').attr('content')
                },
                success : function(result){
                    table.ajax.reload();
                },
                error : function(){
                    alert("tidak dapat menghapus data");
                }
            });
        }
    }
</script>

@endsection