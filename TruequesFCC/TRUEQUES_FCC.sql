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

    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID),
    FOREIGN KEY (PRODUCT_CHANGED_FOR_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

CREATE TABLE IF NOT EXISTS IMAGES (
    IMAGE_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PRODUCT_ID INT NOT NULL,
    IMAGE_ROUTE VARCHAR(256) NOT NULL,
    IMAGE_IS_MAIN BOOLEAN NOT NULL DEFAULT FALSE,

    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

CREATE TABLE IF NOT EXISTS OFFERS (
    OFFER_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PRODUCT_ID INT NOT NULL,
    STATE_ID INT NOT NULL DEFAULT 1,
    OFFER_PRODUCT_ID INT NOT NULL,
    OFFER_DATE DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (STATE_ID) REFERENCES STATE(STATE_ID),
    FOREIGN KEY (PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID),
    FOREIGN KEY (OFFER_PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID)
);

INSERT INTO USERS(USER_USERNAME, USER_PASSWORD, USER_NAME, USER_EMAIL, USER_DIRECTION, USER_TYPE) VALUES
    ("EsielAdmin", "123456", "Esiel K. Arizmendi Ramirez", "esiel@trueques.com", null, 1),
    ("MarcoCoria", "123456", "Marco A. Coria Rios", "marco_coria@hotmail.com", "Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue.", 0),
    ("Esiel15", "123456", "Esiel K. Arizmendi Ramirez", "esiel_kar@hotmail.com","Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue.", 0);

INSERT INTO PRODUCTS(USER_ID, PRODUCT_NAME, PRODUCT_STATE, PRODUCT_DESCRIPTION) VALUES
    (3, "iPad Mini 4", 1, "Estetica 9.5, color dorado, chip Apple A8, camara de 8 MP"),
    (3, "iPhone 11", 1, "Estetica 10, color blanco, chip A13 Bionic, dos camaras de 12 MP"),
    (2, "Huawei MatePad 10.4", 1, "Estetica 10, color azul, chip Kirin 810, camara de 8 MP"),
    (2, "Huawei Matebook D16", 1, "Estetica 10, laptop de 16.1, AMD Ryzen 5 4600H, Memoria de 512GB ROM + 8GB RAM"),
    (3, "Macbook Pro", 1, "Estetica 10, 13 Pulgadas, 8 GB RAM, 128 GB SSD");

INSERT INTO OFFERS(PRODUCT_ID, OFFER_PRODUCT_ID) VALUES
    (1, 3);

INSERT INTO IMAGES(PRODUCT_ID, IMAGE_ROUTE, IMAGE_IS_MAIN) VALUES
    (1, "1-1.jpg", TRUE),
    (2, "2-1.jfif", TRUE),
    (3, "3-1.jpg", TRUE),
    (4, "4-1.jpg", TRUE),
    (5, "5-1.jpg", TRUE);

CREATE TABLE IF NOT EXISTS CATEGORIES (
    CATEGORY_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CATEGORY_NAME VARCHAR(128) NOT NULL
);

CREATE TABLE IF NOT EXISTS STATE (
    STATE_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    STATE_NAME VARCHAR(128) NOT NULL
);

INSERT INTO STATE(STATE_NAME) VALUES
    ("ABIERTA"),
    ("CERRADA"),
    ("EN PROCESO"),
    ("RECHAZADA"),
    ("CONCLUIDA");

INSERT INTO CATEGORIES(CATEGORY_NAME) VALUES
    ("Ropa"),
    ("Zapatos"),
    ("Accesorios"),
    ("Belleza"),
    ("Relojes, Lentes, Joyeria"),
    ("Deportes"),
    ("Electr??nica"),
    ("Celulares"),
    ("Videojuegos"),
    ("Juguetes"),
    ("Linea Blanca"),
    ("Muebles"),
    ("Cocina"),
    ("Vinos y Gourmet"),
    ("Viajes"),
    ("Mascotas"),
    ("Ferreteria"),
    ("Otra categoria");

ALTER TABLE PRODUCTS ADD CATEGORY_ID INT NOT NULL;
ALTER TABLE PRODUCTS ADD CONSTRAINT FK_CATEGORY FOREIGN KEY (CATEGORY_ID) REFERENCES CATEGORIES(CATEGORY_ID);
ALTER TABLE PRODUCTS ADD IS_DELETED BOOLEAN NOT NULL DEFAULT 0;
ALTER TABLE IMAGES ADD CONSTRAINT UNI_IMG UNIQUE KEY(PRODUCT_ID, IMAGE_ROUTE, IMAGE_IS_MAIN);

ALTER TABLE OFFERS ADD CONSTRAINT UNI_OFFER_IMG UNIQUE KEY(PRODUCT_ID, OFFER_PRODUCT_ID);
ALTER TABLE OFFERS ADD IS_HIDDEN BOOLEAN NOT NULL DEFAULT FALSE;
ALTER TABLE PRODUCTS ADD IS_CHANGED BOOLEAN NOT NULL DEFAULT FALSE;


delimiter //
CREATE TRIGGER AFTER_DELETE_PRODUCT
AFTER DELETE 
ON PRODUCTS FOR EACH ROW
BEGIN
    DELETE FROM IMAGES WHERE PRODUCT_ID = OLD.PRODUCT_ID;
END//
delimiter ;

delimiter //
CREATE TRIGGER AFTER_UPDATE_OFFER
AFTER UPDATE 
ON OFFERS FOR EACH ROW
BEGIN
    IF NEW.STATE_ID = 5 THEN
        UPDATE PRODUCTS SET IS_CHANGED = TRUE 
        WHERE PRODUCTS.PRODUCT_ID = NEW.OFFER_PRODUCT_ID;

        UPDATE PRODUCTS SET IS_CHANGED = TRUE 
        WHERE PRODUCTS.PRODUCT_ID = NEW.PRODUCT_ID;
    END IF; 
END//
delimiter ;

delimiter //
    CREATE PROCEDURE closeOffersOf(IN P_PRODUCT_ID INTEGER)
        BEGIN
            UPDATE OFFERS SET STATE_ID = 2
            WHERE PRODUCT_ID = P_PRODUCT_ID AND STATE_ID <> 5 AND STATE_ID <> 4;
        END//
delimiter ;

delimiter //
    CREATE PROCEDURE declineOffersOf(IN P_PRODUCT_ID INTEGER)
        BEGIN
            UPDATE OFFERS SET STATE_ID = 4
            WHERE OFFER_PRODUCT_ID = P_PRODUCT_ID AND STATE_ID <> 5;
        END//
delimiter ;

delimiter //
CREATE PROCEDURE insertProductAndImage(
    IN P_USER_ID INTEGER,
    IN P_PRODUCT_NAME VARCHAR(128),
    IN P_PRODUCT_DESCRIPTION VARCHAR(256),
    IN P_PRODUCT_STATE INTEGER,
    IN P_PRODUCT_CATEGORY INTEGER,
    IN P_IMAGE_EXT VARCHAR(10))

    BEGIN
        INSERT INTO PRODUCTS (USER_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_STATE, CATEGORY_ID) 
            VALUE (P_USER_ID, P_PRODUCT_NAME, P_PRODUCT_DESCRIPTION, P_PRODUCT_STATE, P_PRODUCT_CATEGORY);

        SELECT PRODUCT_ID INTO @VAR_PRODUCT_ID FROM PRODUCTS 
            WHERE USER_ID = P_USER_ID
            ORDER BY PRODUCT_DATE DESC LIMIT 1;
        
        INSERT INTO IMAGES (PRODUCT_ID, IMAGE_ROUTE, IMAGE_IS_MAIN) 
            VALUE (@VAR_PRODUCT_ID, CONCAT(CAST(@VAR_PRODUCT_ID AS CHAR CHARACTER SET utf8), '-1.', P_IMAGE_EXT), 1);

        SELECT PRODUCT_ID, IMAGE_ROUTE FROM IMAGES WHERE PRODUCT_ID = @VAR_PRODUCT_ID AND IMAGE_IS_MAIN = 1;
    END//
delimiter ;

delimiter //
CREATE PROCEDURE insertOpcImage(
    IN P_PRODUCT_ID INTEGER,
    IN P_IMAGE_IND INTEGER,
    IN P_IMAGE_EXT VARCHAR(10))

    BEGIN
        INSERT INTO IMAGES (PRODUCT_ID, IMAGE_ROUTE) 
            VALUE (P_PRODUCT_ID, CONCAT(P_PRODUCT_ID, '-', P_IMAGE_IND, '.', P_IMAGE_EXT));
        SELECT IMAGE_ROUTE FROM IMAGES WHERE PRODUCT_ID = P_PRODUCT_ID AND IMAGE_ROUTE LIKE CONCAT('%-', P_IMAGE_IND, '%');
    END//
delimiter ;




