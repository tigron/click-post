<?php
/**
 * SOAP client for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */
namespace Esker;

class Client_SOAP {

	/**
	 * @var SoapClient $soapclient
	 * @access private
	 */
	private $soapclient = null;

	/**
	 * Constructor
	 *
	 * @param string $soap_service
	 * @access protected
	 */
	public function __construct($wsdl) {
		$classmap = [
			'TransportVars' => '\Esker\Transport_Variables',
			'Transport' => '\Esker\Transport',
			'Var' => '\Esker\Variable',
			'WSFile' => '\Esker\File',
			'Attachment' => '\Esker\Attachment',
			'TransportAttachments' => '\Esker\Transport_Attachments',
		];

		$options = [
			'trace' => true,
			'exeptions' => true,
			'encoding' => 'utf-8',
			'classmap' => $classmap,
		];

		$this->soapclient = new \SoapClient(dirname(__FILE__) . '/../wsdl/' . $wsdl, $options);
	}

	/**
	 * Call a Soap method
	 *
	 * @param string $name
	 * @param array $arguments
	 * @return mixed $soap_answer
	 * @access public
	 */
	public function __call($name, $arguments) {
		try {
			$response = $this->soapclient->__soapCall($name, [ 'parameters' => $arguments[0]]);
		} catch (\SoapFault $e) {
//			print_R($e);
//			print_r($this->soapclient->__getLastRequest());
		}
		if (!isset($response->return)) {
			return;
		}
		return $response->return;
	}

	/**
	 * Set location
	 *
	 * @access public
	 * @param string $uri
	 */
	public function set_location($uri) {
		$this->soapclient->__setLocation($uri);
	}

	/**
	 * Set Session
	 *
	 * @access public
	 * @param Session $session
	 */
	public function set_session(Session $session) {
		$values = ['sessionID' => $session->session_id];
		$headers = [];
		$headers[] = new \SoapHeader("urn:SubmissionService2", 'SessionHeaderValue', new \SoapVar($values, SOAP_ENC_OBJECT));
        $this->soapclient->__setSoapHeaders($headers);
	}

	/**
	 * Get the functions for this Soap_Client
	 *
	 * @access public
	 * @return string
	 */
	public function get_functions() {
		if ($this->soapclient == null) {
			throw new Controller_Exception('Unknown Soap_Client');
		}

		return $this->soapclient->__getfunctions();
	}
}
