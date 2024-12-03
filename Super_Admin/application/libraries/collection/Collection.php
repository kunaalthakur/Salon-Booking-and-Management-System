<?php
/**
 * Collection class.
 *
 * Replacement for the standard Array class
 *
 * PHP version 5.5
 *
 * @category Traits
 *
 * @author   Eustáquio Rangel <taq@bluefish.com.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @link     http://github.com/taq/phpr
 */

namespace PHPR;

include_once __DIR__.'/ArrayAccessInterface.php';
include_once __DIR__.'/Enumerable.php';

/**
 * Collection class.
 *
 * PHP version 5.5
 *
 * @category Tests
 *
 * @author   Eustáquio Rangel <taq@bluefish.com.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL
 *
 * @link     http://github.com/taq/phpr
 */
class Collection implements \ArrayAccess
{
    use Enumerable, ArrayAccessInterface;
    private $_array = null;

    /**
     * Constructor.
     *
     * @param mixed $array internal array
     */
    public function __construct($array)
    {
        $this->_array = $array;
    }

    /**
     * Return the array value.
     *
     * @return mixed array
     */
    public function values()
    {
        return $this->_array;
    }

    /**
     * Get count for collection.
     *
     * @return int
     */
    public function count()
    {
        return count($this->_array);
    }
}
