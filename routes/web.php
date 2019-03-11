<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('kategori2', function() {
//     $kategori = App\Kategori::where('id_kategori', '=', 2)->first();
//     echo "<h3>produk untuk kategori ".$kategori->nama_kategori.":</h3>";	
//     foreach ($kategori->produk as $data) {
//         echo "<li>".$data->id_produk." - ".$data->nama_produk."</li>";
//     }
// });

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('kategori/delete', function(){
//     $kategori = App\Kategori::truncate();
// });
// Route::get('pembelian/delete', function(){
//     $pembelian = App\Pembelian::truncate();
// });
// Route::get('pembelian2/delete', function(){
//     $pembelian = App\PembelianDetail::truncate();
// });
Route::get('supplier/delete', function(){
    $supplier = App\Supplier::truncate();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('tanggal', function(){
	echo tanggal_indonesia(date('Y-m-d'));
});

Route::get('coab', function(){
	return view('home.coab');
});

// Route::get('uang', function(){
// 	echo "Rp.".format_uang(1230000);
// });

// Route::get('terbilang', function(){
// 	echo ucwords(terbilang(120343000, $style=3));
// });
Route::group(['middleware' => 'web'], function(){
	Route::get('user/profil', 'UserController@profil')->name('user.profil');
	Route::patch('user/{id}/change', 'UserController@changeProfil');

	Route::get('transaksi/baru', 'PenjualanDetailController@newSession' )->name('transaksi.new');
	Route::get('transaksi/{id}/data', 'PenjualanDetailController@listData')->name('transaksi.data');
	Route::get('transaksi/cetaknota', 'PenjualanDetailController@printNota')->name('transaksi.cetak');
	Route::get('transaksi/notapdf', 'PenjualanDetailController@notaPDF')->name('transaksi.pdf');
	Route::post('transaksi/simpan', 'PenjualanDetailController@saveData');
	Route::get('transaksi/loadform/{diskon}/{total}/{ditermia}', 'PenjualanDetailController@loadForm');
	Route::resource('transaksi', 'PenjualanDetailController');
});


Route::group(['middleware' => ['web', 'cekuser:1' ]], function(){
	Route::get('kategori/data', 'KategoriController@listData')->name('kategori.data');
	Route::resource('kategori', 'KategoriController');

	Route::get('produk/data', 'ProdukController@listData')->name('produk.data');
	Route::post('produk/hapus', 'ProdukController@deleteSelected');
	Route::post('produk/cetak', 'ProdukController@printBarcode');
	Route::resource('produk', 'ProdukController');

	Route::get('supplier/data', 'SupplierController@listData')->name('supplier.data');
	Route::resource('supplier', 'SupplierController');

	// Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'));
	Route::resource('posts','PostController');
	
	Route::get('member/data', 'MemberController@listData')->name('member.data');
	Route::post('member/cetak', 'MemberController@printCard');
	Route::resource('member', 'MemberController');

	Route::get('pengeluaran/data', 'PengeluaranController@listData')->name('pengeluaran.data');
	Route::resource('pengeluaran', 'PengeluaranController');

	Route::get('user/data', 'UserController@listData')->name('user.data');
	Route::resource('user', 'UserController');

	Route::get('pembelian/data', 'PembelianController@listData')->name('pembelian.data');
	Route::get('pembelian/{id}/tambah', 'PembelianController@create');
	Route::get('pembelian/{id}/lihat', 'PembelianController@show');
	Route::resource('pembelian', 'PembelianController');

	Route::get('pembelian_detail/{id}/data', 'Pembelian_detailController@listData')->name('pembelian_detail.data');
	Route::get('pembelian_detail/loadform/{diskon}/{total}', 'Pembelian_detailController@loadForm');
	Route::resource('pembelian_detail', 'Pembelian_detailController');

	Route::get('penjualan/data', 'PenjualanController@listData')->name('penjualan.data');
	Route::get('penjualan/{id}/lihat', 'PenjualanController@show');
	Route::resource('penjualan', 'PenjualanController');


	Route::get('laporan', 'LaporanController@index')->name('laporan.index');
	Route::post('laporan', 'LaporanController@refresh')->name('laporan.refresh');
	Route::get('laporan/data/{awal}/{akhir}', 'LaporanController@listData')->name('laporan.data');
	Route::get('laporan/pdf/{awal}/{akhir}', 'LaporanController@exportPDF');

	Route::resource('setting', 'SettingController');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

