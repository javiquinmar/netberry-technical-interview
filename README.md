<p align="center"><a href="https://www.netberry.es/" target="_blank"><img src="https://www.netberry.es/wp-content/uploads/2021/03/logo_netberry-01.png" width="400" alt="Netberry Logo"></a></p>


# Netberry Technical Interview

Proyecto de listado de tareas pendientes en la que se permite añadir y eliminar tareas.

Se ha realizado con:
- Laravel 10
- Vue 3
- PHP 8.2


## Instalación

- Clonar el proyecto
```bash
  git clone https://github.com/javiquinmar/netberry-technical-interview.git
```

- Instalar paquetes PHP

```bash
  composer install
```

- Generar archivo de variablas de entorno y configurar la conexión con la base de datos.
```bash
  cp .env.example .env
``` 

- Generar nueva clave

```bash
  php artisan key:generate
```

- Correr migraciones con seeds (datos fake)

```bash
  php artisan migrate:fresh --seed
```

- Instalar paquetes Javascript

```bash
  npm run install
```

- Compilar assets

```bash
  npm run dev
```


### Observaciones

- He realizado todo lo que se pedía, pero me gustaría hacer una puntualización sobre el punto "La búsqueda de las tareas junto a sus categorías, debe hacerse con una sola sentencia SQL". Y es que la he realizado con eagerLoading de Eloquent, en la que realmente se realizan dos consultas, pero me gusta realizarlo así por la legibilidad del código. 
Si prefieren que la realice en una única consulta podría refactorizarlo.

- No he desarrollado la opción de editar de las tareas ya que no se pedía en el ejercicio, pero me quedé con la duda de si debería haberla realizado.

- Tampoco desarrollé tests, pero al igual que lo anterior que mencioné, si desean que los realice me lo dicen por favor.