# Spatie Permission & Roles Basics

This project provides a basic setup for using Spatie's Laravel Permissions and Roles package.

## Getting Started

Before running the project, make sure to run the following command to set up the database tables with sample data:

```bash
php artisan migrate:fresh --seed
```
This will create some sample users with different roles and permissions.

Users with Roles and Permissions
Here are the email addresses and passwords for the sample users along with their corresponding roles and permissions:

Admin User:
Email: admin@example.com
Password: password
Role: admin
Permissions: write post, publish post, edit post
Writer User:
Email: writer@example.com
Password: password
Role: writer
Permissions: write post, publish post
Editor User:
Email: editor@example.com
Password: password
Role: editor
Permissions: edit post
Publisher User:
Email: user@example.com
Password: password
Role: publisher
Permissions: publish post
Feel free to log in with any of these users to explore the application
