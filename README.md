## PHP SDK для Wazzup
Простое решение для работы из PHP с Wazzup.

[Документация по Wazzup](https://wazzup24.ru/help/api-ru/)

Реализовано:
- [x] Отправка сообщений
- [x] Работа с каналами
- [x] Работа с сущностью пользователя
- [x] Работа с контактами
- [x] Работа со списком сделок
- [x] Загрузка воронок продаж
- [x] Окно чатов (iFrame)
- [x] Вебхуки

## Требования
- PHP 7.4
- Любой HTTP-клиент поддерживающий [PSR-18 (HTTP-client)](https://www.php-fig.org/psr/psr-18/)

### Установка
```bash
composer require epzuz/wazzup-sdk
```

### Пример инициализация клиента
```php
$client = new Client('Ваш API токен', new \GuzzleHttp\Client());
```

### Пример создания и редактирования контакта
```php
$list                          = new ListRequestDto();
$contactDto                    = new ContactItemDto();

$contactDto->id                = 'ID контакта';
$contactDto->name              = 'Имя контакта';
$contactDto->responsibleUserId = 'ID ответственного';
$contactDto->uri               = 'Ссылка на ответственного';
$contactData                   = new ContactDataDto();
$contactData->chatType         = 'whatsapp';
$contactData->chatId           = '1234567';

$contactDto->contactData[]     = $contactData;
$list->push($contactDto);
$response = $client->contacts()->add($list);
$response = new WazzupResponse($response);
```

## Доступные методы
### Для CRUD модулей (Contacts, Deals, Users) на примере модуля Contacts
```php
$client->contacts()->add(new \Epzuz\WazzupSdk\Dto\ListRequestDto());
$client->contacts()->getList($offset);
$client->contacts()->getById($id);
$client->contacts()->delete($id);
$client->contacts()->bulkDelete(array $ids))
```
### Методы модуля Channels
```php
$client->channels()->getList();
```

### Методы модуля IFrame
```php
$iframeDto           = new \Epzuz\WazzupSdk\Dto\IFrameRequestDto();
$iframeDto->scope    = 'global';
$iframeDto->userId   = 'userId';
$iframeDto->userName = 'userName';
//при необходимости можно добавить Dto для опций и фильтров
$iframeDto->options                   = new \Epzuz\WazzupSdk\Dto\IFrameOptionsDto();
$iframeDto->options->useMessageEvents = true;
$client->iframe()->getFrame($iframeDto);
```

### Методы модуля Messages
```php
$client->messages()->send(new MessageRequestDto());
```

### Методы модуля Pipelines
```php
$client->pipelines()->getList();
$client->pipelines()->store(new ListRequestDto());
```

### Методы модуля Webhooks
```php
$webhooks                                          = new WebhookDto();
$webhooks->webhooksUri                             = YOUR_URI_HERE;
$webhooks->subscriptions->contactsAndDealsCreation = true;
$client->webhooks()->patch($webhooks);

$client->webhooks()->get()
```

### Вспомогающие сущности
```php
//Все запросы возвращают \Psr\Http\Message\ResponseInterface.
//Вы можете использовать WazzupResponse для обработки Response или свой локальный обработчик
$response = $this->service->getClient()->contacts()->add($list);
$response = new WazzupResponse($response);
$response->getBody();
$response->getStatusCode();
$response->isOk();
$response->getErrors();
$response->hasErrors();
```

### Формирование ListRequestDto для запросов
```php
//Вы можете добавить в класс ListRequestDto любой из классов, который реализуют интерфейс WazzupItemDtoInterface
$list                       = new ListRequestDto();
$contact                    = new ContactItemDto();
$contact->id                = '1';
$contact->name              = 'asdasd';
$contact->contactData[]     = [
    'chatType' => 'whatsapp',
    'chatId'   => '79822333344'
];
$contact->responsibleUserId = 1;
$list->push($contact);
```

### Донат
[![Донат](https://sinicyn.ru/wp-content/uploads/2021/05/b00sty.png)](https://boosty.to/epzuz/donate)

