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
    (1,'nombre4',400,'descripcion4'),
    (1,'nombre5',500,'descripcion5'),
    (1,'nombre6',600,'descripcion6'),
    (1,'nombre7',700,'descripcion7'),
    (1,'nombre8',800,'descripcion8'),
    (1,'nombre9',900,'descripcion9'),
    (1,'nombre10',1000,'descripcion10'),
    (2,'nombre11',1100,'descripcion11'),
    (2,'nombre12',1200,'descripcion12'),
    (2,'nombre13',1300,'descripcion13'),
    (2,'nombre14',1400,'descripcion14'),
    (2,'nombre15',1500,'descripcion15'),
    (2,'nombre16',1600,'descripcion1sq6'),
    (2,'nombre17',1700,'descripcion17'),
    (2,'nombre18',1800,'descripcion18'),
    (2,'nombre19',1900,'descripcion19'),
    (2,'nombre20',2000,'descripcion20'),
    (3,'nombre21',2100,'descripcion21'),
    (3,'nombre22',2200,'descripcion22'),
    (3,'nombre23',2300,'descripcion23'),
    (3,'nombre24',2400,'descripcion24'),
    (3,'nombre25',2500,'descripcion25'),
    (3,'nombre26',2600,'descripcion26'),
    (3,'nombre27',2700,'descripcion27'),
    (3,'nombre28',2800,'descripcion28'),
    (3,'nombre29',2900,'descripcion29'),
    (3,'nombre30',3000,'descripcion30')
;
