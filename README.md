# Laravel Resume API

## Introduction

The Laravel Resume API is a web application developed using the Laravel framework and Laravel Sail for Docker-based development. This API allows users to create and manage their professional resumes. Additionally, it includes Swagger documentation for easy reference and interaction.

## Features

-   **Profile Management**: Create and update user profiles with personal information.
-   **Education**: Add education details such as institution, degree, and date range.
-   **Skills**: Add and manage skills for your resume.
-   **Work Experiences**: Add work experiences with job titles, companies, date ranges, and responsibilities.
-   **Project**: Add projects with title, url, description, repo, and stacks.

## Installation

Follow these steps to set up the Laravel Resume API on your local development environment using Laravel Sail:

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/laravel-resume-api.git
    ```

2. Navigate to the project directory:

```bash
cd laravel-resume-api
```

3. Install PHP dependencies using Composer:

```bash
composer install
```

4. Generate an application key::

```bash
php artisan key:generate
```

5. Set up Laravel Sail and start the Docker containers:

```bash
./vendor/bin/sail up
```

The API should now be accessible at http://localhost.

### API Endpoints

-   POST /api/register: Register a new user.
-   POST /api/login: Authenticate and obtain a JWT token.
-   GET /api/user: Retrieve user information.
-   PUT /api/user: Update user information.
-   GET /api/education: Retrieve education details.
-   POST /api/education: Add education details.
-   PUT /api/education/{id}: Update education details.
-   DELETE /api/education/{id}: Delete education details.
-   GET /api/skills: Retrieve skills.
-   POST /api/skills: Add a skill.
-   PUT /api/skills/{id}: Update a skill.
-   DELETE /api/skills/{id}: Delete a skill.
-   GET /api/experiences: Retrieve work experiences.
-   POST /api/experiences: Add a work experience.
-   PUT /api/experiences/{id}: Update a work experience.
-   DELETE /api/experiences/{id}: Delete a work experience.

### Swagger Documentation

This project includes Swagger documentation for the API. You can access it by navigating to http://localhost/api/documentation after starting the Laravel Sail containers. The Swagger documentation provides detailed information about available endpoints and allows you to interact with the API.

### Contribution

Contributions to the Laravel Resume API project are welcome. If you'd like to contribute, please follow these steps:

-   Fork the repository.
-   Create a new branch for your feature or bug fix.
-   Make your changes and commit them with clear and concise messages.
-   Push your changes to your fork.
-   Create a pull request to the main repository's main branch.

### License

This project is licensed under the MIT License.

### Acknowledgments

Thanks to the Laravel community for their excellent documentation and resources.
Inspired by the need for a simple and customizable resume management system.
Contact
For any inquiries or feedback, please contact samson_ude@yahoo.com .
