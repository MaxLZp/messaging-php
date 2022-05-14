<?php
namespace MaxLZp\Messaging\Tests;

use MaxLZp\Messaging\Message;
use MaxLZp\Messaging\Recipient;
use PHPUnit\Framework\TestCase;
use MaxLZp\Messaging\Recipients;
use MaxLZp\Messaging\Tests\Mocks\SendService;

/**
 * SendServiceTest class
 * 
 * @package MaxLZp\Messaging\Tests
 */
class SendServiceTest extends TestCase
{
    /** @test */
    public function should_send_message(): void
    {
        $service = new SendService();

        $recipients = new Recipients();
        $recipients->add(new Recipient('John', 'Doe'));
        $message = new Message('subject', 'body', $recipients);

        $service->send($message);

        $this->assertTrue(true);
    }
}