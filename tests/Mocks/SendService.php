<?php
declare(strict_types=1);

namespace MaxLZp\Messaging\Tests\Mocks;

use MaxLZp\Messaging\Message;
use MaxLZp\Messaging\SendServiceInterface;

/**
 * SendService mock
 */
class SendService implements SendServiceInterface
{
    /**
     * Send message
     *
     * @param Message $message
     * @return void
     */
    public function send(Message $message): void
    {
        // perform message send
    }

}