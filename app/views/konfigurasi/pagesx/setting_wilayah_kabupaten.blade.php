@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}

		.c_nama_kabupaten {
			width: 35%;
		}

		.c_nama_propinsi {
			width: 25%;
		}

		.c_nama_ibu_kota {
			width: 25%;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Setting Wilayah / Kabupaten 
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingWilayahKabupaten"
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
			<th class="c_nama_kabupaten">Nama Kabupaten</th>
			<th class="c_nama_propinsi">Nama Propinsi</th>
			<th class="c_nama_ibu_kota">Nama Ibu Kota</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="swk in setting_wilayah_kabupaten">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama_kabupaten">@{{ swk.n_kabupaten }}</td>
			<td class="c_nama_propinsi">@{{ swk.n_propinsi }}</td>
			<td class="c_nama_ibu_kota">@{{ swk.ibukota }}</td>
			<td class="c_aksi">@{{ swk.id }}</td>
		</tr>
	</table>

@stop