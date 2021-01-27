<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## EVERTEC, prueba técnica por Yeison Mosquera

## Guia simple de como poner en marcha el repositorio 

Para poner en marcha la aplicación siga estos pasos:
 
- Clone el repositorio en un directorio con los permisos adecuados teniendo en cuenta la configuración de su servidor http
- Cambie al directorio que acabo de clonar
- Abra un terminal y ejecute composer install
- Realice una copia del archivo .env.example a .env y otra a .env.testing
- Cree una base de datos con su gestor de base de datos preferido
- El nombre de base de datos, el usuario y contraseña especifiquelos en su archivo .env
- El archivo .env.testing está seteado para usar sqlite en memoria, por ende deberá tener instalado en su sistema dicho gestor
 
Si no pretende instalar dicho gestor de datos modifique el archivo a su conveniencia
En el archivo .env.example esta las variables de entorno que debe usar tanto para .env como para .env.testing
Agregue únicamente las credenciales 'PLACETOPAY_LOGIN' y 'PLACETOPAY_SECRET'
 
Si ha configurado bien las variables de entorno, ahora proceda con lo siguiente:
- ejecute dentro del directorio del proyecto 'php artisan key:generate'
- ejecute dentro del directorio del proyecto 'php artisan key:generate'
- ejecute 'php artisan migrate:fresh --seed'
- ejecute 'php artisan test'
 
Si todo ha salido bien, la ejecución del test mostrará que todas las validaciones pasaron
 
Finalmente puede ejecutar php artisan server

Para realizar la verificación del estado de los pagos de forma automática, se hace uso de un command, el cual se ejecuta cada minuto
Para lograr que este comando se ejecute de forma automática, y permita evidenciar la actualización de estado de las órdenes de compra,
será necesario que cree una línea dentro de su manejador de cron, ejecute 'crontab -e' y agregue una linea como la siguiente
'* * * * * cd /directorio_del_repositorio && php artisan schedule:run >> /dev/null 2>&1'

Si no lo desea, en ese caso ejecute manualmente dentro del directorio del repositorio: 'php artisan check:payment_status' cada vez que desee
que se actualicen los estados de los pagos

Contacto: Email [404.mosquera@gmail.com]
          Linkedin [Yeison_Mosquera](https://www.linkedin.com/in/thebar70)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
