# Gestión de Tareas (Task App)

Plataforma de gestión de tareas desarrollada en Laravel con autenticación, control de roles y diseño responsivo usando Bootstrap 5.

## Características Principales
* **CRUD de Tareas:** Creación, edición, listado y eliminación de tareas con asignación por usuario.
* **Control de Acceso (ACL):** Sistema de roles implementado con `spatie/laravel-permission` (Roles: Admin, Editor, Usuario).
* **Seguridad y Políticas:** Uso de Laravel Policies para asegurar que cada usuario solo modifique sus datos, con excepciones globales para administradores y editores.
* **Entorno Contenerizado:** Configurado para ejecutarse de forma aislada y estandarizada mediante Laravel Sail (Docker).

## Requisitos Previos
* Docker y Docker Compose en ejecución.
* Git.

## Instalación y Configuración (Paso a Paso)

1. **Clonar el repositorio:**

```bash
git clone <url-de-tu-repositorio>
cd <nombre-de-la-carpeta>
```

2. **Instalar dependencias de Composer (vía contenedor temporal):**


```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

3. **Configurar el entorno:**
```bash
cp .env.example .env
```

4. **Levantar los contenedores en segundo plano:**
```bash
./vendor/bin/sail up -d
```

5. **Generar la llave de la aplicación y sembrar la base de datos:**
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed
```