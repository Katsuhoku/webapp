/* source C:/wamp64/www/webapp/proyecto/TRUEQUES_FCC.sql */

delete database if exists TRUEQUES_FCC;
create database TRUEQUES_FCC;
use TRUEQUES_FCC;

CREATE TABLE IF NOT EXISTS USERS (
    USER_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USER_USERNAME VARCHAR(64) NOT NULL,
    USER_PASSWORD VARCHAR(128) NOT NULL,
    USER_NAME VARCHAR(64) NOT NULL,
    USER_EMAIL VARCHAR(128) NOT NULL,
    USER_TYPE INT(1) NOT NULL DEFAULT 0,

    UNIQUE (USER_USERNAME),
    UNIQUE (USER_EMAIL)
);

INSERT INTO USERS(USER_USERNAME, USER_PASSWORD, USER_NAME, USER_EMAIL, USER_TYPE) VALUES
    ("MarcoCoria", "123456", "Marco A. Coria Rios", "marco_coria@hotmail.com", 0),
    ("Esiel15", "123456", "Esiel K. Arizmendi Ramirez", "esiel_kar@hotmail.com", 1);




