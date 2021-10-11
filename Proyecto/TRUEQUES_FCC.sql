/* source C:/wamp64/www/webapp/proyecto/TRUEQUES_FCC.sql */

drop database if exists TRUEQUES_FCC;
create database TRUEQUES_FCC;
use TRUEQUES_FCC;

CREATE TABLE IF NOT EXISTS USERS (
    USER_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_USERNAME VARCHAR(64) NOT NULL,
    USER_PASSWORD VARCHAR(128) NOT NULL,
    USER_NAME VARCHAR(64) NOT NULL,
    USER_EMAIL VARCHAR(128) NOT NULL,
    USER_TYPE INT(1) NOT NULL DEFAULT 0,
    USER_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    WISHLIST VARCHAR(256) NOT NULL,

    UNIQUE (USER_USERNAME),
    UNIQUE (USER_EMAIL)
);

CREATE TABLE IF NOT EXISTS PRODUCTS (
    PRODUCT_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_ID INT NOT NULL,
    PRODUCT_NAME VARCHAR(128) NOT NULL,
    PRODCUT_DESCRIPTION VARCHAR(256) NOT NULL,
    PRODUCT_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID)
);

CREATE TABLE IF NOT EXISTS IMAGES (
    IMAGE_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PRODUCT_ID INT NOT NULL,
    IMAGE_ROUTE VARCHAR(256) NOT NULL,

    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

CREATE TABLE IF NOT EXISTS OFFERS (
    OFFER_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PRODUCT_ID INT NOT NULL,
    OFFER_PRODUCT_ID INT NOT NULL,

    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID),
    FOREIGN KEY (OFFER_PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

INSERT INTO USERS(USER_USERNAME, USER_PASSWORD, USER_NAME, USER_EMAIL, USER_TYPE) VALUES
    ("MarcoCoria", "123456", "Marco A. Coria Rios", "marco_coria@hotmail.com", 0),
    ("Esiel15", "123456", "Esiel K. Arizmendi Ramirez", "esiel_kar@hotmail.com", 1);




