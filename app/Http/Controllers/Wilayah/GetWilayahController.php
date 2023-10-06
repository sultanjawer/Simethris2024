<?php

namespace App\Http\Controllers\Wilayah;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SimeviTrait;
use Illuminate\Http\Request;
use App\Models\MasterProvinsi;
use App\Models\MasterKabupaten;
use App\Models\MasterKecamatan;
use App\Models\MasterDesa;

class GetWilayahController extends Controller
{
	use SimeviTrait;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getAllProvinsi()
	{
		$provinsis = MasterProvinsi::orderBy('provinsi_id', 'asc')->get();

		$result = collect($provinsis)->map(function ($provinsi) {
			return [
				'provinsi_id' => $provinsi['provinsi_id'],
				'nama' => $provinsi['nama'],
			];
		});

		return response()->json($result);
	}

	public function getKabupatenByProvinsi($provinsiId)
	{
		$kabupatens = MasterKabupaten::orderBy('kabupaten_id', 'asc')->get();
		$result = [];

		foreach ($kabupatens as $kabupaten) {
			if ($kabupaten['provinsi_id'] == $provinsiId) {
				$result[] = [
					'provinsi_id' => $kabupaten['provinsi_id'] ?? null,
					'kabupaten_id' => $kabupaten['kabupaten_id'] ?? null,
					'nama_kab' => $kabupaten['nama_kab'] ?? null,
				];
			}
		}

		return response()->json($result);
	}


	public function getKecamatanByKabupaten($kabupatenId)
	{
		$kecamatans = MasterKecamatan::orderBy('kecamatan_id', 'asc')->get();
		$result = [];

		foreach ($kecamatans as $kecamatan) {
			if ($kecamatan['kabupaten_id'] == $kabupatenId) {
				$result[] = [
					'kabupaten_id' => $kecamatan['kabupaten_id'],
					'kecamatan_id' => $kecamatan['kecamatan_id'],
					'nama_kecamatan' => $kecamatan['nama_kecamatan'],
				];
			}
		}
		return response()->json($result);
	}

	public function getDesaBykecamatan($kecamatanId)
	{
		$desas = MasterDesa::orderBy('kelurahan_id', 'asc')
			->where('kecamatan_id', $kecamatanId)
			->get();
		$result = [];

		foreach ($desas as $desa) {
			if ($desa['kecamatan_id'] == $kecamatanId) {
				$result[] = [
					'kecamatan_id' => $desa['kecamatan_id'],
					'kelurahan_id' => $desa['kelurahan_id'],
					'nama_desa' => $desa['nama_desa'],
				];
			}
		}

		return response()->json($result);
	}
}
