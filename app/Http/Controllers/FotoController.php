<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\Post;
use App\Foto;
use App\Http\Requests\CropPhotoRequest;


use Illuminate\Http\Request;

use Auth;
use Input;

class FotoController extends VivalaBaseController {

	/**
	 * construtor seguro.
	 */
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}

	public function postCropandsave($id, CropPhotoRequest $request) {

		$file = Input::file('image_file_upload');
	    if ($file && $file->isValid()) {

			$entidade = Auth::user()->entidadeAtiva;
			$destinationPath = public_path() . '/uploads/';
			$extension = Input::file('image_file_upload')->getClientOriginalExtension(); // Pega o formato da imagem

			$widthCrop = round($request->input('w'));
			$heightCrop = round($request->input('h'));
			$xSuperior = round($request->input('x'));
			$ySuperior = round($request->input('y'));

			$fileName = $this->formatFileNameWithUserAndTimestamps($file->getClientOriginalName()).'.'.$extension;
			$file = \Image::make( $file->getRealPath() )->crop($widthCrop, $heightCrop, $xSuperior, $ySuperior);
			$upload_success = $file->save($destinationPath.$fileName);
	        if ($upload_success) {

	        	$foto = new Foto(['path' => $fileName]);

	      		/* Settando tipo da foto atual para null, checando se existe antes */
	      		if ($entidade->avatar) {
		        	$currentAvatar = $entidade->avatar;
		        	$currentAvatar->tipo = null;
		        	$currentAvatar->save();
	      		}

	        	$foto = new Foto([
	        			'path' => $fileName,
	        			'tipo' => 'avatar' ]);

	        	$entidade->fotos()->save($foto);

	      		return $foto;
	        } else {
	        	return false;
	        }
	    }

	}


	/**
	 * Metodo para salvar uma foto
	 */
	public function postUploadphoto() {



		$file = Input::file('foto');

	    if ($file && $file->isValid()) {

			$destinationPath = public_path() . '/uploads/';
			$extension = $file->getClientOriginalExtension(); // Pega o formato da imagem
			$fileName = $this->formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
			$upload_success = $file->move($destinationPath,$fileName);

			// Testa se o arquivo foi uploaded
			if ($upload_success) {

				// Cria um objeto de foto
				$foto = new Foto(['path' => $fileName]);

				//Associa a foto ao Perfil
				// Auth::user()->perfil->fotos()->save($foto);

				// Associa a foto à entidade

				$entidade = Auth::user()->entidadeAtiva;
				if ($entidade) {
	        		$entidade->fotos()->save($foto);
	        	} else {
	        		$entidade->push();
	        	}


	      		return $foto;

	        } else {
	        	return false;
	        }
		}
	}


}
