# The Grand Oasis Resort

## Project Overview
The Grand Oasis Resort is a web application designed to provide users with information about the resort, including room bookings, amenities, and contact information. The application utilizes MongoDB for data management and features a user-friendly interface.

## Project Structure
```
grand-oasis-resort
├── public
│   ├── index.php          # Main entry point for the web application
│   ├── login.php          # User login page
│   ├── home.php           # Home page showcasing resort features
│   └── assets
│       ├── css
│       │   └── style.css  # CSS styles for the application
│       └── js
│           └── main.js    # JavaScript for client-side functionality
├── src
│   ├── db
│   │   └── mongodb.php     # MongoDB connection handling
│   ├── controllers
│   │   ├── AuthController.php  # Manages user authentication
│   │   └── HomeController.php  # Handles home page requests
│   ├── models
│   │   └── User.php        # User model for database operations
│   └── views
│       ├── header.php      # Header section markup
│       ├── footer.php      # Footer section markup
│       └── navbar.php      # Navigation bar markup
├── composer.json           # Composer configuration file
└── README.md               # Project documentation
```

## Setup Instructions
1. **Clone the Repository**
   ```
   git clone <repository-url>
   cd grand-oasis-resort
   ```

2. **Install Dependencies**
   Ensure you have Composer installed, then run:
   ```
   composer install
   ```

3. **Configure MongoDB**
   Update the MongoDB connection settings in `src/db/mongodb.php` to match your database configuration.

4. **Run the Application**
   You can use a local server like XAMPP or MAMP to serve the `public` directory. Access the application via `http://localhost/grand-oasis-resort/public/index.php`.

## Usage
- **Home Page**: Access the home page to view resort features and amenities.
- **Login Page**: Use the login page to authenticate users.
- **Room Booking**: Users can explore room options and make bookings through the home page.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.