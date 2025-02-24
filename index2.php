<?php
// Database credentials
$host = 'mysql-55d5062-adityabhise1111-edc7.h.aivencloud.com';
$username = 'avnadmin';
$password = 'AVNS_FLZ6O_Tg7DtORc8cEcl';
$dbname = 'defaultdb';
$port = 19742;
//$ssl_mode = MYSQLI_CLIENT_SSL;

// Connection string
$mysqli = new mysqli($host, $username, $password, $dbname, $port);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// SQL query to create the tables and insert data
$sql = "
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `leaderboard`
-- --------------------------------------------------------

-- Table structure for table `events`
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `events`
INSERT INTO `events` (`id`, `student_id`, `score`, `date`) VALUES
(1, 1, 100, '2025-02-10'),
(2, 4, 200, '2025-02-20'),
(3, 4, 200, '2025-02-20'),
(4, 6, 500, '2025-02-10'),
(5, 5, 900, '2025-02-10'),
(6, 5, 400, '2025-02-20'),
(7, 6, 950, '2025-02-20'),
(8, 6, 950, '2025-02-20'),
(9, 7, 500, '2025-02-10'),
(10, 7, 1000, '2025-02-20');

-- Table structure for table `students`
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `students`
INSERT INTO `students` (`id`, `name`, `phone`, `email`, `password`, `profile_img`) VALUES
(1, 'manish', '9876543210', 'a@a.h', '$2y$10$dhosKKDpAmDv5upFD0ZQ8u0xe0ekTTms1CAhd0/DlXdpANjjFO2vu', ''),
(3, 'aa', '666455', 'a@gmail.com', '$2y$10$czYvKwnv1Tpxa/D3v7Xw1OxQ1qpYtIoOSCNt4xm628mcIcqy73Fha', 'WIN_20240327_12_22_20_Pro.jpg'),
(4, 'aditya', '8888888', 'aditya@gmail.com', '$2y$10$/XKUEcRWstLBsPUya2MEUuS3mtWmbmYMy/QVmWxeLg29zG1zRc7Ke', 'WIN_20240327_12_22_20_Pro.jpg'),
(5, 'KAPIL KOR', '6544465456', 'KAPIL@G.COM', '$2y$10$cCaK3MgwOSWSXTSjdV9dqeEvSMtjvVfhDkAIB.gMPvFIseA7RWVlq', 'WhatsApp Image 2025-02-12 at 22.15.36_d829c480.jpg'),
(6, 'ANIKET ADHAV', '4569874589', 'ANIKET@G.COM', '$2y$10$OcwPcybcBbBCSQe4HwQfCeKy7Qc1R0AXi4gieNab10Bb25gz/TMti', 'WhatsApp Image 2025-02-22 at 23.05.20_a67b26e8.jpg'),
(7, 'VYOM', '8237172304', 'VYOMPATIL@GMAIL.COMM', '$2y$10$xqjBgq5FSD07EQFZOT85je8BWHA8QPP2UxxyALBOvOasMIom3bSd2', 'group hoto.jpg');

-- Indexes for table `events`
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student` (`student_id`);

-- Indexes for table `students`
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

-- AUTO_INCREMENT for dumped tables
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- Constraints for table `events`
ALTER TABLE `events`
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

COMMIT;
";

// Execute the SQL query
if ($mysqli->multi_query($sql)) {
    echo "Database and tables created successfully.";
} else {
    echo "Error: " . $mysqli->error;
}

// Close the connection
$mysqli->close();
?>
