@extends('layouts.admin')
@section('styles')
<style>
	a {
		text-decoration: none !important;
	}
</style>
@endsection
@section('content')
{{-- @include('partials.breadcrumb') --}}
@include('partials.subheader')

@can('pengajuan_create')
<div class="row">
	<div class="col-12">
		<div class="text-center">
			<i class="fal fa-badge-check fa-3x subheader-icon"></i>
			<h2>Ringkasan Data</h2>
			<div class="row justify-content-center">
				<p class="lead">Berikut adalah data-data yang telah Anda laporkan dan lampirkan.</p>
			</div>
		</div>
		<div class="panel" id="panel-1">
			<div class="panel-container card-header show">
				<div class="row d-flex justify-content-between">
					<div class="form-group col-md-4">
						<label class="form-label" for="no_ijin">Nomor RIPH</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fal fa-file-invoice"></i>
								</span>
							</div>
							<input type="text" class="form-control form-control-sm bg-white" id="no_ijin" value="{{$commitment->no_ijin}}" disabled="">
						</div>
						<span class="help-block">Nomor Ijin RIPH.</span>
					</div>
					<div class="form-group col-md-4">
						<label class="form-label" for="no_hs">Komoditas</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fal fa-file-invoice"></i>
								</span>
							</div>
							<input type="text" class="form-control form-control-sm bg-white" id="no_ijin" value="{{$commitment->no_hs}}" disabled="">
						</div>
						<span class="help-block">Kode dan nama Komoditas Produk import.</span>
					</div>
					<div class="form-group col-md-2 col-sm-6">
						<label class="form-label" for="tgl_ijin">Tanggal Ijin</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fal fa-calendar-day"></i>
								</span>
							</div>
							<input type="text" class="form-control form-control-sm bg-white" id="tgl_ijin" value="{{ date('d-m-Y', strtotime($commitment->tgl_ijin)) }}" disabled="">
						</div>
						<span class="help-block">Tanggal mulai berlaku.</span>
					</div>
					<div class="form-group col-md-2 col-sm-6">
						<label class="form-label" for="tgl_akhir">Tanggal Berakhir</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fal fa-calendar-day"></i>
								</span>
							</div>
							<input type="text" class="form-control form-control-sm bg-white" id="tgl_akhir" value="{{ date('d-m-Y', strtotime($commitment->tgl_akhir)) }}" disabled="">
						</div>
						<span class="help-block">Tanggal berakhir RIPH.</span>
					</div>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<table class="table table-striped table-bordered w-100" id="mainCheck">
						<thead>
							<th class="text-muted text-uppercase">Data</th>
							<th class="text-muted text-uppercase">Kewajiban</th>
							<th class="text-muted text-uppercase">Realisasi</th>
							<th class="text-muted text-uppercase">Status</th>
						</thead>
						<tbody>
							<tr>
								<td class="text-muted">
									<span class="fw-700 h6">Wajib Tanam</span><br>
									<span class="help-block">Komitmen wajib tanam yang telah dipenuhi hingga saat ini</span>
								</td>
								<td class="text-right">
									{{ number_format($commitment->volume_riph * 5 / 100, 2) }} ha
								</td>
								<td class="text-right">
									{{ number_format($total_luastanam, 2) }} ha
								</td>
								<td>
									@if ($total_luastanam >= $commitment->volume_riph * 5 / 100)
										<i class="fas fa-check text-success"></i>
										<i>Terpenuhi</i>
									@else
										<i class="fas fa-times text-danger"></i>
										<i>Tidak Terpenuhi</i>
									@endif
								</td>
							</tr>
							<tr>
								<td class="text-muted">
									<span class="fw-700 h6">Wajib produksi</span><br>
									<span class="help-block">Komitmen wajib tanam yang telah dipenuhi hingga saat ini</span>
								</td>
								<td class="text-right">
									{{ number_format($commitment->volume_riph * 5 / 100*6, 2) }} ha
								</td>
								<td class="text-right">
									{{ number_format($total_volume, 2) }} ha
								</td>
								<td>
									@if ($total_volume >= $commitment->volume_riph * 5 / 100*6)
										<i class="fas fa-check text-success"></i>
										<i>Terpenuhi</i>
									@else
										<i class="fas fa-times text-danger"></i>
										<i>Tidak Terpenuhi</i>
									@endif
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="panel-2" class="panel">
			<div class="panel-hdr">
				<h2>Berkas-berkas lampiran</h2>
				<div class="panel-toolbar">
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<table class="table table-striped table-bordered w-100" id="attchCheck">
						<thead class="card-header">
							<tr>
								<th class="text-uppercase text-muted">Form</th>
								<th class="text-uppercase text-muted">Nama Berkas</th>
								<th class="text-uppercase text-muted">Status</th>
							</tr>
						</thead>
						<tbody>
							@php
								$npwp = str_replace(['.', '-'], '', $commitment->npwp);
							@endphp
							<tr>
								<td>Penerbitan RIPH</td>
								<td>
									<span class="text-primary">{{ $commitment->formRiph }}</span>
								</td>
								<td>
									@if($commitment->formRiph)
										<a href="#" data-toggle="modal" data-target="#viewDocs"
											data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->formRiph) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Form SPTJM</td>
								<td>
									<span class="text-primary">{{ $commitment->formSptjm }}</span>
								</td>
								<td>
									@if($commitment->formSptjm)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'.$commitment->formSptjm) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Logbook</td>
								<td>
									<span class="text-primary">{{ $commitment->logbook }}</span>
								</td>
								<td>
									@if($commitment->logbook)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->logbook) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Form RT</td>
								<td>
									<span class="text-primary">{{ $commitment->formRt }}</span>
								</td>
								<td>
									@if($commitment->formRt)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->formRt) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Form RTA</td>
								<td>
									<span class="text-primary">{{ $commitment->formRta }}</span>
								</td>
								<td>
									@if($commitment->formRta)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->formRta) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Form RPO</td>
								<td>
									<span class="text-primary">{{ $commitment->formRpo }}</span>
								</td>
								<td>
									@if($commitment->formRpo)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->formRpo) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>Form LA</td>
								<td>
									<span class="text-primary">{{ $commitment->formLa }}</span>
								</td>
								<td>
									@if($commitment->formLa)
										<a href="#" data-toggle="modal" data-target="#viewDocs" data-doc="{{ asset('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $commitment->formLa) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<div class="help-block">
					Keterangan<br>
					<span><i class="fas fa-check text-success mr-1"></i> Status berkas dilampirkan.</span><br>
					<span><i class="fas fa-times text-danger mr-1"></i> Status berkas tidak dilampirkan</span><br>
					<span>klik tanda <i class="fas fa-times text-danger mr-1"></i>untuk melengkapi berkas yang diperlukan.</span><br>
				</div>
			</div>
		</div>
		<div id="panel-3" class="panel">
			<div class="panel-hdr">
				<h2>Data Perjanjian Kerjasama</h2>
				<div class="panel-toolbar">
					<span class="help-block">Perjanjian Kerjasama Kemitraan antara Importir dengan Kelompoktani Mitra</span>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<table id="pksCheck" class="table table-bordered table-striped w-100">
						<thead class="card-header">
							<tr>
								<th class="text-uppercase text-muted">Perjanjian</th>
								<th class="text-uppercase text-muted">Kelompoktani</th>
								<th class="text-uppercase text-muted">Tanggal Mulai</th>
								<th class="text-uppercase text-muted">Tanggal Akhir</th>
								<th class="text-uppercase text-muted">Dokumen</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($commitment->pks as $pksmitra)
							<tr>
								<td>{{$pksmitra->no_perjanjian}}</td>
								<td>{{$pksmitra->masterpoktan->nama_kelompok}}</td>
								<td>{{$pksmitra->tgl_perjanjian_start}}</td>
								<td>{{$pksmitra->tgl_perjanjian_end}}</td>
								<td>
									@if($pksmitra->berkas_pks)
										<a href="#" data-toggle="modal" data-target="#viewDocs"
											data-doc="{{ url('storage/uploads/'. $npwp . '/' . $commitment->periodetahun .'/'. $pksmitra->berkas_pks) }}">
											<i class="fas fa-check text-success mr-1"></i>
											Lihat Dokumen
										</a>
									@else
										<span class="text-danger"><i class="fas fa-times-circle mr-1"></i>Tidak Ada</span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="panel-4" class="panel">
			<div class="panel-hdr">
				<h2>Data Lokasi Tanam</h2>
				<div class="panel-toolbar">
					<span class="help-block">Lokasi Tanam dan Volume Produksi.</span>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<table id="lokasi-table" class="table table-sm table-bordered table-striped w-100">
						<thead>
							<tr>
								<th>Kelompoktani</th>
								<th>ID</th>
								<th>Nama Lokasi</th>
								<th>Anggota Id</th>
								<th>Pengelola</th>
								<th class="text-center">Luas Tanam</th>
								<th class="text-center">Produksi</th>
								<th>Data Geolokasi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<div id="panel-5" class="panel">
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row d-flex align-items-center">
						<div class="col-md-6">
							<div class="alert alert-danger" role="alert">
							<p>Dengan ini menyatakan bahwa kami telah menyelesaikan komitmen wajib tanam-produksi dan siap untuk dilakukan verifikasi data dan lapangan.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label h6">Konfirmasi</label>
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" placeholder="ketik username Anda di sini" id="validasi" name="validasi">
									<div class="input-group-append">
										<a class="btn btn-sm btn-danger" href="" role="button"><i class="fal fa-times text-align-center mr-1"></i> Batalkan</a>
									</div>
									<form action="{{ route('admin.task.commitment.review.submit', $commitment->id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="input-group-append">
											<button class="btn btn-sm btn-primary" type="submit" onclick="return validateInput()">
												<i class="fas fa-upload text-align-center mr-1"></i> Ajukan
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- modal view doc --}}
<div class="modal fade" id="viewDocs" tabindex="-1" role="dialog" aria-labelledby="document" aria-hidden="true">
	<div class="modal-dialog modal-dialog-right" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Berkas <span class="fw-300"><i>lampiran </i></span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="" width="100%"  frameborder="0"></iframe>
			</div>
		</div>
	</div>
</div>

@endcan
@endsection

@section('scripts')
@parent
<script>
	$(document).ready(function() {
		$('#viewDocs').on('shown.bs.modal', function (e) {
			var docUrl = $(e.relatedTarget).data('doc');
			$('iframe').attr('src', docUrl);
		});
	});
</script>

<script>
	$(document).ready(function() {

		$('#mainCheck').dataTable(
			{
			responsive: true,
			lengthChange: false,
			order:[],
			dom:
				"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7'>>",

		});

		$('#attchCheck').dataTable(
			{
			responsive: true,
			lengthChange: false,
			order:[],
			dom:
				"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'>>",
			buttons: [
				/*{
					extend:    'colvis',
					text:      'Column Visibility',
					titleAttr: 'Col visibility',
					className: 'mr-sm-3'
				},*/
				{
					extend: 'pdfHtml5',
					text: '<i class="fa fa-file-pdf"></i>',
					titleAttr: 'Generate PDF',
					className: 'btn-outline-danger btn-sm btn-icon mr-1'
				},
				{
					extend: 'excelHtml5',
					text: '<i class="fa fa-file-excel"></i>',
					titleAttr: 'Generate Excel',
					className: 'btn-outline-success btn-sm btn-icon mr-1'
				},
				{
					extend: 'csvHtml5',
					text: '<i class="fal fa-file-csv"></i>',
					titleAttr: 'Generate CSV',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'copyHtml5',
					text: '<i class="fa fa-copy"></i>',
					titleAttr: 'Copy to clipboard',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'print',
					text: '<i class="fa fa-print"></i>',
					titleAttr: 'Print Table',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				}
			]
		});

		$('#pksCheck').dataTable(
			{
			responsive: true,
			lengthChange: false,
			order:[],
			dom:
				"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				/*{
					extend:    'colvis',
					text:      'Column Visibility',
					titleAttr: 'Col visibility',
					className: 'mr-sm-3'
				},*/
				{
					extend: 'pdfHtml5',
					text: '<i class="fa fa-file-pdf"></i>',
					titleAttr: 'Generate PDF',
					className: 'btn-outline-danger btn-sm btn-icon mr-1'
				},
				{
					extend: 'excelHtml5',
					text: '<i class="fa fa-file-excel"></i>',
					titleAttr: 'Generate Excel',
					className: 'btn-outline-success btn-sm btn-icon mr-1'
				},
				{
					extend: 'csvHtml5',
					text: '<i class="fal fa-file-csv"></i>',
					titleAttr: 'Generate CSV',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'copyHtml5',
					text: '<i class="fa fa-copy"></i>',
					titleAttr: 'Copy to clipboard',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'print',
					text: '<i class="fa fa-print"></i>',
					titleAttr: 'Print Table',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				}
			]
		});
		function handleInitComplete() {
			var dataTable = this.api();

			// Get the unique values of the "nama_kelompok" column
			var uniqueValues = dataTable.column(0, { search: 'applied' }).data().unique();

			// Create the select element and add the options
			var select = $('<select>')
				.addClass('custom-select custom-select-sm col-3 mr-2')
				.on('change', function () {
					var kelompok = $.fn.dataTable.util.escapeRegex($(this).val());
					dataTable.column(0).search(kelompok ? '^' + kelompok + '$' : '', true, false).draw();
				});

			// Add the default "Semua Kelompoktani" option
			$('<option>').val('').text('Semua Kelompoktani').appendTo(select);

			// Add options for each unique value
			uniqueValues.each(function (value) {
				$('<option>').val(value).text(value).appendTo(select);
			});

			// Find the target DataTable's container element
			var targetTableContainer = $('#lokasi-table_wrapper'); // Replace with the ID or class of the target DataTable's container

			// Remove any existing select element in the target table container
			targetTableContainer.find('.custom-select.select-filter').remove();

			// Add the select element before the first datatable button in the target table container
			targetTableContainer.find('.dt-buttons').before(select.addClass('select-filter'));
		}

		var lokasiTable = $('#lokasi-table').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			ajax: {
				url: "{{ route('admin.task.commitment.submit', $commitment->id) }}",
				type: "GET",
			},
			columns: [
				{ data: 'nama_kelompok', name: 'nama_kelompok' },
				{ data: 'id', name: 'id' },
				{ data: 'nama_lokasi', name: 'nama_lokasi' },
				{ data: 'anggota_id', name: 'anggota_id' },
				{ data: 'nama_petani', name: 'nama_petani' },
				{ data: 'luas_tanam', name: 'luas_tanam', class: 'text-right',
					render: function(data, type, row) {
						return data + ' ha';
					}
				},
				{ data: 'volume', name: 'volume', class: 'text-right',
					render: function(data, type, row) {
						return data + ' ton';
					}
				},
				{ data: 'data_geolokasi', name: 'data_geolokasi' }
			],
			rowGroup: {
				dataSrc: 'nama_kelompok'
			},
			dom:
			"<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'<'select'>>>" + // Move the select element to the left of the datatable buttons
				"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'fl><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				{
					extend: 'pdfHtml5',
					text: '<i class="fa fa-file-pdf"></i>',
					titleAttr: 'Generate PDF',
					className: 'btn-outline-danger btn-sm btn-icon mr-1'
				},
				{
					extend: 'excelHtml5',
					text: '<i class="fa fa-file-excel"></i>',
					titleAttr: 'Generate Excel',
					className: 'btn-outline-success btn-sm btn-icon mr-1'
				},
				{
					extend: 'csvHtml5',
					text: '<i class="fal fa-file-csv"></i>',
					titleAttr: 'Generate CSV',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'copyHtml5',
					text: '<i class="fa fa-copy"></i>',
					titleAttr: 'Copy to clipboard',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				},
				{
					extend: 'print',
					text: '<i class="fa fa-print"></i>',
					titleAttr: 'Print Table',
					className: 'btn-outline-primary btn-sm btn-icon mr-1'
				}
			],
			initComplete: handleInitComplete
		});
	});
</script>

<script>
	function validateInput() {
		// get the input value and the current username from the page
		var inputVal = document.getElementById('validasi').value;
		var currentUsername = '{{ Auth::user()->username }}';

		// check if the input is not empty and matches the current username
		if (inputVal !== '' && inputVal === currentUsername) {
			return true; // allow form submission
		} else {
			alert('Input validasi harus diisi dan bernilai sama dengan username Anda.');
			return false; // prevent form submission
		}
	}
</script>

@endsection
