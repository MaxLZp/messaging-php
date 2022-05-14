<?php
namespace MaxLZp\Messaging\Tests;

use MaxLZp\Messaging\Message;
use MaxLZp\Messaging\Recipient;
use PHPUnit\Framework\TestCase;
use MaxLZp\Messaging\Recipients;
use MaxLZp\Messaging\Exceptions\MessageSendServiceNotSetException;
use MaxLZp\Messaging\Exceptions\MessageEmptyRecipientsCollectionException;

/**
 * MessageTest class
 * 
 * @package MaxLZp\Messaging\Tests
 */
class MessageTest extends TestCase
{
    /** @test */
    public function should_throw_exception_when_sendservice_not_set( ): void
    {
        $this->expectException(MessageSendServiceNotSetException::class);
        $message = new Message('subject', 'body');
        $message->send();
    }

    /** @test */
    public function should_throw_exception_when_setting_to_with_empty_recipients_collection(): void
    {
        $this->expectException(MessageEmptyRecipientsCollectionException::class);
        $message = new Message('subject', 'body');
        $message->to(new Recipients());
    }

    /** @test */
    public function should_create_message_when_setting_to_with_filled_recipients_collection(): void
    {
        $recipients = new Recipients();
        $recipients->add(new Recipient('John', 'Doe'));
        $message = new Message('subject', 'body');
        $message->to($recipients);
        $this->assertNotNull($message);
    }

    /** @test */
    public function should_clone_recipients_colletion_on_set(): void
    {
        $recipients = new Recipients();
        $recipients->add(new Recipient('John', 'Doe'));
        $message = new Message('subject', 'body');
        $message->to($recipients);
        $recipients->add(new Recipient('Jane', 'Doe'));
        $this->assertNotEquals($recipients, $message->getRecipients());
    }
}