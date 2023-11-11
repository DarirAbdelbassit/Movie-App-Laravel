# Movie-App-Laravel

Movie-App-Laravel is a modern web application built with Laravel, Livewire, Alpine.js, and Tailwind CSS. It seamlessly integrates with the TMDb API to fetch and display comprehensive movie and TV show data. Users can explore a diverse collection of content, view detailed information, and easily search for specific titles within the application.

## Description

This application serves as a feature-rich platform for movie and TV show enthusiasts. It harnesses the power of Laravel, Livewire, Alpine.js, and Tailwind CSS to provide a delightful and interactive experience for users. Movie-App-Laravel allows users to:

- Explore popular and now playing movies with details ranging from cast and crew to trailers and images.
- Discover top-rated and popular TV shows with in-depth information.
- Browse through a paginated list of popular actors, each with their detailed profiles, social media links, and a comprehensive list of their works and credits.

Whether you're interested in the latest blockbuster, binge-worthy TV shows, or learning more about your favorite actors, Movie-App-Laravel has you covered.

## Project Screenshots

![movies index](https://github.com/DarirAbdelbassit/Movie-App-Laravel/assets/85806305/a4a2390e-b50f-4aae-b8ca-d3b8262a559c)
*Movies List*

![tvshows index](https://github.com/DarirAbdelbassit/Movie-App-Laravel/assets/85806305/367f0030-d63f-4d5c-aac3-1ad7114aeab9)
*TV Shows List*

![actors show](https://github.com/DarirAbdelbassit/Movie-App-Laravel/assets/85806305/2982a5a6-a2f1-4d0e-ae55-ecdf55e7e8b8)
*Actor Details*

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

4. Create a copy of the `.env.example` file and rename it to `.env`. Open the `.env` file and update the `TMDB_TOKEN` value with the API key you obtained from [TMDb](https://www.themoviedb.org/login?to=read_me&redirect=%2Fdocs).

    ```dotenv
    TMDB_TOKEN=your-tmdb-api-key
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Install npm dependencies:

    ```bash
    npm install
    ```

7. Compile assets:

    ```bash
    npm run dev
    ```

8. Start the local development server:

    ```bash
    php artisan serve
    ```

9. Open your web browser and go to `http://localhost:8000` to access the Movie-App-Laravel application.

## Usage

- Explore a wide variety of popular and now playing movies with detailed information.
- Discover top-rated and popular TV shows with comprehensive details.
- Browse through a paginated list of popular actors, each with detailed profiles and social media links.
- Dive into actor details, including their social media presence and a comprehensive list of their works and credits.

## Obtaining the TMDb API Token

To utilize the TMDb API in this application, you will need to acquire an API token from [The Movie Database (TMDb)](https://www.themoviedb.org/documentation/api):

1. Visit the [TMDb API documentation](https://www.themoviedb.org/documentation/api) page.
2. Sign up for a free account if you don't have one.
3. Once you have an account, you can generate an API token from your account settings.
4. Copy the token and replace the placeholder value for `TMDB_TOKEN` in the `.env` file with your newly acquired API token.

For any assistance or queries regarding obtaining the TMDb API token, please feel free to contact me.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
