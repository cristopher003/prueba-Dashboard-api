## Run App Manually


- Cree un archivo .env para el entorno Laravel desde .env.example en la carpeta src
- Ejecute el comando en su terminal ```docker-compose build```
- Ejecute el comando en su terminal ```docker-compose up -d``` 
- Ejecute el comando en su terminal después de entrar en el contenedor php en Docker```composer install```  
- Ejecute el comando en su terminal ```docker exec -it php /bin/sh``` 
- Ejecute el comando en su terminal después de entrar en el contenedor php en Docker```chmod -R 777 storage``` 
- Si app:key sigue vacía en .env, ejecútela en su terminal después de entrar en el contenedor php en docke ```php artisan key:generate``` 
- Para ejecutar comandos artesanales como migrate, etc., vaya al contenedor php usando ```docker exec -it php /bin/sh```
- Ve a http://localhost:8001 o a cualquier puerto que hayas configurado para abrir Laravel
