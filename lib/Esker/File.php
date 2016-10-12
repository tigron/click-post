<?php
/**
 * File object for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */

namespace Esker;

class File {

	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name;

	/**
	 * Mode
	 *
	 * @access public
	 * @var string $mode
	 */
	public $mode;

	/**
	 * Content
	 *
	 * @access public
	 * @var string $content
	 */
	public $content;

	/**
	 * URL
	 *
	 * @access public
	 * @var string $url
	 */
	public $url;

	/**
	 * StorageID
	 *
	 * @access public
	 * @param string $storageID
	 */
	public $storageID;
}
