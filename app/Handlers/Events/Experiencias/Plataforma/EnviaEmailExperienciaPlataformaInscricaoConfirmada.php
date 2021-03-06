<?php namespace App\Handlers\Events\Experiencias\Plataforma;

use App\Events\Experiencias\InscricaoExperienciaConfirmada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\InscricaoExperiencia;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaPlataformaInscricaoConfirmada
{
	// Cria instância de mailSenderRepository para ser usada aqui
	private $MailSenderRepository;

	/**
	* Create the event handler.
	*
	* @return void
	*/
	public function __construct(MailSenderRepository $repository)
	{
		// A instância criada aqui (this) recebe o repositório tipo MailSenderRepository
		$this->MailSenderRepository = $repository;
	}

	/**
	* Handle the event.
	*
	* @param  InscricaoExperienciaConfirmada  $event
	* @return void
	*/
	public function handle(InscricaoExperienciaConfirmada $event)
	{
		// Usa o método enviaEmailExperienciaPlataformaInscricaoConfirmada do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaPlataformaInscricaoConfirmada($event->Inscricao);
	}

}
