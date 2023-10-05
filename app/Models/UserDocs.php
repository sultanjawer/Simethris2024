<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocs extends Model
{
	use HasFactory;

	public $table = 'user_docs';

	protected $fillable = [
		'npwp',
		'commitment_id',
		'no_ijin',

		//dokumen tanam
		'spvt', //surat pengajuan verifikasi tanam
		'sptjm', //surat pertanggungjawaban mutlak
		'rta', //form realisasi tanam
		'sphtanam', //
		'spdst', //surat pengantar dinas telah selesai tanam
		'logbooktanam',

		//hasil periksa dok tanam
		'spvtcheck', //surat pengajuan verifikasi tanam
		'sptjmcheck', //surat pertanggungjawaban mutlak
		'rtacheck', //form realisasi tanam
		'sphtanamcheck', //
		'spdstcheck', //surat pengantar dinas telah selesai tanam
		'logbooktanamchek',
		'tanamcheck_by',
		'tanamverif_at',

		//dokumen produksi
		'spvp', //surat pengajuan verifikasi produksi
		'rpo', //realisasi produksi
		'sphproduksi', //sph produksi
		'spdsp', //surat pengantar dinas telah selesai produksi
		'logbookproduksi',
		'formLa',

		//hasil periksa dokumen produksi
		'spvpcheck', //surat pengajuan verifikasi produksi
		'rpocheck', //realisasi produksi
		'sphproduksicheck', //sph produksi
		'spdspcheck', //surat pengantar dinas telah selesai produksi
		'logbookproduksicheck',
		'formLacheck',

		'prodcheck_by',
		'prodverif_at',

		//DOKUMEN PENGAJUAN SKL
		'spskl', //surat pengajuan penerbitan skl
		'spsklcheck',
		'spsklcheck_by',
		'spsklverif_at',
	];

	public function commitment()
	{
		return $this->belongsTo(Commitment::class, 'commitment_id');
	}
}
