<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Vaga extends Model {

	//mass assigned fields
	protected $fillable = [
		'habilidades',
		'sobre_trabalho',
                'horario_funcionamento',
		'responsavel_id',
                'logradouro',
                'cep', 	
		'bairro',
		'complemento',
                'cidade_id',
                'quantidade_vagas',
                'email_contato',
                'telefone_contato',
                'numero_beneficiados',
                'categoria_vaga_id' 
		];	

	/**
	 * Estabelece a relaçao entre a entidade Vaga e a entidade Perfil,
	 * uma Vaga sempre tem um responsavel Perfil.
	 */
	public function responsavel() {
		return $this->belongsTo('App\Perfil');
	}

	/**
	 * Estabelece a relaçao entre a entidade Vaga e a entidade Perfil,
	 * uma Vaga tem muitos voluntarios do tipo Perfil, que podem
         * se voluntariar em varias Vagas
         */
	public function voluntarios() {
		return $this->belongsToMany('App\Perfil');
	}

	/**
	 * Relacao polimorfica de owner,
	 * @todo Por enquanto só Ong implementa essa relaçao.      
	 */
	public function owner() {
		return $this->morphTo();
	}

	/**
         * Acessor para o atributo numeroVoluntarios de Vaga
         * @return Integer    numero de voluntarios dessa Vaga */
	public function getNumeroVoluntariosAttribute() 
	{
	    return count($this->voluntarios);
	}


        //Se o user_id associado ao owner (ong / perfil / empresa) dessa
        //Vaga for igual ao id do usuario atualmente logado.
	public function getPodeEditarAttribute() 
	{
		$user = Auth::user();
		return $user->id == $this->owner->user->id;
        }


        
    /**
     * Estabelece a relaçao entre a entidade Vaga e a entidade Cidade,
     * uma Vaga pertence a uma Cidade
     */
    public function cidade() 
    {
        return $this->belongsTo('App\Cidade');        
    }


    /**
     * Acessor para o atributo Estado de Vaga
     * @return Estado   
     */
    public function getEstadoAttribute()
    {
        return ($this->cidade ? $this->cidade->estado : null);
    }


    /**
     * Uma vaga pertence a uma CategoriaVaga (é o jeito)
     * @return [type] [description]
     */
    public function categoria() 
    {
        return $this->belongsto('App\CategoriaVaga', 'categoria_vaga_id');
    }

    /**
     * Definindo um Mutator para o campo numero_beneficiados,
     * assim mesmo quando essa entidade for criada com Model::create([])
     * a propriedade 'numero_beneficiados' vai passar por esse metodo antes da 
     * insercao
     */
    public function setNumeroBeneficiadosAttribute($value)
    {
        $this->attributes['numero_beneficiados'] = intval($value);
    }


    /**
     * Uma Vaga tem apenas uma foto de avatar;
     */
    public function fotoCapa()
    {
        return $this->fotos()->where('tipo', 'capa')->get()->last();
    }

    /**
     * Metodo para recuperar a url da foto de capa da Vaga 
     * @return String 
     */
    public function getCapaUrl() 
    {
        if ($this->fotoCapa()) {
            return $this->fotoCapa()->path;
        }

        return '/img/querocuidar.png';
    }

    /**
     * Uma Vaga tem varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
    }


}
