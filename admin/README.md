```markdown
 📰 CMS-System-PHP — Simple Blog & Admin Dashboard

A lightweight Content Management System (CMS) built with PHP and MySQL, designed for managing blog posts through a clean and responsive admin dashboard.  
This project demonstrates core CRUD operations (Create, Read, Update, Delete) and basic authentication (login/logout) functionality.



 🚀 Features
- User Authentication — Secure login and logout system for admin users.
- Admin Dashboard — Manage posts easily with options to view, edit, and delete.
- Post Management — Create, update, and remove articles dynamically.
- Responsive Design — Clean layout using HTML and CSS.
- Database Integration — MySQL used for storing posts and user credentials.
- GitHub Version Control — Organized commits and folder structure for collaboration.


```
```markdown

🧱 Project Structure

CMS-System-php/
│
├── admin/
│   ├── connect.php          # Database connection
│   ├── create.php           # Add new post
│   ├── delete.php           # Delete post
│   ├── edit.php             # Edit existing post
│   ├── index.php            # Admin dashboard
│   ├── index1.php           # Public blog view
│   ├── login.php            # Admin login page
│   ├── logout.php           # Logout functionality
│   ├── view.php             # View single post (admin)
│   ├── templates/
│   │   ├── header.php       # Common header
│   │   ├── footer.php       # Common footer
│   │   └── process.php      # Form processing logic
│   └── README.md
│
└── database/
    └── books_db.sql         # Example database schema
```



 ⚙️ Installation & Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/Sohrab-Malikzada/CMS-System-php.git
   ```
2. Move files to your XAMPP `htdocs` directory:
   ```
   C:\xampp\htdocs\CMS-System-php
   ```
3. Create a MySQL database:
   ```sql
   CREATE DATABASE cms_db;
   ```
4. Import the SQL file (if provided) or create a table manually:
   ```sql
   CREATE TABLE posts (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       summary TEXT NOT NULL,
       content TEXT NOT NULL,
       date DATE NOT NULL
   );
   ```
5. Configure database connection in `connect.php`:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "cms_db");
   ```
6. Run the project:
   ```
   http://localhost/CMS-System-php/admin/login.php
   ```


```markdown

 🖥️ Screenshots

- Login Page
- Dashboard
- Post Editor
- Public Blog View
- GitHub Repository Structure

```

```markdown

 🧠 Technologies Used
 
| Technology | Purpose |
|-------------|----------|
| PHP | Backend scripting |
| MySQL | Data storage |
| HTML/CSS | Frontend design |
| XAMPP | Local server environment |
| Git & GitHub | Version control and collaboration |

```

```markdown
 🧩 Future Improvements
 
- Add user roles (admin/editor).
- Implement search and pagination for posts.
- Add image upload for articles.
- Improve security with password hashing and validation.

```


 🤝 Contributing
 
Contributions are welcome!  
To contribute:
1. Fork the repository.
2. Create a new branch for your feature.
3. Commit your changes.
4. Submit a pull request.



 📜 License
This project is licensed under the MIT License — free to use, modify, and distribute.



 👨‍💻 Author
Sohrab Malikzada </br>
GitHub: Sohrab-Malikzada



 🌐 Live Demo (Local)
Run locally via XAMPP:  
```
http://localhost/Basic-CMS/admin/index1.php
```
