<?php
/**
 * Attachment object for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */

namespace Esker;

class Attachment {

	/**
	 * inputFormat
	 *
	 * @access public
	 * @var string $inputFormat
	 */
	public $inputFormat;

	/**
	 * outputFormat
	 *
	 * @access public
	 * @var string $outputFormat
	 */
	public $outputFormat;

	/**
	 * stylesheet
	 *
	 * @access public
	 * @var string $stylesheet
	 */
	public $stylesheet;

	/**
	 * outputName
	 *
	 * @access public
	 * @var int $outputName
	 */
	public $outputName;

	/**
	 * sourceAttachment
	 *
	 * @access public
	 * @var File $file
	 */
	public $file;

	/**
	 * nConvertedAttachments
	 *
	 * @access public
	 * @var string $nConvertedAttachments
	 */
	public $nConvertedAttachments;

	/**
	 * convertedAttachments
	 *
	 * @access public
	 * @var array $convertedAttachments
	 */
	public $convertedAttachments;

	/**
	 * nVars
	 *
	 * @access public
	 * @var int $nVars
	 */
	public $nVars = 0;
}
