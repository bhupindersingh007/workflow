## Introduction
**WORKFLOW** - A Project Management SAAS application built with PHP, Laravel, Vite, Bootstrap & MySQL.


## Features

- User Authentication : User can register, login and logout.
- Projects : A user with a valid workflow account can create a number of projects with unlimited tasks in it.
- Tasks : A project owner/creator can assign tasks to team members to complete the given task.
- Comment System : Task assignee and assignor can communicate with each other by (2 way) task comment system.
- User Settings : A user can update the account information like name, email and password.
- Project Invitation : A project owner can invite other users to be a part of the project.
- Dashboard Widgets: Summary of important information at the user dashbaord's home.
- Notification System : Built-in notification system when the task is updated, on new comment, new team member invitation and when user accepts or rejects invitation.
- Search System : Users can search projects, tasks, team members, invitations.

## Showcase

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/52fea8bc-cbb1-4c1b-af1c-f4744659395a)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/139fc651-5e5f-4618-a899-050f350c1209)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/e91a048f-3dc5-4ecb-844f-956dca413b49)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/a188ff5c-de6b-448e-8c1f-036ecfd3bde3)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/f02bc498-0a60-44f1-9754-840bdb43f20c)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/75ba9497-081d-4edb-b87a-6a32a6e00b87)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/d3e18b84-9715-482d-a547-33caa9b7f114)

![image](https://github.com/bhupindersingh007/workflow/assets/63149405/0885e1bc-ffec-47e3-8039-8d6bbd1cbbe0)

         
## Installation

**Requirements**: PHP 8.1, Composer, RDBMS (such as MySQL, MariaDB, PostgreSQL, etc.)

**Installation Steps:**

1. Clone the repository ```git clone https://github.com/bhupindersingh007/workflow.git``` or download zip.
2. Open the directory ```workflow``` in the terminal.
3. Install composer dependencies ```composer install```.
4. Make a new ```.env``` file and copy ```.env.example``` file to ```.env```.
5. Set the database configuration in the ``.env`` like ```DB_DATABASE, DB_USERNAME and DB_PASSWORD```.
7. Generate key: ```php artisan key:generate```.
9. Run the application: ```php artisan serve```.



## Technology Stack 

- [PHP 8.1](https://www.php.net/) - A popular general-purpose scripting language for web development.
- [Laravel 10](https://laravel.com/docs/10.x) - PHP fullstack web application framework.
- [Sanctum 3.2](https://laravel.com/docs/10.x/sanctum) - featherweight token based authentication system for SPAs.
- [MySQL 8.0](https://dev.mysql.com/doc/relnotes/mysql/8.0/en/) - The world's most popular open source relational database.
- [Feather Icons](https://feathericons.com) - Simply beautiful open source SVG icons.

