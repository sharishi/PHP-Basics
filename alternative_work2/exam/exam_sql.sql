create database Orders;

CREATE TABLE client (
                           id_client SERIAL PRIMARY KEY,
                           client_surname VARCHAR(30) NOT NULL,
                           client_firstname VARCHAR(30) NOT NULL,
                           client_address VARCHAR(30) NOT NULL,
                           postal_code VARCHAR(30) NOT NULL,
                           phone_number VARCHAR(20),
                           email VARCHAR(30)
);
