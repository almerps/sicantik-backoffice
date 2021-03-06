@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
		}
		.c_kelurahan{
			width: 15%;
			text-align: center;
		}
		.c_kecamatan {
			width: 15%;
			text-align: center;
		}
		.c_kabupaten {
			width: 15%;
			text-align: center;
		}
		.c_propinsi {
			width: 15%;
			text-align: center;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Setting Wilayah / Kelurahan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingWilayahKelurahanCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item">
				&nbsp
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Search Key">
			</div>
			<div class="form-item">
				<input type="submit" value="Search">
			</div>
		</div>
	</form>
@stop

@section('table_nav')	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_kelurahan">Nama Kelurahan</th>
			<th class="c_kecamatan">Nama Kecamatan</th>
			<th class="c_kabupaten">Nama Kabupaten</th>
			<th class="c_propinsi">Nama Provinsi</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="swkl in setting_wilayah_kelurahan">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_kelurahan">@{{ swkl.n_kelurahan }}</td>
			<td class="c_kecamatan">@{{ swkl.n_kecamatan }}</td>
			<td class="c_kabupaten">@{{ swkl.n_kabupaten}}</td>
			<td class="c_propinsi">@{{ swkl.n_propinsi }}</td>
			<td class="c_aksi">@{{ swkl.id }}</td>
		</tr>
	</table>

@stop