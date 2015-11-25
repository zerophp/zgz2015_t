SELECT * 
FROM user;

SELECT * 
FROM user 
WHERE iduser like'uuid%';

SELECT city, name
FROM user, city
WHERE user.city_idcity=city.idcity;

SELECT city, name
FROM user
INNER JOIN city on city.idcity = user.city_idcity
WHERE user.city_idcity=city.idcity;


SELECT city, name
FROM user, city
WHERE user.city_idcity=city.idcity
AND city='Zaragoza';


SELECT name, group_concat(pet)
FROM user
INNER JOIN user_has_pet on user_has_pet.user_iduser = user.iduser
INNER JOIN pet ON pet.idpet = user_has_pet.pet_idpet
GROUP BY iduser;

INSERT INTO city(city) VALUES ('Santiago');
INSERT INTO city(city) VALUES ('Sevilla');

UPDATE city SET city='SeBilla' WHERE city='Sevilla';

UPDATE city SET city='SeBilla' WHERE idcity=7;

DELETE from user;

DELETE FROM city WHERE idcity=7;


