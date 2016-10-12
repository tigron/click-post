<?php
/**
 * Transport object for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */
namespace Esker;

class Transport {

	/**
	 * TransportName
	 *
	 * @var string $transportName
	 * @access public
	 */
	public $transportName;

	/**
	 * recipientType
	 *
	 * @var string $recipientType
	 * @access public
	 */
	public $recipientType;

	/**
	 * transportIndex
	 *
	 * @var string $transportIndex
	 * @access public
	 */
	public $transportIndex;

	/**
	 * nVars
	 *
	 * @var int $nVars
	 * @access public
	 */
	public $nVars = 0;

	/**
	 * vars
	 *
	 * @var array $vars
	 * @access private
	 */
	public $vars;

	/**
	 * nSubnodes
	 *
	 * @var int $nSubnodes
	 * @access public
	 */
	public $nSubnodes = 0;

	/**
	 * subnodes
	 *
	 * @var array $subnodes
	 * @access public
	 */
	public $subnodes;

	/**
	 * nAttachments
	 *
	 * @var int $nAttachments
	 * @access public
	 */
	public $nAttachments = 0;

	/**
	 * attachments
	 *
	 * @var array $attachments
	 * @access public
	 */
	public $attachments;

	/**
	 * Add variable
	 *
	 * @access public
	 * @param string $name
	 * @param string $value
	 */
	public function add_variable($name, $value) {
		if (!isset($this->vars)) {
			$this->vars = new Transport_Variables();
		}

		$var = new Variable();
		$var->type = 'TYPE_STRING';
		$var->attribute = $name;
		$var->simpleValue = utf8_encode($value);

		$this->vars->Var[] = $var;
	}

	/**
	 * Add Attachment
	 *
	 * @access public
	 * @param \Skeleton\File $file
	 */
	public function add_attachment(\Skeleton\File\File $attach_file) {
		if (!isset($this->attachments)) {
			$this->attachments = new Transport_Attachments();
		}

		$file = new File();
		$file->mode = 'MODE_INLINED';
		$file->name = $attach_file->name;
		$file->content = $attach_file->get_contents();

		$attachment = new Attachment();
		$attachment->sourceAttachment = $file;

		$this->attachments->Attachment[] = $attachment;
	}
}
