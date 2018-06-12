USE symfony;
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE owner;
TRUNCATE TABLE product;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO owner(name) VALUES ('juan'), ('paco'),('maria');

INSERT INTO product(owner_id,name,price,description) VALUES
    (1,'nombre1',100,'descripcion1'),
    (1,'nombre2',200,'descripcion2'),
    (1,'nombre3',300,'descripcion3'),
    (1,'nombre10',1000,'descripcion10'),
    (2,'nombre11',1100,'descripcion11'),
    (2,'nombre12',1200,'descripcion12'),
    (2,'nombre13',1300,'descripcion13'),
    (2,'nombre20',2000,'descripcion20'),
    (3,'nombre21',2100,'descripcion21'),
    (3,'nombre22',2200,'descripcion22')
;
