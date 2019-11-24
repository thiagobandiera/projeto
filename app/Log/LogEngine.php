<?php

namespace App\Log;

use App\Models\LogAcesso;
use App\Models\LogRegistro;

use Illuminate\Support\Facades\Auth;

/**
 * Classe para criação de logs na base de dados
 * 
 * @author 
 */
class LogEngine
{
    protected $acesso;
    protected $registro;
    
    /**
     * Inicializa as referências necessárias ao Engine
     */
	public function __construct()
	{
        $this->acesso = new LogAcesso();
        $this->registro = new LogRegistro();
    }

    /**
     * Realiza um Log de Acesso do Sistema
     * 
     * @param Array $data
     * 
     * @author 
     */
    public function acesso( $data ){
        return $this->acesso->create( $data );
    }

    /**
     * Realiza um Log de Registro do Sistema
     * 
     * @param Array $data - dados do registro que será salvo
     * @param string $tipo - (create, update, delete)
     * @param string $chave - id do registro
     * @param string $tabela - tabela que foi feito o registro
     * @param Array $data_anterior - dados do registro antes de salvar para o tipo de update e delete
     * 
     * @author 
     */
    public function registro( $data, $tipo, $chave, $tabela, $data_anterior = null ){

        switch ($tipo) {
            case 'create':
                $log = [
                    'tabela'        => $tabela,
                    'operacao'      => $tipo,
                    'dado_anterior' => '',
                    'dado_posterior'=> collect($data)->toJson(),
                    'chave'         => $chave->id,
                    'usuario'       => Auth::user()->name,
                    'user_id'       => Auth::user()->id
                ];
                break;
            case 'update':
                $log = [
                    'tabela'        => $tabela,
                    'operacao'      => $tipo,
                    'dado_anterior' => $data_anterior->toJson(),
                    'dado_posterior'=> collect($data)->toJson(),
                    'chave'         => $chave->id,
                    'usuario'       => Auth::user()->name,
                    'user_id'       => Auth::user()->id
                ];
                break;
            case 'delete':
                $log = [
                    'tabela'        => $tabela,
                    'operacao'      => $tipo,
                    'dado_anterior' => '',
                    'dado_posterior'=> collect($data)->toJson(),
                    'chave'         => $chave->id,
                    'usuario'       => Auth::user()->name,
                    'user_id'       => Auth::user()->id
                ];
                break;
        }

        return $this->registro->create( $log );
    }

}