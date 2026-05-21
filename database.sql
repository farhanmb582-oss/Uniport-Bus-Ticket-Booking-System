CREATE DATABASE IF NOT EXISTS uniport
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE uniport;

-- =========================
-- ADMIN TABLE
-- =========================

CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    role ENUM('Super Admin', 'Admin') DEFAULT 'Admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (full_name, username, password, email, role) VALUES
('System Administrator', 'admin', 'admin123', 'admin@uniport.com', 'Super Admin'),
('Counter Manager', 'counter', 'counter123', 'counter@uniport.com', 'Admin');

-- =========================
-- USERS TABLE
-- =========================

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES
('Farhan', 'farhan@gmail.com', '12345'),
('Student', 'student@gmail.com', '12345');

-- =========================
-- PASSENGERS TABLE
-- =========================

CREATE TABLE passengers (
    passenger_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') DEFAULT 'Male',
    phone VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100) UNIQUE,
    address VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO passengers (full_name, gender, phone, email, address) VALUES
('Rakib Hasan', 'Male', '01712345678', 'rakib@example.com', 'Mirpur, Dhaka'),
('Nusrat Jahan', 'Female', '01812345678', 'nusrat@example.com', 'Uttara, Dhaka'),
('Farhan Masrib', 'Male', '01512345678', 'farhan@example.com', 'Banani, Dhaka');

-- =========================
-- BUSES TABLE
-- =========================

CREATE TABLE buses (
    bus_id INT AUTO_INCREMENT PRIMARY KEY,
    bus_name VARCHAR(100) NOT NULL,
    bus_number VARCHAR(30) NOT NULL UNIQUE,
    company_name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    bus_type ENUM('AC', 'Non-AC') NOT NULL,
    facilities VARCHAR(255),
    status ENUM('Active', 'Inactive') DEFAULT 'Active'
);

INSERT INTO buses (bus_name, bus_number, company_name, capacity, bus_type, facilities, status) VALUES
('Uniport Express', 'UP-DHK-101', 'Uniport Travels', 40, 'AC', 'WiFi, Charging Port', 'Active'),
('City Cruiser', 'UP-DHK-102', 'City Line', 36, 'AC', 'Recliner Seat', 'Active'),
('SafeWay Transport', 'UP-DHK-103', 'SafeWay Paribahan', 45, 'Non-AC', 'Comfort Seat', 'Active');

-- =========================
-- ROUTES TABLE
-- =========================

CREATE TABLE routes (
    route_id INT AUTO_INCREMENT PRIMARY KEY,
    source_city VARCHAR(100) NOT NULL,
    destination_city VARCHAR(100) NOT NULL,
    distance_km INT NOT NULL,
    estimated_time VARCHAR(50),

    UNIQUE (source_city, destination_city)
);

INSERT INTO routes (source_city, destination_city, distance_km, estimated_time) VALUES
('Dhaka', 'Rangpur', 310, '7 Hours'),
('Dhaka', 'Sylhet', 240, '5 Hours'),
('Dhaka', 'Chittagong', 265, '6 Hours');

-- =========================
-- SCHEDULES TABLE
-- =========================

CREATE TABLE schedules (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    bus_id INT NOT NULL,
    route_id INT NOT NULL,
    travel_date DATE NOT NULL,
    departure_time TIME NOT NULL,
    arrival_time TIME NOT NULL,
    fare DECIMAL(10,2) NOT NULL,
    boarding_point VARCHAR(100) NOT NULL,
    dropping_point VARCHAR(100) NOT NULL,
    schedule_status ENUM('Available', 'Closed', 'Cancelled') DEFAULT 'Available',

    FOREIGN KEY (bus_id)
    REFERENCES buses(bus_id)
    ON UPDATE CASCADE,

    FOREIGN KEY (route_id)
    REFERENCES routes(route_id)
    ON UPDATE CASCADE
);

INSERT INTO schedules
(bus_id, route_id, travel_date, departure_time, arrival_time, fare, boarding_point, dropping_point, schedule_status)
VALUES

(1, 1, '2026-05-20', '08:00:00', '15:00:00', 750, 'Gabtoli Bus Terminal', 'Rangpur Terminal', 'Available'),

(2, 2, '2026-05-20', '09:30:00', '14:30:00', 700, 'Mohakhali Bus Terminal', 'Sylhet Terminal', 'Available'),

(3, 3, '2026-05-20', '11:00:00', '17:00:00', 650, 'Sayedabad Bus Terminal', 'Chittagong Terminal', 'Available');

-- =========================
-- BOOKINGS TABLE
-- =========================

CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,

    passenger_id INT NOT NULL,
    schedule_id INT NOT NULL,

    seat_number VARCHAR(10) NOT NULL,

    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP,

    total_fare DECIMAL(10,2) NOT NULL,

    payment_status ENUM('Unpaid', 'Paid') DEFAULT 'Unpaid',

    booking_status ENUM('Booked', 'Cancelled') DEFAULT 'Booked',

    active_seat VARCHAR(10) GENERATED ALWAYS AS (
        CASE
            WHEN booking_status = 'Booked'
            THEN seat_number
            ELSE NULL
        END
    ) STORED,

    FOREIGN KEY (passenger_id)
    REFERENCES passengers(passenger_id)
    ON UPDATE CASCADE,

    FOREIGN KEY (schedule_id)
    REFERENCES schedules(schedule_id)
    ON UPDATE CASCADE,

    UNIQUE KEY unique_booked_seat (schedule_id, active_seat)
);

INSERT INTO bookings
(passenger_id, schedule_id, seat_number, total_fare, payment_status, booking_status)
VALUES

(1, 1, 'A1', 750, 'Paid', 'Booked'),
(2, 1, 'A2', 750, 'Paid', 'Booked'),
(3, 2, 'B1', 700, 'Paid', 'Booked');

-- =========================
-- INDEXES
-- =========================

CREATE INDEX idx_route_source
ON routes(source_city);

CREATE INDEX idx_route_destination
ON routes(destination_city);