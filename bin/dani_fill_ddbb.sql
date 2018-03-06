USE symfony;
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE owner;
TRUNCATE TABLE product;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO owner(name) VALUES ('juan'), ('paco'),('maria');

INSERT INTO product(owner_id,name,price,description) VALUES
    (1,'1',100,'descripcion1'),
    (1,'2',200,'descripcion2'),
    (1,'3',300,'descripcion3'),
    (1,'4',400,'descripcion4'),
    (1,'5',500,'descripcion5'),
    (1,'6',600,'descripcion6'),
    (1,'7',700,'descripcion7'),
    (1,'8',800,'descripcion8'),
    (1,'9',900,'descripcion9'),
    (1,'10',1000,'descripcion10'),
    (2,'11',1100,'descripcion11'),
    (2,'12',1200,'descripcion12'),
    (2,'13',1300,'descripcion13'),
    (2,'14',1400,'descripcion14'),
    (2,'15',1500,'descripcion15'),
    (2,'16',1600,'descripcion1sq6'),
    (2,'17',1700,'descripcion17'),
    (2,'18',1800,'descripcion18'),
    (2,'19',1900,'descripcion19'),
    (2,'20',2000,'descripcion20'),
    (21,'21',2100,'descripcion21'),
    (22,'22',2200,'descripcion22'),
    (23,'23',2300,'descripcion23'),
    (24,'24',2400,'descripcion24'),
    (24,'25',2500,'descripcion25'),
    (24,'26',2600,'descripcion26'),
    (24,'27',2700,'descripcion27'),
    (24,'28',2800,'descripcion28'),
    (24,'29',2900,'descripcion29'),
    (24,'30',3000,'descripcion30')
;
