drop DATABASE if exists stock_management;
CREATE DATABASE stock_management;
USE stock_management;
CREATE TABLE client(
    idclient int NOT NULL AUTO_INCREMENT,
    num_client int NOT NULL,
    name_client TEXT NOT NULL,
    PRIMARY KEY(idclient)
);

CREATE TABLE article(
    idarticle int NOT NULL AUTO_INCREMENT,
    name_art VARCHAR(200) NOT NULL,
    quantity_art TEXT NOT NULL,
    price_art int NOT NULL,
    expirydate date NOT NULL,
    PRIMARY KEY(idarticle)
);

CREATE TABLE receipt(
    idreceipt int NOT NULL AUTO_INCREMENT,
    name_client TEXT NOT NULL,
    name_art VARCHAR(200) NOT NULL,
    quantity_art TEXT NOT NULL,
    price_art int NOT NULL,
    date_sales date NOT NULL,
    PRIMARY KEY(idreceipt)
);

CREATE TABLE sales(
    idsales int NOT NULL AUTO_INCREMENT,
    idclient int NOT NULL,
    idarticle int NOT NULL,
    date_sales date NOT NULL,
    PRIMARY KEY(idsales)
);


ALTER TABLE sales
ADD FOREIGN KEY (idclient) REFERENCES client(idclient);
ALTER TABLE sales
ADD FOREIGN KEY (idarticle) REFERENCES article(idarticle);

CREATE TABLE Users(
    iduser int NOT NULL AUTO_INCREMENT,
    username TEXT NOT NULL,
    emailuser VARCHAR(100) NOT NULL,
    typeuser VARCHAR(100) NOT NULL,
    passworduser VARCHAR(10) NOT NULL,
    PRIMARY KEY (iduser)
);

INSERT INTO `stock_management`.`users` (`iduser`, `username`, `emailuser`, `typeuser`, `passworduser`) 
VALUES (NULL, 'venusv', 'tadonkevenus@gmail.com', 'Administrator', '12345');

INSERT INTO `stock_management`.`users` (`iduser`, `username`, `emailuser`, `typeuser`, `passworduser`) 
VALUES (NULL, 'bertille', 'bertille@gmail.com', 'Seller', 'seller');