@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_pendaftaran_id {
			width: 15%;
		}

		.c_n_pemohon {
			width: 20%;
			text-align: center;
		}

		.c_n_perizinan {
			width: 15%;
			text-align: center;
		}

		.c_status {
			width: 10%;
			text-align: center;
		}

		.c_a_pemohon {
			width: 22%;
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}

		.c_verifikasi {
			width: 5%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pelayanan / Pendaftaran / Permohonan Daftar Ulang Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananPendaftaranPermohonanDaftarUlangIzinCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_pelayanan()">
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="open_modal('modal_pilih', '')" class="row-item ya" style="width='30px'">Tambah Daftar Ulang Izin</button>
			</div>
		</div>
	</form>
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="a_pemohon">Alamat Pemohon</option>
					<option value="status">Status</option>
				</select>
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Kata Kunci" ng-model="search[opsi_cari]">
			</div>
		</div>
	</form>
@stop

@section('table_nav')
	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_pendaftaran_id" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_n_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_n_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_a_pemohon" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat</th>
			<th class="c_status" ng-click="predicate='status'; reverse=!reverse">Status</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="ppdui in pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ ppdui.pendaftaran_id }}</td>
			<td class="c_n_perizinan">@{{ ppdui.n_perizinan }}</td>
			<td class="c_n_pemohon">@{{ ppdui.n_pemohon }}</td>
			<td class="c_a_pemohon">@{{ ppdui.a_pemohon }}</td>
			<td class="c_status">
				<p ng-if="ppdui.c_paralel == 1">
					Satu Izin
				</p>
				<p ng-if="ppdui.c_paralel == 0">
					Izin Paralel
				</p>
			</td>
			<td class="c_aksi">
				<span class="button-group group-3">
					<a href ng-click="open_modal('modal_edit', ppdui.id)" class="edit">Edit</a>
					<a href ng-click="open_modal('modal_selesai', ppdui.id)" class="print">Selesai</a>
					<a href ng-click="open_modal('modal_hapus', ppdui.id)" class="delete">Delete</a>
				</span>
				
			</td>	
		</tr>

		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_modal_edit', ['modal_name' => 'modal_edit'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_modal_daftar', ['modal_name' => 'modal_pilih'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_modal_tambah', ['modal_name' => 'modal_daftar'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_modal_selesai', ['modal_name' => 'modal_selesai'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_modal_hapus', ['modal_name' => 'modal_hapus'])
@stop