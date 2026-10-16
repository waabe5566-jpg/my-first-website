CREATE DATABASE IF NOT EXISTS school_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE school_management;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 username VARCHAR(50) UNIQUE NOT NULL,
 password VARCHAR(255) NOT NULL,
 role VARCHAR(30) DEFAULT 'admin',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(name,username,password,role) VALUES
('System Administrator','admin',MD5('admin123'),'admin');

CREATE TABLE classes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 class_name VARCHAR(100) NOT NULL,
 section VARCHAR(50),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id VARCHAR(30) UNIQUE NOT NULL,
 first_name VARCHAR(100) NOT NULL,
 last_name VARCHAR(100),
 gender VARCHAR(20),
 date_of_birth DATE,
 phone VARCHAR(30),
 parent_name VARCHAR(150),
 parent_phone VARCHAR(30),
 address VARCHAR(255),
 class_id INT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY(class_id) REFERENCES classes(id) ON DELETE SET NULL
);

CREATE TABLE teachers (
 id INT AUTO_INCREMENT PRIMARY KEY,
 teacher_id VARCHAR(30) UNIQUE NOT NULL,
 name VARCHAR(150) NOT NULL,
 phone VARCHAR(30),
 email VARCHAR(120),
 subject VARCHAR(100),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE subjects (
 id INT AUTO_INCREMENT PRIMARY KEY,
 subject_name VARCHAR(100) NOT NULL,
 subject_code VARCHAR(30),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE attendance (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 attendance_date DATE NOT NULL,
 status ENUM('Present','Absent','Late') DEFAULT 'Present',
 FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE
);

CREATE TABLE results (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 subject_id INT NOT NULL,
 exam_name VARCHAR(100),
 marks DECIMAL(5,2),
 grade VARCHAR(5),
 FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE,
 FOREIGN KEY(subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

CREATE TABLE fees (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 amount DECIMAL(10,2) NOT NULL,
 paid DECIMAL(10,2) DEFAULT 0,
 balance DECIMAL(10,2) DEFAULT 0,
 payment_date DATE,
 FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE
);

CREATE TABLE timetable (
 id INT AUTO_INCREMENT PRIMARY KEY,
 class_id INT,
 subject_id INT,
 day_name VARCHAR(20),
 start_time TIME,
 end_time TIME,
 FOREIGN KEY(class_id) REFERENCES classes(id) ON DELETE CASCADE,
 FOREIGN KEY(subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);
