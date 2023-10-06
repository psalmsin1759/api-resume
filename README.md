# Laravel Resume API - Test-Driven Application

## Introduction

The Laravel Resume API is a web application developed using the Laravel framework and Laravel Sail for Docker-based development. This API allows users to create and manage their professional resumes. Additionally, it includes Swagger documentation for easy reference and interaction.

```bash

{
    "success": true,
    "message": "success",
    "data": [
        {
            "name": "Samson Ude",
            "title": "Senior Software Engineer | Mobile Developer | Full Stack Developer",
            "about": "Seasoned Senior Software Engineer: Full-stack proficiency (PHP, Java, Laravel, Javascript, Dart, ReactJS), mobile app dev (Flutter), DBs (MySQL, PostgreSQL), Docker, CI/CD (CloudBuild, GitHub Actions), cloud (Google, AWS). Passionate about innovative solutions.",
            "education": [
                {
                    "institution": "University of Ibadan - Oyo State, Ibadan, Nigeria",
                    "degree": "Bachelor of Science: Electrical/Electronics Engineering",
                    "date-range": "2004 - 2009",
                    "user_id": 1
                }
            ],
            "skills": [
                "PHP",
                "Laravel",
                "Java",
                "Flutter",
                "React",
                "Mobile App Development",
                "Docker",
                "PHPUnit",
                "GraphQL",
                "C#",
                "VB.Net"
            ],
            "experiences": [
                {
                    "title": "Senior Software Engineer",
                    "company": "QNetix Technologies LTD",
                    "date-range": "2020 - Current",
                    "responsibilities": [
                        "Built and maintained various PHP-based applications, using Laravel framework",
                        "Worked on real-time notifications for multiple web applications, uing Pusher and WebSockets"
                    ]
                },
                {
                    "title": "Senior Software Engineer",
                    "company": "Tivas Technologies",
                    "date-range": "2017 - 2020",
                    "responsibilities": [
                        "Developed custom packages to reuse code across multiple projects, reducing development time and improving efficiency"
                    ]
                },
                {
                    "title": "Full Stack Developer",
                    "company": "VAS2Nets Technologies",
                    "date-range": "2013 - 2017",
                    "responsibilities": [
                        "Assisted in the migration of existing PHP applications to Laravel framework resulting in improvement performance and scalability"
                    ]
                }
            ],
            "projects": [
                {
                    "name": "Inventro",
                    "url": "https://inventroapp.com/",
                    "description": "Inventro is a dynamic business management solution leveraging the power of technology to optimize operations. Built with precision using cutting-edge technologies like Flutter for the frontend and Laravel for the backend, it ensures a seamless user experience. With its cloud-based architecture, businesses can access their data securely from anywhere. Inventro empowers businesses with a robust point-of-sale system, insightful sales analytics, efficient inventory management, and expense tracking, revolutionizing the way they operate and grow",
                    "repository": "https://github.com/psalmsin1759/inventro_mobile",
                    "stacks": [
                        "PHP",
                        "Laravel",
                        "Flutter",
                        "Dart",
                        "Android Development",
                        "iOS Development",
                        "Docker",
                        "CI/CD - Github Workflow",
                        "CI/CD - Github Actions",
                        "Firebase",
                        "Google Cloud Run",
                        "Google Pub/Sub",
                        "Google Storage"
                    ]
                },
                {
                    "name": "ChurchKonnect",
                    "url": "https://churchkonnect.com/",
                    "description": "Churchkonnect is a platform that provides a mobile app for churches with a variety of features. Some of these features include the ability to livestream services and events, accept online donations, provide access to the bible, offer audio and video sermons, and create groups and communities within the app",
                    "repository": "https://github.com/psalmsin1759/churchkonnect_mobile",
                    "stacks": []
                },
                {
                    "name": "ChurchKonnect",
                    "url": "https://churchkonnect.com/",
                    "description": "Churchkonnect is a platform that provides a mobile app for churches with a variety of features. Some of these features include the ability to livestream services and events, accept online donations, provide access to the bible, offer audio and video sermons, and create groups and communities within the app",
                    "repository": "https://github.com/psalmsin1759/churchkonnect_mobile",
                    "stacks": []
                }
            ]
        }
    ]
}

```

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

### Testing

-   This is a test-driven Laravel application, and tests play a crucial role in ensuring its reliability. To run tests, follow these steps:

-   Make sure you have PHPUnit installed. If it's not installed, you can install it using Composer:

```bash
./vendor/bin/sail composer require --dev phpunit/phpunit
```

-   Navigate to the root directory of your application in your terminal.

-   Run PHPUnit to execute the tests:

```bash
vendor/bin/phpunit
```

-   This command will run all the tests in your application and display the results.

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
