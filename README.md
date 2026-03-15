# MIT App Inventor CRUD App with PHP & MySQL

A full-stack, low-code Android application built using MIT App Inventor, featuring a custom PHP backend and a secure MySQL database hosted on DigitalOcean. This project demonstrates how to connect a block-based mobile frontend to a custom cloud server to perform basic Create and Read operations, along with secure user authentication.

## 🚀 Features
* **User Authentication:** Secure login system checking credentials against a cloud database.
* **Data Entry (Create):** A form to capture user information (Name, Age, Gender, Email, Contact Number) and push it to the server.
* **Data Retrieval (Read):** Dynamically fetches and parses JSON data from the server to display a list of all submitted records.
* **Cloud Infrastructure:** Backend APIs are written in PHP and hosted on a DigitalOcean Droplet, connecting securely via SSL to a DigitalOcean Managed MySQL Database.

## 🛠️ Tech Stack
* **Frontend:** MIT App Inventor (Low-code Android development)
* **Backend:** PHP 
* **Database:** MySQL (DigitalOcean Managed Database)
* **Hosting:** DigitalOcean Droplet (Apache server)

## 📸 App Screenshots

### 1. Login Page
This screen handles user authentication by sending the entered email and password to the PHP backend for verification.

| Designer View (UI) | Blocks View (Logic) |
| :---: | :---: |
| ![Login Designer](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/LoginPage%20Designer%20MIT%20App%20Inventor.PNG) | ![Login Blocks](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/LoginPage%20Blocks%20MIT%20App%20Inventor.PNG) |

### 2. Home Page (Data Entry)
Once logged in, users can fill out this form to submit new records to the database.

| Designer View (UI) | Blocks View (Logic) |
| :---: | :---: |
| ![Home Designer](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/Home%20Form%20Designer%20MIT%20App%20Inventor.PNG) | ![Home Blocks](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/Home%20Form%20Blocks%20MIT%20App%20Inventor.PNG) |

### 3. View Data Page
This screen fetches all submitted user data from the database and displays it in a readable list format.

| Designer View (UI) | Blocks View (Logic) |
| :---: | :---: |
| ![View Data Designer](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/View%20Data%20Designer%20MIT%20App%20Inventor.PNG) | ![View Data Blocks](https://github.com/Sneha-2110/crudApp/blob/f83cc239f5ee4f38ab31d62c61a9dc91cc97af4d/View%20Data%20Blocks%20MIT%20App%20Inventor.PNG) |

## ⚙️ Backend API Endpoints

The app communicates with the server using standard HTTP requests via MIT App Inventor's `Web` component.

* **`login.php` (POST)** * **Description:** Verifies user credentials against the `admin` table.
  * **Parameters:** `email`, `password`
  * **Responses:** "Login Success", "Wrong Password", "User Not Found", "Missing Data"

* **`save.php` (POST)**
  * **Description:** Inserts a new user record into the `userdata` table. Automatically creates the table if it doesn't exist.
  * **Parameters:** `name`, `age`, `gender`, `email`, `contact_number`
  * **Responses:** "Success", "Error: [Details]"

* **`view_all_data.php` (GET)**
  * **Description:** Fetches all records from the `userdata` table.
  * **Responses:** Returns a JSON array of all database rows ordered by ID descending.

## 💻 Setup & Installation

### 1. Database Setup
1. Set up a MySQL database.
2. Download your SSL certificate (`ca-certificate.crt`) to secure the connection.
3. Manually create an `admin` table with `email` and `password` columns and insert at least one user for the login page to function.

### 2. Server Setup (PHP)
1. Provision a server (e.g., DigitalOcean Droplet) with PHP and Apache/Nginx installed.
2. Upload `login.php`, `save.php`, and `view_all_data.php` to your web root (e.g., `/var/www/html/`).
3. Upload the `ca-certificate.crt` to the server and ensure the path in the PHP files correctly points to it.
4. Update the database connection variables (`$host`, `$user`, `$pass`, `$db`, `$port`) in all three PHP files with your specific credentials.

### 3. App Inventor Setup
1. Import the project `.aia` file into [MIT App Inventor](https://appinventor.mit.edu/).
2. Open the Blocks editor for `LoginPage`, `Screen1`, and `Screen2`.
3. Locate the URL blocks and change the hardcoded IP address (`http://167.71.152.51/...`) to match your actual server's IP address or domain name.
4. Build the APK and install it on your Android device!
