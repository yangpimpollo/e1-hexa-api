# Contexto del Proyecto: e1-hexa-api

Este proyecto es una API de Laravel refactorizada hacia **Arquitectura Hexagonal (DDD)**. 

## Estado Actual: Módulo `Book`

El módulo `Book` se ha migrado completamente a la estructura de `src/` bajo los principios de Clean Architecture:

### 1. Dominio (`src/Domain`)
- **Entidad**: `Entity/Book.php` (Objeto PHP puro, sin dependencias de Laravel).
- **Repositorio (Interfaz)**: `Repository/BookRepositoryInterface.php` (Contrato de persistencia).

### 2. Aplicación (`src/Application`)
- **Casos de Uso**: Ubicados en `UseCases/Book/`. Se han implementado las acciones CRUD de forma aislada:
    - `ListBooksUseCase`, `CreateBookUseCase`, `GetBookUseCase`, `UpdateBookUseCase`, `DeleteBookUseCase`.
- **DTOs**: `DTOs/BookDTO.php` para el paso de datos entre capas sin depender de `Request` de HTTP.

### 3. Infraestructura (`src/Infrastructure`)
- **Controlador**: `Http/Controllers/BookController.php`. Implementa un controlador "delgado" (Thin Controller) que delega la lógica a los Casos de Uso.
- **Persistencia**: `Persistence/EloquentBookRepository.php`. Implementación de la interfaz de repositorio usando Laravel Eloquent (`App\Models\Book`).
- **Rutas**: Definidas en `Routes/my_api.php`. Estas rutas se cargan en `bootstrap/app.php` en lugar del `api.php` estándar.
- **Service Provider**: `Providers/myServiceProvider.php`. Gestiona la Inyección de Dependencias (Dependency Injection) vinculando la interfaz del repositorio con su implementación concreta.

## Configuración del Framework
- **Autoloading**: El namespace `yangpimpollo\\` está mapeado a la carpeta `src/` en el `composer.json`.
- **Registro de Providers**: El `myServiceProvider` de infraestructura está registrado en `bootstrap/providers.php`.
- **Rutas API**: Laravel está configurado para usar `src/Infrastructure/Routes/my_api.php` como archivo principal de rutas API.

## Control de Versiones
- **Remoto**: `https://github.com/yangpimpollo/e1-hexa-api.git`
- **Rama principal**: `master`

---
*Documento generado por Gemini CLI para mantener el contexto entre sesiones.*
