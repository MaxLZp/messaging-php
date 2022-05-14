<?php
declare(strict_types=1);
namespace MaxLZp\Messaging;

/**
 * Interface SendServiceInterface
 *
 * @package MaxLZp\Messaging
 */
interface SendServiceInterface
{
    /**
     * Send message
     *
     * @param Message $message
     * @return void
     */
    function send(Message $message): void;
}