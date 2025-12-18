# web-project-1

## Overview
This project is a web application that includes an index page, login page, and home page. It utilizes MongoDB for data management and provides a user-friendly interface.

## Prerequisites
- Node.js (version 14 or higher)
- MongoDB

## Project Structure
```
web-project-1
├── public
│   ├── css
│   │   └── styles.css
│   └── js
│       └── main.js
├── src
│   ├── index.html
│   ├── login.html
│   ├── home.html
│   ├── server.js
│   └── db
│       └── mongo.js
├── package.json
└── README.md
```

## Installation
1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```
   cd web-project-1
   ```
3. Install the dependencies:
   ```
   npm install
   ```

## Usage
1. Start the server:
   ```
   npm start
   ```
   For development with auto-restart:
   ```
   npm run dev
   ```
2. Open your browser and go to `http://localhost:3000` to access the application.

## Features
- User authentication through the login page.
- Dynamic content updates using JavaScript.
- MongoDB integration for data management using Mongoose.
- Built with Express.js for server-side routing and middleware.
- CORS enabled for cross-origin requests.
- Body-parser for handling JSON and URL-encoded data.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the ISC License.