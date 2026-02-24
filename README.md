# Task Manager Web App

A simple PHP & MySQL web application to manage tasks. Users can register, log in, add, update, and delete tasks. Each task tracks its status (Pending, In Progress, Done).  

## Features

- User registration and login  
- Add new tasks  
- Update task status  
- Delete tasks  
- Simple and clean interface  

## Tech Stack

- PHP  
- MySQL  
- HTML/CSS  

## Setup

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** & **MySQL**.  
2. Create a database named `task_manager_db` and import the tables:  

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('Pending', 'In Progress', 'Done') DEFAULT 'Pending',
    due_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);