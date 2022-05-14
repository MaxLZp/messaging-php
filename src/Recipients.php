<?php
declare(strict_types=1);
namespace MaxLZp\Messaging;

use Ramsey\Collection\AbstractCollection;

/**
 * Class Recipients
 *
 * @package MaxLZp\Messaging
 */
class Recipients extends AbstractCollection
{
    /**
     * Type of underlying collection
     *
     * @return string
     */
    public function getType(): string
    {
        return Recipient::class;
    }
}