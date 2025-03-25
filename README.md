# gateway-smsomnicell
SMS Gateway для сервиса [omnicell.ua](https://omnicell.ua)

Установка:
```
composer require nekkoy/gateway-smsomnicell
```

Конфигурация `.env`
===============
```
# Включить/выключить модуль
SMSOMNICELL_ENABLED=true

# Логин
SMSOMNICELL_LOGIN=

# Пароль
SMSOMNICELL_PASSWORD=

# Имя отправителя в СМС
SMSOMNICELL_SMS_NAME=

# Описание рассылки
SMSOMNICELL_DESCRIPTION=
```

Использование
===============

Создайте DTO сообщения, передав первым параметром текст, а вторым — номер получателя:
```
$message = new \Nekkoy\GatewayAbstract\DTO\MessageDTO("test", "+380123456789");
```

Затем вызовите метод отправки сообщения через фасад:
```
/** @var \Nekkoy\GatewayAbstract\DTO\ResponseDTO $response */
$response = \Nekkoy\GatewaySmsomnicell\Facades\GatewaySmsomnicell::send($message);
```

Метод возвращает DTO-ответ с параметрами:
 - message - сообщение об успешной отправке или ошибке
 - code - код ответа:
   - code < 0 - ошибка модуля
   - code > 0 - ошибка HTTP
   - code = 0 - успех
 - id - ID сообщения
