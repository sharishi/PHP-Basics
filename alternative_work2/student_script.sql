create database student;

CREATE TABLE facultate (
                           id_facultate SERIAL PRIMARY KEY,
                           denumire_facultate VARCHAR(30) NOT NULL,
                           nr_telefon_secretar VARCHAR(20)
);

CREATE TABLE specialitate (
                              id_specialitate SERIAL PRIMARY KEY,
                              denumire_specialitate VARCHAR(30) NOT NULL,
                              durata_specialitate INTEGER NOT NULL,
                              id_facultate INTEGER NOT NULL,
                              FOREIGN KEY (id_facultate) REFERENCES facultate(id_facultate) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE student (
                         id_student SERIAL PRIMARY KEY,
                         nume_student VARCHAR(30) NOT NULL,
                         prenume_student VARCHAR(30) NOT NULL,
                         adresa_domiciliu VARCHAR(30),
                         nr_telefon VARCHAR(15),
                         email VARCHAR(30),
                         an_absolvire_liceu INTEGER CHECK (an_absolvire_liceu >= 1900),
                         media_liceu DECIMAL(4,2),
                         id_specialitate INTEGER NOT NULL,
                         FOREIGN KEY (id_specialitate) REFERENCES specialitate(id_specialitate) ON DELETE RESTRICT ON UPDATE RESTRICT,
                         image_name VARCHAR(50)
);


INSERT INTO public.facultate (denumire_facultate,nr_telefon_secretar) VALUES
	 ('Fizica','+37379125467'),
	 ('Matematica','+37378453288'),
	 ('Stiinte Economice','+37378342767');

INSERT INTO public.specialitate (denumire_specialitate,durata_specialitate,id_facultate) VALUES
	 ('Inginerie',4,1),
	 ('Informatica',3,2),
	 ('Informatica aplicata',3,2),
	 ('Contabilitate',3,3);


INSERT INTO student (nume_student,prenume_student,adresa_domiciliu,nr_telefon,email,an_absolvire_liceu,media_liceu,id_specialitate,image_name) VALUES
	 ('Volcova','Anna','str. Vasile Alecsandri 4','78345190','v_ann@gmail.com',1994,8.04,1,NULL),
	 ('Sam','Kate','str. Vasile Alecsandri 9','79562310','sam_cat@gmail.com',1996,9.04,2,NULL),
	 ('Tomova','Milena','str. A.Puskin 24','60674231','tmilena@gmail.com',2003,6.04,1,NULL),
	 ('Catrinici','Alexandru','str. A.Mateevici 26','78341262','catrinici_a@gmail.com',2011,7.05,2,NULL),
	 ('Suruceanu','Oleg','str. A.Puskin 5','79552020','oleg_s@gmail.com',2004,7.34,1,NULL),
	 ('Vrabie','Daria','str. A.Puskin 5','78234561','vrabie_daria@gmail.com',2000,5.03,1,NULL),
	 ('Vrabie','Daria','str. A.Puskin 5','78234561','vrabie_daria@gmail.com',2000,5.03,1,NULL),
	 ('Cravcenko','Maria','str. Vasile Alecsandri 42','79552020','crvcenko@gmail.com',2003,9.04,1,NULL),
	 ('Gladei','Anna','str. A.Puskin 5','79552020','v_ann@gmail.com',2001,3.04,2,NULL),
	 ('Volcova','Anastasia','str. A.Puskin 52','79552020','v_ann@gmail.com',2009,8.06,1,NULL);
INSERT INTO student (nume_student,prenume_student,adresa_domiciliu,nr_telefon,email,an_absolvire_liceu,media_liceu,id_specialitate,image_name) VALUES
	 ('Volcova','Arina','str. A.Puskin 52','79552020','v_ann@gmail.com',2001,7.03,1,'cat.jpg');
