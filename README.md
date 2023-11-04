# Movie-App-Laravel

Movie-App-Laravel is a web application created with Laravel that utilizes the TMDb API to fetch and display movie data. Users can explore various movies, view details, and search for specific titles within the application.

## Description

This application serves as a user-friendly platform for movie enthusiasts to discover trending, popular, and now playing movies. It leverages the powerful features of the Laravel framework to provide a seamless and interactive experience for users.

## Installation

To run Movie-App-Laravel on your local machine, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/Movie-App-Laravel.git
    ```

2. Navigate to the project directory:

    ```bash
    cd Movie-App-Laravel
    ```

3. Install the necessary dependencies:

    ```bash
    composer install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Configure the necessary environment variables, including the database settings and the TMDb API key.

    ```
    TMDB_TOKEN="If you don't have one, follow the instructions below to obtain it."
    BASE_URL="https://api.themoviedb.org/3"
    POSTER_URL="https://image.tmdb.org/t/p/w500"
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. Start the local development server:

    ```bash
    php artisan serve
    ```

8. Open your web browser and go to `http://localhost:8000` to access the Movie-App-Laravel application.

## Usage

- Browse through the collection of movies and view their details.
- Utilize the search feature to find specific movies by title.
- Explore the latest popular and now playing movies from the TMDb API.

## Obtaining the TMDb API Token

To utilize the TMDb API in this application, you will need to acquire an API token from [The Movie Database (TMDb)](https://www.themoviedb.org/documentation/api). If you don't have a token yet, you can follow these steps to obtain one:

1. Visit the [TMDb API documentation](https://www.themoviedb.org/documentation/api) page.
2. Sign up for a free account if you don't have one.
3. Once you have an account, you can generate an API token from your account settings.
4. Copy the token and replace the placeholder value for `TMDB_TOKEN` in the `.env` file with your newly acquired API token.

For any assistance or queries regarding obtaining the TMDb API token, please feel free to contact me.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
