# 🏫 Instituto

Aplicación web para la **gestión integral de un centro educativo**, desarrollada con Laravel. Permite administrar alumnos, profesores, cursos, horarios y demás recursos del instituto desde una interfaz centralizada.

---

## 📋 Tabla de contenidos

- [Requisitos](#requisitos)
- [Instalación y uso](#instalación-y-uso)
- [Estructura del proyecto](#estructura-del-proyecto)

---

## Requisitos

Antes de comenzar, asegúrate de tener instalado:

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Node.js y npm (para compilar assets)
- Git

---

## Instalación y uso

### 1. Clonar el repositorio

```bash
git clone git@github.com:jarocajavi/instituto.git
cd instituto
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias de frontend

```bash
npm install
npm run build
```

### 4. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con los datos de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=instituto
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Ejecutar migraciones y seeders

```bash
php artisan migrate
php artisan db:seed
```

### 6. Iniciar el servidor de desarrollo

```bash
php artisan serve
```

La aplicación estará disponible en [http://localhost:8000](http://localhost:8000).

---

## Estructura del proyecto

```
instituto/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Controladores de la aplicación
│   │   └── Middleware/        # Middleware personalizado
│   ├── Models/                # Modelos Eloquent (Alumno, Profesor, Curso…)
│   └── Providers/             # Service providers
├── config/                    # Archivos de configuración
├── database/
│   ├── migrations/            # Migraciones de base de datos
│   └── seeders/               # Datos iniciales
├── public/                    # Punto de entrada y assets públicos
├── resources/
│   ├── css/                   # Estilos
│   ├── js/                    # JavaScript
│   └── views/                 # Vistas Blade
├── routes/
│   ├── web.php                # Rutas web
│   └── api.php                # Rutas API (si aplica)
├── storage/                   # Logs, caché y archivos subidos
├── tests/                     # Tests unitarios y de integración
├── .env.example               # Plantilla de variables de entorno
├── composer.json
└── package.json
```

---

## ⚙️ Comandos útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ejecutar tests
php artisan test

# Compilar assets en modo desarrollo (watch)
npm run dev
```

---

## 👤 Autor

**jarocajavi** — [@jarocajavi](https://github.com/jarocajavi)
