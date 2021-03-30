# DieL_Delivery_App
Aplicación móvil de la tienda Donuts Lapili para gestionar los pedidos de Donas.

DieL Viene de la pronunciación en inglés de las iniciales de la tienda de donas (Donuts Lapili).

# Entregables

# A. Código fuente de las API’s y manual de uso

	El código fuente del back de la aplicación se encuentra en el directorio "diel_app"

	Dentro del directorio anteriormente mencionado podrá encontrar el subdirectorio "routes" y dentro de él, el archivo "api.php", el cual contiene todas las rutas que se pueden visitar.
	
* Para iniciar sesión, utilizaremos el método login (POST) de la API Con alguno de los usuarios creados en la DB, si el inicio de sesión es exitoso, se obtendrá un token de autenticación
 ![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/inicio_Sesion.PNG)
* Para ver los pedidos - A través de GET - (Literal A de la sección Encargado de punto de venta), se puede utilizar el método orders de la API, si este se realiza sin el token de autenticación anteriormente obtenido, no se podrá obtener el resultado
 ![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/sin_Inicio_Sesion.PNG)
 
 Si utilizamos el token de autenticación podremos ver los pedidos 
 ![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/con_Inicio_Sesion.PNG)
 
 La estructura de la respuesta es la siguiente:
 ![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/estructura_Ordenes.PNG)
 
 De aquí en adelante, tener muy en cuenta utilizar el token de autenticación en el encabezado de la petición, de lo contrario, no se podrán obtener los datos

* Para ver la informacion de un pedido específico (GET), podemos hacerlo pasándole el id del mismo, así:
![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/obtener_Orden_Especifica.PNG)

* La manera de hacer un pedido es -POST- (Literal B de la sección de Cliente):
![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/hacer_Pedido.PNG)

* Para actualizar el estado de un pedido -PUT- (Literales C de la sección Cliente, B de la sección encargado de punto de venta y B de la sección Repartidor)
![alt text](https://github.com/hectorfabiopv/DieL_Delivery_App/blob/main/actualizar_Estado_Orden.PNG)

# B. Base de Datos

	Archivo "diel_delivery_app_db.sql"


# Acerca de las tecnologías utilizadas

	Este proyecto se realizó utilizando Laravel V8.34.0, así como también el paquete para la autenticación Laravel Sanctum (^2.6).

	El front de la aplicación fue desarrollado en Angular V10.0.0.

	El script de la base de datos fue hecho en Mysql, soportado por el servidor de base de datos MariaDB V10.4.13.
