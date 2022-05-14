<?php
namespace MaxLZp\Messaging\Tests;

use MaxLZp\Messaging\Recipient;
use PHPUnit\Framework\TestCase;
use MaxLZp\Messaging\Recipients;

/**
 * RecipientsTest class
 * 
 * @package MaxLZp\Messaging\Tests
 */
class RecipientsTest extends TestCase
{
    /** @test */
    public function collection_type_should_be_recipient(): void
    {
        $recipients = new Recipients();
        $this->assertEquals(Recipient::class, $recipients->getType());
    }
}