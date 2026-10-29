# Reading List App

A simple Laravel application to manage books you want to read, are currently reading, or have finished. You can add, edit, delete, and filter books by their reading status.

## Features

- View all books in your reading list.
- Add books with a title, author, and status.
- Edit book details.
- Delete books with confirmation.
- Filter books by reading status.
- Validate form inputs.

## Requirements

- PHP
- Composer
- Laravel
- SQLite

## How to Run the App

1. Clone the repository:

   ```bash
   git clone https://github.com/25yelmulesd-beep/reading-list.git
   cd reading-list
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Create the environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows PowerShell, use `Copy-Item .env.example .env` instead.

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Create the SQLite database file if it does not exist:

   ```bash
   ```

   On Windows PowerShell, run `New-Item -ItemType File -Force database/database.sqlite`.

6. Run database migrations:

   ```bash
   php artisan migrate
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Open http://127.0.0.1:8000 in your browser.

## AI Usage

I used ChatGPT to help understand Laravel commands, resource routes, Git and GitHub setup, troubleshoot project structure issues, and prepare the README. I reviewed the instructions and tested the application locally.

## Technologies Used

- Laravel and PHP
- SQLite
- Blade templates
- Git and GitHub
