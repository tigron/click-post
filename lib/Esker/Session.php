<?php
/**
 * Session for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */
namespace Esker;

class Session {

	/**
	 * Soapclient
	 *
	 * @var Client_Soap $client
	 */
	private $client;

	/**
	 * Session id
	 *
	 * @var string $session_id
	 * @access public
	 */
	public $session_id;

	/**
	 * Bindings
	 *
	 * @access public
	 * @var array $bindings
	 */
	public $bindings;

	/**
	 * Session
	 *
	 * @access private
	 * @var Session $session
	 */
	private static $session;

	/**
	 * Constructor
	 *
	 * @access public
	 */
	private function __construct() {
		$this->client = new Client_Soap('SessionService2.wsdl');
	}

	/**
	 * Login
	 *
	 * @access public
	 * @param string $username
	 * @param string $password
	 */
	public function login($username, $password) {
		$this->bindings = $this->get_bindings($username);
		$this->client->set_location($this->bindings->sessionServiceLocation);
		$param = [
			'userName' => $username,
			'password' => $password
		];
		try {
			$response = $this->client->Login($param);
		} catch (\SoapFault $e) {
			throw new \Exception('Cannot login: ' . $e->getMessage());
		}
		return $response;
	}

	/**
	 * Logout
	 *
	 * @access public
	 */
	public function logout() {
		if (!isset($this->session_id)) {
			throw new \Exception('cannot logout, not logged in');
		}
		$this->client->set_session($this);
		$this->client->Logout([]);
	}

	/**
	 * Get session information
	 *
	 * @access public
	 * @return object $information
	 */
	public function get_session_information() {
		if (!isset($this->session_id)) {
			throw new \Exception('cannot logout, not logged in');
		}
		$this->client->set_session($this);
		return $this->client->GetSessionInformation([]);
	}

	/**
	 * get_bindings
	 *
	 * @access private
	 * @param string $username
	 */
	private function get_bindings($username) {
		$param = [ 'reserved' => $username ];
		try {
			$result = $this->client->GetBindings($param);
		} catch (\SoapFault $e) {
			throw new \Exception('Cannot get bindings: ' . $e->getMessage());
		}
		return $result;
	}

	/**
	 * Get
	 *
	 * @access public
	 * @param string $username
	 * @param string $password
	 * @return Session $session
	 */
	public static function get($username, $password) {
		$session = new self();
		$response = $session->login($username, $password);
		$session->session_id = $response->sessionID;
		return $session;
	}
}
