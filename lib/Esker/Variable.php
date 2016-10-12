<?php
/**
 * Transport object for the Esker service
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 */

namespace Esker;

class Variable {

	/**
	 * attribute
	 * The variable name
	 *
	 * @access public
	 * @var string $attribute
	 */
	public $attribute;

	/**
	 * type
	 * One of the following types: TYPE_STRING, TYPE_INTEGER, TYPE_DOUBLE, TYPE_DATETIME
	 *
	 * @access public
	 * @var string $type
	 */
	public $type;

	/**
	 * simpleValue
	 * variable value in a string format (even if type is not a string).
	 *
	 * @access public
	 * @var string $simpleValue
	 */
	public $simpleValue;

	/**
	 * nValues
	 * Specifies the number of values for this variable
	 *
	 * @access public
	 * @var int $nValues
	 */
	public $nValues = 0;

	/**
	 * multipleStringValues
	 *
	 * @access public
	 * @var array $values
	 */
	public $multipleStringValues;

	/**
	 * multipleLongValues
	 *
	 * @access public
	 * @var array $multipleLongValues
	 */
	public $multipleLongValues;

	/**
	 * multipleLongValues
	 *
	 * @access public
	 * @var array $multipleLongValues
	 */
	public $multipleDoubleValues;
}
