# Developer Portfolio — Laravel 13

A full-featured personal developer portfolio built with Laravel 13, featuring a public portfolio website, admin dashboard, REST API, Redis caching, Docker support, and PDF resume generation.

## Features

- **Public Portfolio** — Home, About, Skills, Experience, Education, Certifications, Projects, Services, Contact
- **Admin Dashboard** — Full CRUD for all portfolio sections
- **Authentication** — Laravel Breeze with admin middleware
- **Roles & Permissions** — Spatie Permission (Admin/Editor roles)
- **REST API** — Public API endpoints for portfolio data
- **Sanctum** — API authentication support
- **Redis** — Caching and queue processing
- **PDF Resume** — Downloadable CV generated with DomPDF
- **Contact System** — Contact form with message management
- **Dark/Light Mode** — Theme toggle with localStorage
- **Responsive Design** — Mobile-first with Tailwind CSS
- **Docker** — Containerized deployment with Nginx
- **Testing** — Feature and unit tests

## Tech Stack

| Technology | Purpose |
|---|---|
| Laravel 13 | PHP Framework |
| PHP 8.5 | Runtime |
| MySQL / SQLite | Database |
| Redis | Cache & Queue |
| Tailwind CSS | Styling |
| Alpine.js | Interactivity |
| Vite | Asset bundling |
| Docker | Containerization |
| Nginx | Web server |
| DomPDF | PDF generation |
| Spatie Permission | Authorization |

## Installation

### Prerequisites
- PHP 8.5+
- Composer
- Node.js 18+
- MySQL or SQLite

### Setup

```bash
# Clone the repository
git clone https://github.com/tahssin/developer-portfolio.git
cd developer-portfolio

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create database (SQLite)
touch database/database.sqlite

# Run migrations and seed
php artisan migrate:fresh --seed

# Build frontend assets
npm run build

# Start the server
php artisan serve
```

Visit: http://localhost:8000

### Default Credentials

| Email | Password | Role |
|---|---|---|
| admin@portfolio.com | password | Admin |

## Docker Setup

```bash
# Copy Docker environment
cp .env.docker .env

# Build and start containers
docker compose up -d --build

# Run migrations
docker compose exec app php artisan migrate:fresh --seed

# Generate key
docker compose exec app php artisan key:generate
```

Visit: http://localhost:8080

## API Documentation

### Public Endpoints

```
GET /api/profile       — Developer profile
GET /api/skills        — Skills by category
GET /api/projects      — Published projects
GET /api/projects/{slug} — Single project
GET /api/experiences   — Work experience
GET /api/education     — Education records
GET /api/services      — Services offered
```

### Example Response

```json
{
    "data": {
        "name": "Tahssin",
        "title": "Junior Full-Stack Laravel Developer",
        "bio": "..."
    }
}
```

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin CRUD controllers
│   │   ├── Api/            # REST API controllers
│   │   └── Portfolio/      # Public page controllers
│   ├── Models/             # Eloquent models
│   ├── Jobs/               # Queue jobs
│   └── Services/           # Cache service
├── config/
├── database/
│   ├── factories/          # Model factories
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── docker/                 # Docker configuration
├── resources/
│   └── views/
│       ├── admin/          # Admin dashboard views
│       ├── portfolio/      # Public portfolio views
│       └── components/     # Blade components
├── routes/
│   ├── web.php             # Web routes
│   └── api.php             # API routes
├── tests/                  # Automated tests
├── Dockerfile
├── docker-compose.yml
└── README.md
```

## Testing

```bash
php artisan test
```

## License

MIT License.

## Author

**Tahssin** — Junior Full-Stack Laravel Developer
- GitHub: [github.com/tahssin](https://github.com/tahssin)
- LinkedIn: [linkedin.com/in/tahssin](https://linkedin.com/in/tahssin)