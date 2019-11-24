<?php

namespace App\Traits;

trait UploadFile
{
	protected function upload($dados, $namefile, $folder)
	{
		if ($dados->hasFile('image') && $dados->file('image')->isValid()) {

			$extension = $dados->file('image')->extension();
  			
  			$namefile = $namefile . '.' . $extension;

			$upload = $dados->file('image')->storeAs($folder, $namefile);

			if(!$upload){
                return  redirect()->
                back()->
                with('error', 'Falha ao fazer upload.')->
                withInput();
            }
		}

		return $namefile;
	}
}