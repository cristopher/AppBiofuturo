# simple
Simple PHP Framework for CRUD Systems, Based on Panique/HUGE

Para usar en un servidor se deben seguir los siguientes pasos

1. Clona el repositorio en una nueva carpeta

```
git clone https://github.com/wetrust/simple.git
```

2. Eliminar el archivo de docker para local y usar el de producción

```
rm docker-compose.yml
mv docker-compose-prod.yml docker-compose.yml
```

3. Ingresar el dominio del servidor que vas a usar en el archivo docker-compose.yml

```
VIRTUAL_HOST: ".wetrust.cl"
LETSENCRYPT_HOST: ".wetrust.cl"
```
4. Ingresar el dominio del servidor que vas a usar en el archivo de nginx

```
cd nginx/conf.d
vi server.conf
```
server.conf
```
server_name               .wetrust.cl;
```

5. Ingresar el dominio del servidor en la configuración de la plataforma, tambien la personalización respecto al nombre de la plataforma

```
cd application/config
vi config.development.php
```
config.development.php
```
'COOKIE_NAME' => "PHPSESSID",
'COOKIE_DOMAIN' => ".wetrust.cl",
'EMAIL_FROM_NAME' => 'Simple',
```

**E-Mail**

Según su preferencia configure el sistema para enviar emails mediate SMTP o plataforma de google

> Si usa SMPT configure
```
cd application/config
vi config.development.php
```
config.development.php
```
'EMAIL_USED_MAILER' => 'phpmailer',
'EMAIL_USE_SMTP' => true,
'EMAIL_SMTP_HOST' => '',
'EMAIL_SMTP_AUTH' => true,
'EMAIL_SMTP_USERNAME' => '',
'EMAIL_SMTP_PASSWORD' => '',
'EMAIL_SMTP_PORT' => 587,
'EMAIL_FROM' => '',
```

> Si usa Google configure

1. Ingrese a console.cloud.google.com, ingrese al Menú API y Servicios
