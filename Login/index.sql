CREATE DATABASE milestone;

CREATE TABLE IF NOT EXISTS data_signup (
  fullname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS data_login (
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);