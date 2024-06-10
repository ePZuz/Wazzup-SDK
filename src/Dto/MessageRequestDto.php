<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;
use Epzuz\WazzupSdk\Interfaces\WazzupRequestDtoInterface;

class MessageRequestDto implements WazzupRequestDtoInterface
{
    public string $channelId;

    public string $chatType;

    public ?string $chatId = null;

    public ?string $text = null;
    public ?string $contentUri = null;
    public ?string $refMessageId = null;
    public ?string $crmUserId = null;
    public ?string $crmMessageId = null;
    public ?string $username = null;
    public ?string $phone = null;
    public bool $clearUnanswered = true;
    public ?string $templateId = null;
    public $templateValues = null;

    protected array $buttonsObject = [];

    public function addButton(MessageButtonDto $button): MessageRequestDto
    {
        $this->buttonsObject[] = $button;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'channelId'       => $this->channelId,
            'chatType'        => $this->chatType,
            'chatId'          => $this->chatId,
            'text'            => $this->text,
            'contentUri'      => $this->contentUri,
            'refMessageId'    => $this->refMessageId,
            'crmUserId'       => $this->crmUserId,
            'crmMessageId'    => $this->crmMessageId,
            'username'        => $this->username,
            'phone'           => $this->phone,
            'clearUnanswered' => $this->clearUnanswered,
            'templateId'      => $this->templateId,
            'templateValues'  => $this->templateValues,
            'buttonsObject'   => !empty($this->buttonsObject) ? $this->buttonsObject : null,
        ];
    }
}