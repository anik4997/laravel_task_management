# laravel_task_management

## Description

This is a simple Task Management application built with Laravel. The application allows users to create, edit, mark as complete, and delete tasks. It features separate tables for incomplete and completed tasks, and tasks are timestamped with their creation and last update times.

## Features

- Create, show, edit, and delete tasks
- Create task by title (required field) and description(optional field)
- Mark tasks as complete or incomplete
- Separate tables for incomplete and completed tasks
- Timestamped records (created at and updated at)

## Technologies Used

- Laravel 11.7.0
- PHP 8.2.4
- Bootstrap 4
- SQLite (for local development)

## Setup Instructions

### Prerequisites

- PHP >= 7.3
- Composer
- Git

### Steps to Set Up the Development Environment

1. **Clone the Repository**

    ```bash
    git clone https://github.com/your-username/laravel_task_management.git
    cd laravel_task_management
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Set Up Environment Variables**

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file to use SQLite for local development. Update the following lines:

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/full/path/to/your/database.sqlite
    ```

    Create the SQLite database file:

    ```bash
    touch /full/path/to/your/database.sqlite
    ```
    For mysql (Project can also be run in mysql):
   
        # DB_CONNECTION=mysql
        # DB_HOST=127.0.0.1
        # DB_PORT=3306
        # DB_DATABASE=to_do_app
        # DB_USERNAME=root
        # DB_PASSWORD=

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Run Migrations**

    ```bash
    php artisan migrate
    ```

7. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## Usage Instructions

1. **Create a Task**

    Navigate to `http://127.0.0.1:8000/` and fill out the form to create a new task by filling title (required) and description (optional) input.

2. **View Tasks**

    Navigate to `http://127.0.0.1:8000/view` to view all tasks. Incomplete tasks will be listed first, followed by completed tasks.

3. **Edit a Task**

    Click the "Edit" button which is in tasks table action field next to a task to update its details.

4. **Mark a Task as Complete**

    Click the "Complete" button next to an incomplete task to mark it as complete. This will move the task to the completed tasks table and same for the completed tasks to mark as incomplete.

5. **Delete a Task**

    Click the "Delete" button next to a task to remove it from the list.

## Contributing

We welcome contributions! Please fork the repository and submit pull requests for any enhancements or bug fixes.

## License

This project is open-source and available.

## Contact

For any questions or feedback, please contact [oliahammed65@gmail.com](mailto:oliahammed65@gmail.com).
