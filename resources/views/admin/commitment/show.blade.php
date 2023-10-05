@extends('layouts.admin')
@section('content')
{{-- @include('partials.breadcrumb') --}}
@include('partials.subheader')
@can('commitment_edit')
@include('partials.sysalert')
	{{-- {{ dd($data_poktan) }} --}}
	<div class="row">
		<div class="col-lg-12">
			<div class="panel" id="panel-1">
				<div class="panel-hdr">
					<h2>
						Data <span class="fw-300"><i>Basic</i></span>
					</h2>
					<div class="panel-toolbar">
						@include('partials.globaltoolbar')
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="no_ijin">Nomor RIPH</label>
								<input type="text" name="no_ijin" id="no_ijin" readonly
									class="form-control form-control-sm" placeholder="Nomor RIPH"
									aria-describedby="helpId" value="{{ old('no_ijin', $commitment->no_ijin) }}">
								<small id="helpId" class="text-muted">Nomor Penerbitan RIPH</small>
							</div>
							<div class="form-group col-md-2">
								<label for="periodetahun">Periode Tahun</label>
								<input type="number" name="periodetahun" id="periodetahun"
									class="form-control form-control-sm" readonly
									placeholder="Tahun Penerbitan" aria-describedby="helpId"
									value="{{ old('periodetahun', $commitment->periodetahun) }}">
								<small id="helpId" class="text-muted">Tahun Penerbitan RIPH</small>
							</div>
							<div class="form-group col-md-3">
								<label for="tgl_ijin">Tanggal terbit</label>
								<input type="date" name="tgl_ijin" id="tgl_ijin" readonly
								class="form-control form-control-sm" placeholder="Tanggal ijin diterbitkan"
								aria-describedby="helpId" value="{{ old('no_ijin', $commitment->tgl_ijin) }}">
								<small id="helpId" class="text-muted">Tanggal ijin RIPH diterbitkan</small>
							</div>
							<div class="form-group col-md-3">
								<label for="tgl_akhir">Tanggal Akhir</label>
								<input type="date" name="tgl_akhir" id="tgl_akhir" readonly
								class="form-control form-control-sm" placeholder="Tanggal akhir berlakunya RIPH"
								aria-describedby="helpId" value="{{ old('tgl_akhir', $commitment->tgl_akhir) }}">
								<small id="helpId" class="text-muted">Tanggal akhir berlaku ijin RIPH</small>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-5">
								<label for="no_hs">Produk</label>
								<input type="text" name="hs_code" id="hs_code"
									class="form-control form-control-sm" readonly
									placeholder="HS Code dan Produk" aria-describedby="helpId"
									value="{{ old('no_hs', $commitment->no_hs)}}">
								<small id="helpId" class="text-muted">
									HS Code beserta Nama Produk.
								</small>
							</div>
							<div class="form-group col-md-3">
								<label for="volume_riph">Volume RIPH (ton)</label>
								<input type="number" name="volume_riph" id="volume_riph" readonly
									class="form-control form-control-sm" placeholder="Volume import yang
									tercantum pada dokumen RIPH" aria-describedby="helpId"
									value="{{ old('volume_riph', $commitment->volume_riph)}}">
								<small id="helpId" class="text-muted">
									Volume import pada dokumen RIPH
								</small>
							</div>
							<div class="form-group col-md-2">
								<label for="wajib_tanam">Wajib Tanam (ha)</label>
								<input type="number" id="wajib_tanam" class="form-control"
								placeholder="autocalculate" readonly>
								<small id="helpId" class="text-muted">Luas tanam yang wajib direalisasikan</small>
							</div>
							<div class="form-group col-md-2">
								<label for="wajib_produksi">Wajib Produksi (ton)</label>
								<input type="numeric" name="wajib_produksi" id="wajib_produksi"
								class="form-control form-control-sm" placeholder="Volume wajib produksi"
								aria-describedby="helpId" readonly>
								<small id="helpId" class="text-muted">Volume wajib produksi yang wajib direalisasikan</small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-deck mb-4">
				<div class="card" id="panel-2">
					<div class="panel-hdr">
						<h2>
							Data <span class="fw-300"><i>Perbenihan</i></span>
						</h2>
						<div class="panel-toolbar">
							{{-- @include('partials.globaltoolbar') --}}
						</div>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<div class="col mt-3 mb-5">
								<div class="form-group">
									<label for="kebutuhan_benih">Kebutuhan Benih (kg)</label>
									<input readonly type="number" name="kebutuhan_benih" id="kebutuhan_benih"
										class="form-control form-control-sm"
										placeholder="Kebutuhan Benih" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Jumlah benih dibutuhkan untuk seluruah lokasi lahan.
									</small>
								</div>
								<div class="form-group">
									<label for="kebutuhan_benih">Stok Mandiri (kg)</label>
									<input type="number" name="stok_mandiri" id="stok_mandiri"
										value="{{ old('stok_mandiri', $commitment->stok_mandiri) }}"
										class="form-control form-control-sm" readonly
										placeholder="Stok Mandiri" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Jumlah benih yang sudah dimiliki.
									</small>
								</div>
								<div class="form-group">
									<label for="off_stock">Penangkar (kg)</label>
									<input readonly type="number" name="off_stock" id="off_stock"
										class="form-control form-control-sm"
										placeholder="Beli dari penangkar" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Pembelian benih dari penangkar.
									</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card" id="panel-3">
					<div class="panel-hdr">
						<h2>
							Data <span class="fw-300"><i>Pengendalian</i></span>
						</h2>
						<div class="panel-toolbar">
							{{-- @include('partials.globaltoolbar') --}}
						</div>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<div class="col mt-3 mb-5">
								<div class="form-group">
									<label for="organik">Pupuk Organik (kg)</label>
									<input type="number" name="pupuk_organik" id="pupuk_organik"
										class="form-control form-control-sm" readonly
										value="{{ old('pupuk_organik', $commitment->pupuk_organik) }}"
										placeholder="Jumlah Pupuk Organik" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Jumlah Pupuk Organik
									</small>
								</div>
								<div class="form-group">
									<label for="npk">NPK (kg)</label>
									<input type="number" name="npk" id="npk"
										class="form-control form-control-sm"
										value="{{ old('npk', $commitment->npk) }}" readonly
										placeholder="Jumlah NPK" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Nitrogen Phosfor Kalium
									</small>
								</div>
								<div class="form-group">
									<label for="dolomit">Dolomit (kg)</label>
									<input type="number" name="dolomit" id="dolomit"
										class="form-control form-control-sm" readonly
										value="{{ old('dolomit', $commitment->dolomit) }}"
										placeholder="Jumlah Dolomit" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Jumlah Kapur Dolomit
									</small>
								</div>
								<div class="form-group">
									<label for="za">ZA (kg)</label>
									<input type="number" name="za" id="za"
										class="form-control form-control-sm"
										value="{{ old('za', $commitment->za) }}" readonly
										placeholder="Jumlah ZA" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Zwavelzure Amonium
									</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card" id="panel-4">
					<div class="panel-hdr">
						<h2>
							Data <span class="fw-300"><i>Lainnya</i></span>
						</h2>
						<div class="panel-toolbar">
							{{-- @include('partials.globaltoolbar') --}}
						</div>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<div class="col mt-3 mb-5">
								<div class="form-group">
									<label for="mulsa">Mulsa (kg)</label>
									<input type="number" name="mulsa" id="mulsa"
										class="form-control form-control-sm" readonly
										value="{{ old('mulsa', $commitment->mulsa) }}"
										placeholder="Jumlah Mulsa" aria-describedby="helpId">
									<small id="helpId" class="text-muted">
										Jumlah Mulsa
									</small>
								</div>
								{{-- <div class="form-group">
									<label class="form-label" for="poktan_share">Bagi Hasil (%)<span class="text-danger">*</span></label>
									<div class="input-group">
										<input type="number" name="poktan_share" id="poktan_share"
											class="form-control form-control-sm" required
											value="{{ old('poktan_share', $commitment->poktan_share) }}"
											placeholder="Bagi hasil (Poktan)" aria-describedby="helpId"
											title="Bagi hasil untuk Kelompoktani">
										<input type="number" name="importir_share" id="importir_share"
											class="form-control form-control-sm"
											placeholder="Bagi hasil (Importir)" aria-describedby="helpId"
											title="Bagi hasil untuk Importir" readonly>
									</div>
									<small id="helpId" class="text-muted">
										Bagi hasil untuk Poktan dan Pelaku Usaha.
									</small>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="panel" id="panel-5">
				<div class="panel-hdr">
					<h2>
						Berkas <span class="fw-300"><i>lampiran</i></span>
					</h2>
					<div class="panel-toolbar">
						<span class="help-block"><i class="fas fa-exclamation-circle text-danger mr-1"></i>Berkas-berkas ini diperlukan untuk verifikasi dan Penerbitan SKL.</span>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<div class="row">
							@php
								$npwp = str_replace(['.', '-'], '', $npwp_company);
							@endphp
							<div class="form-group col-md-6">
								<label class="form-label h6">RIPH</label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formRiph" value="{{ old('formRiph', $commitment->formRiph) }}">
									<label class="custom-file-label {{ $commitment->formRiph ? 'text-primary fw-400' : 'text-muted' }}" for="formRiph">
										{{ $commitment->formRiph ? $commitment->formRiph : 'Pilih file...' }}
										</label>
								</div>
								<span class="help-block">
									@if($commitment->formRiph)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formRiph) }}" target="_blank">
											Lihat Berkas RIPH
										</a>
									@else
										Surat Persetujuan RIPH (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-md-6">
								<label class="form-label h6">Form SPTJM<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formSptjm" value="{{ old('formSptjm', $commitment->formSptjm) }}">
									<label class="custom-file-label" for="formSptjm">{{ $commitment->formSptjm ? $commitment->formSptjm : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->formSptjm)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formSptjm) }}" target="_blank">
											Lihat Berkas SPTJM
										</a>
									@else
									Form Pertanggungjawaban Mutlak. (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-md-6">
								<label class="form-label h6">Form Logbook<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="logbook" value="{{ old('logbook', $commitment->logbook) }}">
									<label class="custom-file-label" for="logbook">{{ $commitment->logbook ? $commitment->logbook : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->logbook)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->logbook) }}" target="_blank">
											Lihat Berkas Logbook
										</a>
									@else
									Logbook. (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-md-6">
								<label class="form-label h6">Form-RT<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formRt" value="{{ old('formRt', $commitment->formRt) }}">
									<label class="custom-file-label" for="formRt">{{ $commitment->formRt ? $commitment->formRt : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->formRt)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formRt) }}" target="_blank">
											Lihat Berkas Rencana tanam
										</a>
									@else
									Form Rencana Tanam. (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-lg-4">
								<label class="form-label h6">Form-RTA<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formRta" value="{{ old('formRta', $commitment->formRta) }}">
									<label class="custom-file-label" for="formRta">{{ $commitment->formRta ? $commitment->formRta : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->formRta)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formRta) }}" target="_blank">
											Lihat Berkas Relisasi tanam
										</a>
									@else
									Form Realisasi tanam. (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-lg-4">
								<label class="form-label h6">Form RPO<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formRpo" value="{{ old('formRpo', $commitment->formRpo) }}">
									<label class="custom-file-label" for="formRpo">{{ $commitment->formRpo ? $commitment->formRpo : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->formRpo)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formRpo) }}" target="_blank">
											Lihat Berkas Realisasi produksi
										</a>
									@else
									Form Realisasi Produksi. (.jpg / .pdf).
									@endif
								</span>
							</div>
							<div class="form-group col-lg-4">
								<label class="form-label h6">Form LA<span class="text-danger">*</span></label>
								<div class="custom-file input-group">
									<input type="file" class="custom-file-input" name="formLa" value="{{ old('formLa', $commitment->formLa) }}">
									<label class="custom-file-label" for="formLa">{{ $commitment->formLa ? $commitment->formLa : 'Pilih file...' }}</label>
								</div>
								<span class="help-block">
									@if($commitment->formLa)
										<a href="{{ asset('storage/uploads/'.$npwp.'/'.$commitment->periodetahun.'/'.$commitment->formLa) }}" target="_blank">
											Lihat Berkas Laporan Akhir
										</a>
									@else
									Form Laporan Akhir. (.jpg / .pdf).
									@endif
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="col-md-4 ml-auto text-right">
						<a href="{{route('admin.task.commitment')}}" class="btn btn-info btn-sm">
							<i class="fal fa-undo mr-1"></i>Kembali
						</a>
						<button class="btn btn-warning btn-sm" type="submit">
							<i class="fal fa-save mr-1"></i>Simpan Perubahan
						</button>
					</div>
				</div>
			</div> --}}
		</div>
	</div>

@endcan

@endsection

<!-- start script for this page -->
@section('scripts')
@parent
<script>
	$(document).ready(function() {
		var volume_riph = $('#volume_riph');
		var wajib_tanam = $('#wajib_tanam');
		var wajib_produksi = $('#wajib_produksi');
		var kebutuhan_benih = $('#kebutuhan_benih');
		var stok_mandiri = $('#stok_mandiri');
		var off_stock = $('#off_stock');
		var poktan_share = $('#poktan_share');
		var importir_share = $('#importir_share');

	  // Calculate and set the values of wajib_tanam, wajib_produksi, and kebutuhan_benih inputs
	  function calculate() {
		var volume_riph_val = parseFloat(volume_riph.val()) || 0;
		var wajib_tanam_val = volume_riph_val * 0.05 / 6;
		var wajib_produksi_val = volume_riph_val * 0.05;
		var wajib_kebutuhanbenih_val = wajib_tanam_val * 0.8;
		var off_stock_val = kebutuhan_benih.val() - stok_mandiri.val();
		var poktanshare_val = parseFloat(poktan_share.val()) || 0;
		var importirshare_val = 100 - poktanshare_val;

		off_stock.val(off_stock_val < 0 ? 0 : off_stock_val.toFixed(2));
		wajib_tanam.val(wajib_tanam_val.toFixed(2));
		wajib_produksi.val(wajib_produksi_val.toFixed(2));
		kebutuhan_benih.val(wajib_kebutuhanbenih_val.toFixed(2));
		poktan_share.val(poktanshare_val.toFixed(0));
		importir_share.val(importirshare_val.toFixed(0));
	  }

	  // Call the calculate function when vol_import or in_stock input field changes
	  volume_riph.on('input', function() {
		calculate();
	  });
	  stok_mandiri.on('input', function() {
		calculate();
	  });
	  poktan_share.on('input', function() {
		calculate();
	  });

	  // Trigger the input event on the vol_import and in_stock input fields to calculate the off_stock value on page load
	  volume_riph.trigger('input');
	  stok_mandiri.trigger('input');
	  poktan_share.trigger('input');
	});
</script>

@endsection
