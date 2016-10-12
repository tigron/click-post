<?php
/**
 * Submission object for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */
namespace Esker;


class Submission {

	/**
	 * Soapclient
	 *
	 * @var Client_Soap $client
	 */
	private $client;

	/**
	 * Constructor
	 *
	 * @access public
	 * @param Session $session
	 */
	public function __construct(Session $session) {
		$this->client = new Client\Soap('SubmissionService2.wsdl');
		$this->client->set_session($session);
		$this->client->set_location($session->bindings->submissionServiceLocation);
	}

	/**
	 * submit transport
	 *
	 * @access public
	 * @param Transport $transport
	 */
	public function submit_transport(Transport $transport) {
		$param = array('transport' => $transport);
		$result = $this->client->SubmitTransport($param);
		return $result;
	}

}
