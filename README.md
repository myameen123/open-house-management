# Open House Platform for FYP Evaluation

Welcome to the Open House Platform, a comprehensive management system designed to streamline the Final Year Project (FYP) evaluation process. This platform facilitates efficient project assignments to evaluators based on their preferences and expertise. It ensures fairness and anonymity in the assessment, providing a user-friendly interface for both evaluators and students.

## Table of Contents

1. [Introduction](#introduction)
2. [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
3. [User Accounts](#user-accounts)
    - [Guests (Evaluators)](#guests-evaluators)
    - [FYP Groups (Students)](#fyp-groups-students)
    - [Admin Account](#admin-account)
4. [Project Assignment](#project-assignment)
5. [Evaluation Process](#evaluation-process)
6. [Student Access](#student-access)
7. [Bonus: Rubric-based Evaluation](#bonus-rubric-based-evaluation)
8. [Technical Considerations](#technical-considerations)
9. [Contributing](#contributing)
10. [License](#license)

## Introduction

The Open House Platform is designed to host the annual open house event at NUST-SEECS, where Final Year students showcase their projects to guests from industry and academia. The platform ensures a fair and efficient evaluation process by randomly assigning projects to evaluators based on matching keywords and preferences.

## Getting Started

### Prerequisites

Before setting up the platform, ensure you have the following:

- [PHP](https://www.php.net/) installed (>= 7.3.0)
- [Composer](https://getcomposer.org/) installed
- [Laravel](https://laravel.com/docs/8.x/installation) installed
- Database (e.g., MySQL, SQLite)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/myameen123/open-house-management.git
    ```

2. Navigate to the project directory:

    ```bash
    cd open-house-platform
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your database:

    ```bash
    cp .env.example .env
    ```

    Update the database configuration in the `.env` file.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. Serve the application:

    ```bash
    php artisan serve
    ```

    Access the application at `http://localhost:8000`.

## User Accounts

### Guests (Evaluators)

Evaluators need to create accounts and set their preferences:

1. Navigate to `http://localhost:8000/register`.
2. Choose the "Evaluator" role during registration.
3. Log in with the created account.
4. Set preferences, such as project categories and specialty areas.

### FYP Groups (Students)

FYP groups need to create accounts to manage their projects:

1. Navigate to `http://localhost:8000/register`.
2. Choose the "Student" role during registration.
3. Log in with the created account.
4. Manage project details, including assigning keywords.

### Admin Account

The admin account has the authority to set the physical location of each FYP project on the demonstration floor.

1. Navigate to `http://localhost:8000/register`.
2. Choose the "Admin" role during registration.
3. Log in with the created account.

## Project Assignment

Projects are randomly assigned to evaluators based on matching keywords and evaluator preferences. Each evaluator is assigned to evaluate between 3-5 projects.

1. The admin sets the physical location of each FYP project.

## Evaluation Process

Evaluators can:

1. Log in and view the location of their assigned project.
2. Rate each project on a scale of 1-10.
3. Evaluation results are visible only to the admin.

## Student Access

Students can:

1. View the number of evaluators who have assessed their project.
2. Access to individual evaluator scores is restricted.

## Bonus: Rubric-based Evaluation

The admin can define rubrics, and evaluators mark scores according to at least 3 metrics in the rubric.

## Technical Considerations

- Developed using Laravel on the server side.
- Laravel Passport for user authentication.
- MySQL database to securely store project details, evaluator preferences, and evaluation scores.
