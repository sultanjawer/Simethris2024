@extends('layouts.admin')
@section('content')
	@can('landing_access')
		@php($unreadmsg = \App\Models\QaTopic::unreadCount())
		@php($msgs = \App\Models\QaTopic::unreadMsg())

		@if (Auth::user()->roles[0]->title == 'Admin' || Auth::user()->roles[0]->title == 'Pejabat' || Auth::user()->roles[0]->title == 'Verifikator')
			{{-- tanam --}}
			@php($cntAjuVerifTanam = \App\Models\AjuVerifTanam::newPengajuanCount())
			@php($getAjuVerifTanam = \App\Models\AjuVerifTanam::getNewPengajuan())
			{{-- produksi --}}
			@php($cntAjuVerifProduksi = \App\Models\AjuVerifProduksi::newPengajuanCount())
			@php($getAjuVerifProduksi = \App\Models\AjuVerifProduksi::getNewPengajuan())
			{{-- skl --}}
			@php($cntAjuVerifSkl = \App\Models\AjuVerifSkl::newPengajuanCount())
			@php($getAjuVerifSkl = \App\Models\AjuVerifSkl::getNewPengajuan())

			{{-- rekomendasi --}}
			@php($cntRecomendations = \App\Models\Skl::newPengajuanCount())
			@php($getRecomendations = \App\Models\Skl::getNewPengajuan())

		@else
			@php($cntAjuVerifTanam = 0)
			@php($cntAjuVerifTanam = null)
			@php($cntAjuVerifProduksi = 0)
			@php($getAjuVerifProduksi = null)
			@php($cntAjuVerifSkl = 0)
			@php($getAjuVerifSkl = null)
			@php($cntRecomendations = 0)
			@php($getRecomendations = null)
		@endif


		<div class="row mb-5">
			<div class="col text-center">
				<h1 class="hidden-md-down">Selamat Datang di Simethris,</h1><br>
				<span class="display-4 fw-700 hidden-md-down">{{ Auth::user()->data_user->company_name ?? Auth::user()->name }}</span>
				<h2 class="display-4 hidden-sm-up">Hallo, <span class="fw-700">{{ Auth::user()->name }}</span></h2>
				<h4 class="hidden-md-down">
					<p class="text-muted">{!! $quote !!}</p>
				</h4>
			</div>
		</div>
		@if (Auth::user()->roles[0]->title == 'Pejabat')
			@if (!$profile || (!$profile->jabatan || !$profile->nip || !$profile->sign_img))
				<div class="row mb-5">
					<div class="col-md">
					<div class="alert alert-danger">
						<div class="d-flex flex-start w-100">
							<div class="mr-2 hidden-md-down">
								<span class="icon-stack icon-stack-lg">
									<i class="base base-7 icon-stack-3x opacity-100 color-error-500"></i>
									<i class="base base-7 icon-stack-2x opacity-100 color-error-300 fa-flip-vertical"></i>
									<i class="fas fa-exclamation icon-stack-1x opacity-100 color-white"></i>
								</span>
							</div>
							<div class="d-flex flex-fill">
								<div class="flex-fill">
									<span class="h5">Perhatian</span>
									<p>
										Anda belum melengkapi data Profile Pejabat. Silahkan lengkapi <a href="{{ route('admin.profile.pejabat') }}" class="fw-500 text-uppercase">di sini</a>.
									</p>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
			@endif
		@endif
		<!-- Page Content -->
		<div class="row">
			<div class="col-lg-6">
				{{-- <div id="panel-1" class="panel">
					<div class="panel-hdr">
						<h2>
							<i class="subheader-icon fal fa-rss mr-1 text-muted"></i>
							<span class="text-primary fw-700" style="text-transform: uppercase">BERITA</span>
						</h2>
						<div class="panel-toolbar">
							<a href="{{ route('admin.posts.index') }}" data-toggle="tooltip" title
								data-original-title="Lihat semua Feeds" class="btn btn-xs btn-primary waves-effect waves-themed"
								type="button" href="/">Lihat semua</a>
						</div>
					</div>
					<div class="panel-container show">
						<div class="panel-content p-0">
							<ul class="notification">
								@foreach ($posts as $post)
									<li>
										<a href="{{ route('admin.posts.show', $post['id']) }}"
											class="d-flex align-items-center">

											<span class="d-flex flex-column flex-1 ml-1">
												<span class="fw-700 fs-md text-primary" style="text-transform: uppercase">
													{{ $post['title'] }}
												</span>
												<span class="name fs-xs text-muted small mb-2">
													create by: {{ $post->user->name }} |
													@if ($post['created_at']->isToday())
														@if ($post['created_at']->diffInHours(date('Y-m-d H:i:s')) > 1)
															<span
																class="fs-nano text-muted mt-1">{{ $post['created_at']->diffInHours(date('Y-m-d H:i:s')) }}
																jam yang lalu</span>
														@else
															@if ($post['created_at']->diffInMinutes(date('Y-m-d H:i:s')) > 1)
																<span
																	class="fs-nano text-muted mt-1">{{ $post['created_at']->diffInMinutes(date('Y-m-d H:i:s')) }}
																	menit yang lalu</span>
															@else
																<span
																	class="fs-nano text-muted mt-1">{{ $post['created_at']->diffInSeconds(date('Y-m-d H:i:s')) }}
																	detik yang lalu</span>
															@endif
														@endif
													@else
														@if ($post['created_at']->isYesterday())
															<span class="fs-nano text-muted mt-1">Kemarin</span>
														@else
															<span
																class="fs-nano text-muted mt-1">{{ $post['created_at'] }}</span>
														@endif
													@endif
													| {{ ($post->category->name ?? '') }}
												</span>
												<span class="text-muted">{{ $post['exerpt'] }}</span>
											</span>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div> --}}
				<div id="panel-2" class="panel">
					<div class="panel-hdr">
						<h2>
							<i class="subheader-icon fal fa-envelope mr-1"></i><span class="color-warning-700 fw-700"
								style="text-transform:uppercase">Pesan baru</span>
						</h2>
						<div class="panel-toolbar">
							<a href="{{ route('admin.messenger.index') }}" data-toggle="tooltip" title
								data-original-title="Lihat semua pesan" class="btn btn-xs btn-warning waves-effect waves-themed"
								type="button" href="/">Lihat</a>
						</div>
					</div>
					<div class="panel-container show">
						<div class="panel-content p-0">
							<ul class="notification">
								@foreach ($msgs as $item)
									<li>
										<a href="{{ route('admin.messenger.showMessages', $item['id']) }}"
											class="d-flex align-items-center">
											<span class="mr-2">
												@php($user = \App\Models\User::getUserById($item['sender']))
												@if (!empty($user[0]->data_user->logo))
													<img src="{{ Storage::disk('public')->url($user[0]->data_user->logo) }}"
														class="profile-image rounded-circle" alt="">
												@else
													<img src="{{ asset('/img/favicon.png') }}"
														class="profile-image rounded-circle" alt="">
												@endif
											</span>
											<span class="d-flex flex-column flex-1 ml-1">
												<span class="name">{{ $user[0]->name }}<span
														class="badge badge-danger fw-n position-absolute pos-top pos-right mt-1">NEW</span></span>
												<span class="msg-a fs-sm">{{ $item['subject'] }}</span>
												<span class="msg-b fs-xs">{{ $item['content'] }}</span>
												@if ($item['create_at']->isToday())
													@if ($item['create_at']->diffInHours(date('Y-m-d H:i:s')) > 1)
														<span
															class="fs-nano text-muted mt-1">{{ $item['create_at']->diffInHours(date('Y-m-d H:i:s')) }}
															jam yang lalu</span>
													@else
														@if ($item['create_at']->diffInMinutes(date('Y-m-d H:i:s')) > 1)
															<span
																class="fs-nano text-muted mt-1">{{ $item['create_at']->diffInMinutes(date('Y-m-d H:i:s')) }}
																menit yang lalu</span>
														@else
															<span
																class="fs-nano text-muted mt-1">{{ $item['create_at']->diffInSeconds(date('Y-m-d H:i:s')) }}
																detik yang lalu</span>
														@endif
													@endif
												@else
													@if ($item['create_at']->isYesterday())
														<span class="fs-nano text-muted mt-1">Kemarin</span>
													@else
														<span class="fs-nano text-muted mt-1">{{ $item['create_at'] }}</span>
													@endif
												@endif
											</span>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				@if (Auth::user()->roles[0]->title == 'Admin' || Auth::user()->roles[0]->title == 'Verifikator')
					<div id="panel-2" class="panel">
						<div class="panel-hdr">
							<h2>
								<i class="subheader-icon fal fa-ballot-check mr-1"></i>
								<span class="text-info fw-700 text-uppercase">
									Pengajuan Verifikasi
								</span>
							</h2>
							<div class="panel-toolbar">
								@if ($cntAjuVerifTanam > 0 || $cntAjuVerifProduksi > 0 || $cntAjuVerifSkl > 0)
									<a href="javascript:void(0);" class="mr-1 btn btn-danger btn-xs waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Anda memiliki {{$cntAjuVerifTanam + $cntAjuVerifProduksi + $cntAjuVerifSkl}} Pengajuan Verifikasi">
										{{$cntAjuVerifTanam + $cntAjuVerifProduksi + $cntAjuVerifSkl}}
									</a>
								@else
								@endif
							</div>
						</div>
						<div class="panel-container collapse">
							<div class="panel-content p-0">
								<ul class="notification">
									@foreach ($getAjuVerifTanam as $item)
										<li>
											<a href="{{ route('verification.tanam.check', [$item->id]) }}"  class="d-flex align-items-center show-child-on-hover">
												<span class="mr-2">
													@if (!empty($item->data_user->logo))
														<img src="{{ Storage::disk('public')->url($item->data_user->logo) }}"
															class="profile-image rounded-circle" alt="">
													@else
														<img src="{{ asset('/img/avatars/farmer.png') }}"
															class="profile-image rounded-circle" alt="">
													@endif
												</span>
												<span class="d-flex flex-column flex-1">
													<span class="name">{{ $item->datauser->company_name }} <span
														class="badge badge-success fw-n position-absolute pos-top pos-right mt-1">NEW</span></span>
													<span class="msg-a fs-sm">
														<span class="badge badge-success">Verifikasi Tanam</span>
													</span>
													<span class="fs-nano text-muted mt-1">{{ $item->created_at->diffForHumans() }}</span>
												</span>
											</a>
										</li>
									@endforeach
									@foreach ($getAjuVerifProduksi as $item)
										<li>
											<a href="{{ route('verification.produksi.check', [$item->id]) }}"  class="d-flex align-items-center show-child-on-hover">
												<span class="mr-2">
													@if (!empty($item->data_user->logo))
														<img src="{{ Storage::disk('public')->url($item->data_user->logo) }}"
															class="profile-image rounded-circle" alt="">
													@else
														<img src="{{ asset('/img/avatars/farmer.png') }}"
															class="profile-image rounded-circle" alt="">
													@endif
												</span>
												<span class="d-flex flex-column flex-1">
													<span class="name">{{ $item->datauser->company_name }} <span
														class="badge badge-warning fw-n position-absolute pos-top pos-right mt-1">NEW</span></span>
													<span class="msg-a fs-sm ">
														<span class="badge badge-warning">Verifikasi Produksi</span>
													</span>
													<span class="fs-nano text-muted mt-1">{{ $item->created_at->diffForHumans() }}</span>
												</span>
											</a>
										</li>
									@endforeach
									@foreach ($getAjuVerifSkl as $item)
										<li>
											<a href="{{ route('verification.skl.check', [$item->id]) }}"  class="d-flex align-items-center show-child-on-hover">
												<span class="mr-2">
													@if (!empty($item->data_user->logo))
														<img src="{{ Storage::disk('public')->url($item->data_user->logo) }}"
															class="profile-image rounded-circle" alt="">
													@else
														<img src="{{ asset('/img/avatars/farmer.png') }}"
															class="profile-image rounded-circle" alt="">
													@endif
												</span>
												<span class="d-flex flex-column flex-1">
													<span class="name">{{ $item->datauser->company_name }} <span
														class="badge badge-danger fw-n position-absolute pos-top pos-right mt-1">NEW</span></span>
													<span class="msg-a fs-sm">
														<span class="badge badge-danger">Penerbitan SKL</span>
													</span>
													<span class="fs-nano text-muted mt-1">{{ $item->created_at->diffForHumans() }}</span>
												</span>
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif
				@if (Auth::user()->roles[0]->title == 'Pejabat')
					<div id="panel-3" class="panel">
						<div class="panel-hdr">
							<h2>
								<i class="subheader-icon fal fa-file-certificate mr-1"></i>
								<span class="text-primary fw-700 text-uppercase">
									Rekomendasi Penerbitan SKL
								</span>
							</h2>
							<div class="panel-toolbar">
								@if ($cntRecomendations > 0)
									<a href="javascript:void(0);" class="mr-1 btn btn-danger btn-xs waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Terdapat {{$cntRecomendations}} Rekomendasi Penerbitan yang perlu Anda tindaklanjuti.">
										{{$cntRecomendations}}
									</a>
								@else
								@endif
							</div>
						</div>
						<div class="panel-container collapse">
							<div class="panel-content p-0">
								<ul class="notification">
									@foreach ($getRecomendations as $item)
										<li>
											<a href="{{ route('verification.skl.recomendation.show', [$item->id]) }}"  class="d-flex align-items-center show-child-on-hover">
												<span class="mr-2">
													@if (!empty($item->data_user->logo))
														<img src="{{ Storage::disk('public')->url($item->data_user->logo) }}"
															class="profile-image rounded-circle" alt="">
													@else
														<img src="{{ asset('/img/avatars/farmer.png') }}"
															class="profile-image rounded-circle" alt="">
													@endif
												</span>
												<span class="d-flex flex-column flex-1">
													<span class="name">{{ $item->datauser->company_name }} <span
														class="badge badge-success fw-n position-absolute pos-top pos-right mt-1">NEW</span></span>
													<span class="msg-a fs-sm">
														<span class="badge badge-success">Direkomendasikan</span>
													</span>
													<span class="fs-nano text-muted mt-1">{{ $item->created_at->diffForHumans() }}</span>
												</span>
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div id="panel-4" class="panel">
						<div class="panel-hdr">
							<h2>
								<i class="subheader-icon fal fa-ballot-check mr-1"></i>
								<span class="text-info fw-700 text-uppercase">
									Pengajuan Verifikasi
								</span>
							</h2>
							<div class="panel-toolbar">
								@if ($cntAjuVerifTanam > 0 || $cntAjuVerifProduksi > 0 || $cntAjuVerifSkl > 0)
									<a href="javascript:void(0);" class="mr-1 btn btn-danger btn-xs waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Terdapat {{$cntAjuVerifTanam + $cntAjuVerifProduksi + $cntAjuVerifSkl}} Pengajuan Verifikasi yang perlu ditindaklanjut oleh para Verifikator.">
										{{$cntAjuVerifTanam + $cntAjuVerifProduksi + $cntAjuVerifSkl}}
									</a>
								@else
								@endif
							</div>
						</div>
						<div class="panel-container collapse">
							<div class="panel-content p-0">
								<ul class="notification">
									<li>
										<span class="d-flex align-items-center justify-content-between show-child-on-hover">
											<span>Tanam</span>
											<span>{{$cntAjuVerifTanam}} ajuan</span>
										</span>
									</li>
									<li>
										<span class="d-flex align-items-center justify-content-between show-child-on-hover">
											<span>Produksi</span>
											<span>{{$cntAjuVerifProduksi}} ajuan</span>
										</span>
									</li>
									<li>
										<span class="d-flex align-items-center justify-content-between show-child-on-hover">
											<span>Penerbitan SKL</span>
											<span>{{$cntAjuVerifSkl}} ajuan</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
		<!-- Page Content -->
	@endcan
@endsection
@section('scripts')
	@parent

	<script>
		$(document).ready(function() {
			// initialize datatable
			// $('#dt_feeds').dataTable({
			// 	// pagingType: 'full_numbers',
			// 	responsive: true,
			// 	lengthChange: false,
			// 	pageLength: 10,
			// 	order: [
			// 		[0, 'desc']
			// 	],
			// 	dom:

			// 		"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'>>" +
			// 		"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'>>" +
			// 		"<'row'<'col-sm-12't>>" +
			// 		"<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7'>>",
			// 	buttons: [

			// 	]
			// });

		});
	</script>
@endsection
