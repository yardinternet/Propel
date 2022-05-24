<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

/**
 * Class for iterating over a statement and returning one Propel object at a time
 *
 * @author     Francois Zaninotto
 * @package    propel.runtime.collection
 */
class PropelOnDemandCollection extends PropelCollection
{
    /**
     * @var       PropelOnDemandIterator
     */
    protected $iterator;

    /**
     * @param PropelFormatter $formatter
     * @param PDOStatement    $stmt
     */
    public function initIterator(PropelFormatter $formatter, PDOStatement $stmt)
    {
        $this->iterator = new PropelOnDemandIterator($formatter, $stmt);
    }

    /**
     * Populates the collection from an array
     * Each object is populated from an array and the result is stored
     * Does not empty the collection before adding the data from the array
     *
     * @param array $arr
     *
     * @throws PropelException
     */
    public function fromArray($arr)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    // IteratorAggregate Interface

    /**
     * @return PropelOnDemandIterator
     */
    public function getIterator(): \Iterator
    {
        return $this->iterator;
    }

    // ArrayAccess Interface

    /**
     * @throws PropelException
     */
    public function offsetExists(mixed $key): bool
    {
        throw new PropelException('The On Demand Collection does not allow access by offset');
    }

    /**
     * @throws PropelException
    */
    public function offsetGet(mixed $key): mixed
    {
        throw new PropelException('The On Demand Collection does not allow access by offset');
    }

    /**
     * @throws PropelException
     *
     * @param integer $offset
     * @param mixed   $value
     */
    public function offsetSet($offset, $value): void
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    /**
     * @throws PropelException
     *
     * @param integer $offset
     */
    public function offsetUnset($offset): void
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    // Serializable Interface

    /**
     * @throws PropelException
     */
    public function serialize(): string
    {
        throw new PropelException('The On Demand Collection cannot be serialized');
    }

    /**
     * @param string $data
     *
     * @return void
     * @throws PropelException
     *
     */
    public function unserialize(string $data): void
    {
        throw new PropelException('The On Demand Collection cannot be serialized');
    }

    // Countable Interface

    /**
     * Returns the number of rows in the resultset
     * Warning: this number is inaccurate for most databases. Do not rely on it for a portable application.
     *
     * @return integer Number of results
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return $this->iterator->count();
    }

    // ArrayObject methods

    #[\ReturnTypeWillChange]
    public function append($value)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    public function prepend($value)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    public function asort(int $flags = SORT_REGULAR): bool
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function exchangeArray($input)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function getArrayCopy()
    {
        throw new PropelException('The On Demand Collection does not allow access by offset');
    }

    #[\ReturnTypeWillChange]
    public function getFlags()
    {
        throw new PropelException('The On Demand Collection does not allow access by offset');
    }

    public function ksort(int $flags = SORT_REGULAR): bool
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function natcasesort()
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function natsort()
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function setFlags($flags)
    {
        throw new PropelException('The On Demand Collection does not allow acces by offset');
    }

    #[\ReturnTypeWillChange]
    public function uasort($cmp_function)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    #[\ReturnTypeWillChange]
    public function uksort($cmp_function)
    {
        throw new PropelException('The On Demand Collection is read only');
    }

    /**
     * {@inheritdoc}
     */
    public function exportTo($parser, $usePrefix = true, $includeLazyLoadColumns = true)
    {
        throw new PropelException('A PropelOnDemandCollection cannot be exported.');
    }
}
