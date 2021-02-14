<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $user = [
		'rt' => 'required|numeric',
		'nama_warga' => 'required',
		'nik' => 'required|is_unique[warga.nik]',
		'no_kk' => 'required',
		'email' => 'required|valid_email',
		'password' => 'required|min_length[6]',
		're-password' => 'required|matches[password]',
		'fotoKTP' => 'uploaded[fotoKTP]|ext_in[fotoKTP,png,jpg,jpeg,bmp,pdf]|max_size[fotoKTP,2048]',
		'fotoKK' => 'uploaded[fotoKK]|ext_in[fotoKK,png,jpg,jpeg,bmp,pdf]|max_size[fotoKK,2048]'
	];

	public $userMusiman;

	public $extMusiman = [
		'skMusiman' => 'uploaded[skMusiman]|ext_in[skMusiman,png,jpg,jpeg,bmp,pdf]|max_size[skMusiman,2048]',
	];
	

	public $user_errors = [
		'rt' => [
			'required' => 'RT harus diisi',
			'numeric' => 'RT harus diisi'
		],
		'nama_warga' => [
			'required' => 'Nama harus diisi'
		],
		'nik' => [
			'required' => 'NIK harus diisi',
			'is_unique' => 'NIK sudah terdaftar.'
		],
		'no_kk' => [
			'required' => 'Nomor KK harus diisi',
			'numeric' => 'Hanya diperbolehkan angka'
		],
		'fotoKTP' => [
			'uploaded' => 'Foto KTP harus diupload',
			'ext_in' => 'Hanya diperbolehkan format png/jpg/jpeg/bmp/pdf.',
			'max_size' => 'Maksimum file 2MB.'
		],
		'fotoKK' => [
			'uploaded' => 'Foto KK harus diupload',
			'ext_in' => 'Hanya diperbolehkan format png/jpg/jpeg/bmp/pdf.',
			'max_size' => 'Maksimum file 2MB.'
		],
		'email' => [
			'required' => 'Email harus diisi',
			'valid_email' => 'Format Email harus Valid'
		],
		'password' => [
			'required' => 'Password harus diisi',
			'min_length' => 'Password minimal berisi 6 karakter'
		],
		're-password' => [
			'required' => 'Tulis Ulang Password harus diisi',
			'matches' => 'Password Tidak Sama',
		]
	];

	public $userMusiman_errors;

	public $extMusiman_errors = [
		'skMusiman' => [
			'uploaded' => 'SK Pindah harus diupload',
			'ext_in' => 'Hanya diperbolehkan format png/jpg/jpeg/bmp/pdf.',
			'max_size' => 'Maksimum file 2MB.'
		]
	];

	public function __construct()
	{
		$this->userMusiman = array_merge($this->user, $this->extMusiman);
		$this->userMusiman_errors = array_merge($this->user_errors, $this->extMusiman_errors);
	}
}
