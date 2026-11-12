-- =====================================================
-- School Website database
-- Import this file in phpMyAdmin (Import tab).
-- It creates the database, the tables and sample data.
-- =====================================================

CREATE DATABASE IF NOT EXISTS school_website
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE school_website;

-- -----------------------------------------------------
-- 1. Admins (people who can log in to /admin)
-- Default login: admin / admin123  (change it later!)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$tI5N7xLS1xijVPA1J3xQsuDM5hxHzIT92/p74TOd8W4mJFD1EUUaW');

-- -----------------------------------------------------
-- 2. Admission applications (from the Admissions form)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS admissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(100) NOT NULL,
  date_of_birth DATE NOT NULL,
  grade VARCHAR(20) NOT NULL,
  parent_name VARCHAR(100) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  email VARCHAR(100) NOT NULL,
  address VARCHAR(255) DEFAULT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'New',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- 3. Contact messages (from the Contact form)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  subject VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------------
-- 4. News and events (added by admin)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS news (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  category VARCHAR(30) NOT NULL DEFAULT 'News',
  summary VARCHAR(255) NOT NULL,
  body TEXT NOT NULL,
  event_date DATE NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO news (title, category, summary, body, event_date) VALUES
('Annual Sports Day 2026', 'Event',
 'Races, team games and a prize ceremony for all classes.',
 'Our Annual Sports Day will be held on the main ground. Students from every class will take part in races, relay, tug of war and football. Parents are welcome to join us and cheer for the teams. The prize ceremony starts at 12:00 PM.',
 '2026-12-05'),
('Science Fair Winners', 'News',
 'Grade 8 students won first prize at the city science fair.',
 'We are proud to share that our Grade 8 team won first prize at the City Science Fair with their solar water purifier project. Well done to the students and their science teacher!',
 '2026-11-08'),
('Admissions Open for 2027', 'Admissions',
 'Applications for Playgroup to Grade 10 are now open.',
 'Admissions for the new academic year are now open for Playgroup to Grade 10. Apply online using the Admissions page or visit the school office from 8:00 AM to 2:00 PM, Monday to Friday.',
 '2026-11-01'),
('Parent Teacher Meeting', 'Event',
 'Meet the class teachers to discuss term results.',
 'The Parent Teacher Meeting for the first term will be held in all classrooms. Please bring the student diary. Timings: 9:00 AM to 12:30 PM.',
 '2026-11-20');

-- -----------------------------------------------------
-- 5. Teachers (shown on the Teachers page)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS teachers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  subject VARCHAR(100) NOT NULL,
  qualification VARCHAR(100) NOT NULL,
  experience_years INT NOT NULL DEFAULT 0
);

INSERT INTO teachers (name, subject, qualification, experience_years) VALUES
('Ayesha Malik', 'Principal', 'M.Phil Education', 18),
('Imran Qureshi', 'Mathematics', 'M.Sc Mathematics', 12),
('Sana Iqbal', 'English', 'M.A English', 9),
('Bilal Ahmed', 'Physics', 'M.Sc Physics', 8),
('Hina Raza', 'Biology', 'M.Sc Botany', 7),
('Usman Tariq', 'Computer Science', 'BS Computer Science', 6),
('Fatima Noor', 'Urdu', 'M.A Urdu', 10),
('Ali Hassan', 'Sports', 'B.Sc Physical Education', 5);
