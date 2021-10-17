/* source C:/wamp64/www/webapp/TruequesFCC/TRUEQUES_FCC.sql 

drop database if exists TRUEQUES_FCC;
create database TRUEQUES_FCC;
use TRUEQUES_FCC;*/

CREATE TABLE IF NOT EXISTS USERS (
    USER_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_USERNAME VARCHAR(64) NOT NULL,
    USER_PASSWORD VARCHAR(128) NOT NULL,
    USER_NAME VARCHAR(64) NOT NULL,
    USER_EMAIL VARCHAR(128) NOT NULL,
    USER_DIRECTION VARCHAR(256),
    USER_TYPE INT(1) NOT NULL DEFAULT 0,
    USER_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    USER_WISHLIST VARCHAR(256),

    UNIQUE (USER_USERNAME),
    UNIQUE (USER_EMAIL)
);

CREATE TABLE IF NOT EXISTS PRODUCTS (
    PRODUCT_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_ID INT NOT NULL,
    PRODUCT_NAME VARCHAR(128) NOT NULL,
    PRODUCT_DESCRIPTION VARCHAR(256) NOT NULL,
    PRODUCT_STATE INT NOT NULL,
    PRODUCT_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRODUCT_CHANGED_FOR_ID INT,

    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID),
    FOREIGN KEY (PRODUCT_CHANGED_FOR_ID) REFERENCES PRODUCTS(PRODUCT_ID)
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
    OFFER_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    OFFER_IS_OPEN BOOLEAN NOT NULL DEFAULT TRUE,

    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID),
    FOREIGN KEY (OFFER_PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

INSERT INTO USERS(USER_USERNAME, USER_PASSWORD, USER_NAME, USER_EMAIL, USER_TYPE) VALUES
    ("EsielAdmin", "123456", "Esiel K. Arizmendi Ramirez", "esiel@trueques.com", 1),
    ("MarcoCoria", "123456", "Marco A. Coria Rios", "marco_coria@hotmail.com", 0),
    ("Esiel15", "123456", "Esiel K. Arizmendi Ramirez", "esiel_kar@hotmail.com", 0);

INSERT INTO PRODUCTS(USER_ID, PRODUCT_NAME, PRODUCT_STATE, PRODUCT_DESCRIPTION) VALUES
    (3, "iPad Mini 4", 1, "Estetica 9.5, color dorado, chip Apple A8, camara de 8 MP"),
    (3, "iPhone 11", 1, "Estetica 10, color blanco, chip A13 Bionic, dos camaras de 12 MP"),
    (2, "Huawei MatePad 10.4", 1, "Estetica 10, color azul, chip Kirin 810, camara de 8 MP"),
    (2, "Huawei Matebook D16", 1, "Estetica 10, laptop de 16.1, AMD Ryzen 5 4600H, Memoria de 512GB ROM + 8GB RAM"),
    (3, "Macbook Pro", 1, "Estetica 10, 13 Pulgadas, 8 GB RAM, 128 GB SSD");

INSERT INTO OFFERS(PRODUCT_ID, OFFER_PRODUCT_ID) VALUES
    (1, 3);




