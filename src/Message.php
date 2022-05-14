<?php
declare(strict_types=1);
namespace MaxLZp\Messaging;

use MaxLZp\Messaging\Exceptions\MessageSendServiceNotSetException;
use MaxLZp\Messaging\Exceptions\MessageEmptyRecipientsCollectionException;

/**
 * Class Message
 *
 * @package MaxLZp\Messaging
 */
class Message
{
    /** @var string */
    protected $subject;
    /** @var string */
    protected $body;
    /** @var Recipients */
    protected $recipients;
    /** @var SendServiceInterface */
    protected $sendService;

    public function __construct(
        string $subject,
        string $body,
        Recipients $recipients = null,
        SendServiceInterface $sendService = null
    ) {
        $this->subject = $subject;
        $this->body = $body;
        if ($recipients) {
            $this->to($recipients);
        }
        if ($sendService) {
            $this->via($sendService);
        }
    }

    /**
     * Send the message
     */
    public function send(): void
    {
        if (!$this->sendService) {
            throw new MessageSendServiceNotSetException('Message send error. Message send service is not set.');
        }
        $this->sendService->send($this);
    }

    /**
     * Set message recipients
     *
     * @param Recipients $recipients
     * @return self
     */
    public function to(Recipients $recipients): self
    {
        if (count($recipients) === 0 ) {
            throw new MessageEmptyRecipientsCollectionException('Cannot set empty recipients collection.');
        }
        $this->recipients = clone $recipients;
        return $this;
    }

    /**
     * Set SendService to send the message
     *
     * @param SendServiceInterface $sendService
     * @return self
     */
    public function via(SendServiceInterface $sendService): self
    {
        $this->sendService = $sendService;
        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getRecipients(): Recipients
    {
        return clone $this->recipients;
    }
}