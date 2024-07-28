

# WeBuild: Constructing Dreams, Building Futures

**WeBuild** is a pioneering web-based platform designed to revolutionize the construction industry by providing a seamless experience for both clients and administrators. The platform simplifies the construction process, streamlines communication, enhances transparency, and optimizes project management to deliver high-quality results while prioritizing customer satisfaction and operational efficiency.

## Features

### User Module
- **Home Page:** Central hub with blogs, FAQs, and previews of services and projects.
- **About Us:** Insights into the company's background, mission, and team members.
- **Services:** Showcases a wide range of construction services.
- **Projects:** Highlights completed endeavors, showcasing the company's expertise.
- **Contact Us:** Facilitates seamless communication between clients and the company.

### Admin Module
- **Login:** Secure access for administrators with unique credentials.
- **Dashboard:** Centralized hub with key metrics, analytics, and task management features.
- **Bookings:** Efficient management of client bookings with PDF printing capabilities.
- **Employee Details:** Management of employee information, updates, and schedules.

## Technical Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (Database Name: `db_webuild`)
- **Server:** Apache HTTP Server

## Additional Tools

- **TCPDF:** For generating PDF documents.

## Future Enhancements

- **Interactive Features:** Implementation of 3D models, virtual tours, and project videos for better visualization and decision-making.
- **Expansion of Services:** Adding new construction services and reaching new markets.
- **Seamless Messaging:** Integrated messaging system for smooth communication between clients, administrators, and employees.

## Installation

1. **Clone the Repository:**
   ```sh
   git clone https://github.com/kumar-rakshith/WeBuild.git
   cd webuild
   ```

2. **Set Up the Environment:**
   - Ensure you have [XAMPP](https://www.apachefriends.org/index.html) installed, which includes Apache, MySQL, and PHP.
   - Start Apache and MySQL from the XAMPP control panel.

3. **Database Configuration:**
   - Import the database `db_webuild`:
     ```sh
     mysql -u root -p < path_to_db_webuild.sql
     ```
   - Alternatively, use PHPMyAdmin to import the SQL file.

4. **Configure the Project:**
   - Place the project folder in the `htdocs` directory of your XAMPP installation.
   - Update database credentials in the `config.php` file:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_DATABASE', 'db_webuild');
     ```

5. **Run the Project:**
   - Open your web browser and navigate to `http://localhost/webuild`.

## Contribution

We welcome contributions from the community! Follow these steps to contribute:

1. **Fork the Repository:**
   - Click the "Fork" button at the top right corner of this repository's page.

2. **Clone Your Fork:**
   ```sh
   git clone https://github.com/yourusername/webuild.git
   cd webuild
   ```

3. **Create a Branch:**
   ```sh
   git checkout -b feature/your-feature-name
   ```

4. **Make Your Changes:**
   - Implement your feature or fix a bug.
   - Ensure your code adheres to the project's coding standards.

5. **Commit Your Changes:**
   ```sh
   git add .
   git commit -m "Add your commit message"
   ```

6. **Push to Your Fork:**
   ```sh
   git push origin feature/your-feature-name
   ```

7. **Create a Pull Request:**
   - Go to the original repository on GitHub.
   - Click the "New Pull Request" button.
   - Select your branch from the dropdown and submit your pull request.
