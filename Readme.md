# Contact Management System

This project is a simple PHP-based contact management system that allows users to manage their contact details efficiently. Users can add contact information, including a profile image, which is stored securely. The contact data is saved in a `contacts.json` file, while uploaded images are stored in the `uploads/` directory for easy access and organization.

## Features
- Add a contact with the following details:
  - Name
  - Email
  - Phone
  - Profile Image
- Store contact details in a `contacts.json` file.
- Save uploaded images in the `uploads/` directory.

## Requirements
- PHP 7.4 or higher
- A web server (e.g., Apache, Nginx)
- Write permissions for the `uploads/` directory and `contacts.json` file.

## Installation
1. Clone the repository or download the project files.
2. Ensure the `uploads/` directory exists and has write permissions:
   ```bash
   mkdir uploads
   chmod 777 uploads