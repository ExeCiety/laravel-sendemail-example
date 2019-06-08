# Send Email Using Google Mail, Ajax, Sweet Alert2 and RestAPI in Laravel

Send Email Using Google Mail, Ajax, Sweet Alert2 and RestAPI with Template in Laravel 5.8

installations : 
1. Clone or Download repository
2. In project directory type command : composer install
3. Create .env file from .env.example (With console)

How To Use :
1. Configure the email in the env file

--------------------------------------------------------
MAIL_DRIVER=smtp 
MAIL_HOST=smtp.gmail.com 
MAIL_PORT=465 *port mail server (TLS: 587 | SSL: 465) 
MAIL_USERNAME=*your gmail address (to be an email server) 
MAIL_PASSWORD=*your password of gmail address 
MAIL_ENCRYPTION=ssl *method mail ecryption (tls | ssl) 
--------------------------------------------------------

2. Configure the email in App/Http/Controllers/ApiSendMailController.php

--------------------------------------------------------
Mail::to('*Your Email')->send(new SendMail($data));
--------------------------------------------------------

3. Serve your project : php artisan serve
