# Pixel Plaza

### Development Team:
- Esteban Vergara Giraldo
- Jonathan Betancur Espinosa
- Samuel Rendón Trujillo

### Deployment at: 
http://pixel-plaza.online

### API consumption at: 
http://pixel-plaza.online/api/games  
http://pixel-plaza.online/api/games/{id}

## Getting Started

Follow these instructions to get the project up and running on your local machine.

### Prerequisites

- PHP >= 7.3
- Composer
- MySQL

### Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/jonathanbees/Pixel-Plaza.git
    cd Pixel-Plaza
    ```

2. **Install the dependencies:**
    ```sh
    composer install
    ```

3. **Copy the `.env.example` file to `.env`:**
    ```sh
    cp .env.example .env
    ```

4. **Add your database information and API key to the `.env` file:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    GEMINI_API_KEY=your_gemini_api_key
    HUGGINGFACE_API_KEY=your_huggingface_api_key
    ```

5. **Run the migrations:**
    ```sh
    php artisan migrate
    ```

6. **Seed the database:**
    ```sh
    php artisan db:seed
    ```

### Running the Project

1. **Start the local development server:**
    ```sh
    php artisan serve
    ```

2. **Visit the project in your browser:**
    ```
    http://localhost:8000
    ```

## Additional Information

For more details, refer to the [Laravel documentation](https://laravel.com/docs).
