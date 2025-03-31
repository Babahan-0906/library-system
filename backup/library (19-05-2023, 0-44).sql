

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `book_serialnumber` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_author` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_year` int(11) DEFAULT NULL,
  `book_language` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_subject` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_class` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_cat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_edition` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_school` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_chapter` int(11) DEFAULT NULL,
  `book_quantity` int(11) DEFAULT NULL,
  `book_cost` float DEFAULT NULL,
  `book_number` int(11) DEFAULT NULL,
  `book_exist` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `writed_on_date` date NOT NULL,
  `removed_date` date DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO books VALUES("1","1","","","A.Durdyýew","2019","","Harplyk","1-nji synp","","","","","50","0","","true","2022-10-07","");
INSERT INTO books VALUES("2","1","","","A.Durdyýew","2019","","Matematika I bölüm","1-nji synp","","","","","100","0","","true","2022-10-07","");
INSERT INTO books VALUES("3","1","","","A.Durdyýew","2019","","Matematika II bölüm","1-nji synp","","","","","100","0","","true","2022-10-07","");
INSERT INTO books VALUES("4","1","","","A.Durdyýew","2019","","Aýdym-saz","1-nji synp","","","","","150","0","","true","2022-10-07","");
INSERT INTO books VALUES("5","1","","","A.Durdyýew","2019","","Ýaşaýyş durmuş esaslary","1-nji synp","","","","","100","0","","true","2022-10-07","");
INSERT INTO books VALUES("6","1","","","A.Durdyýew","2019","","Rus-dili","1-nji synp","","","","","100","0","","true","2022-10-07","");
INSERT INTO books VALUES("7","1","","","A.Durdyýew","2019","","Surat","1-nji synp","","","","","160","0","","true","2022-10-07","");
INSERT INTO books VALUES("8","1","","","A.Durdyýew","2019","","Informatikanyň esaslary","1-nji synp","","","","","190","0","","true","2022-10-07","");
INSERT INTO books VALUES("9","1","","","A.Durdyýew","2019","","Inlis Dili","1-nji synp","","","","","235","0","","true","2022-10-07","");
INSERT INTO books VALUES("10","1","","","A.Durdyýew","2019","","Çeperçilik Zähmeti","1-nji synp","","","","","180","0","","true","2022-10-07","");
INSERT INTO books VALUES("11","1","","","A.Durdyýew","2022","","Harplyk","1-nji synp","","","","","320","0","","true","2022-11-07","");
INSERT INTO books VALUES("12","1","","","A.Durdyýew","2016","","Ene dili","2-nji synp","","","","","160","0","","true","2022-10-07","");
INSERT INTO books VALUES("13","1","","","A.Durdyýew","2016","","Türkmen-dili","2-nji synp","","","","","160","0","","true","2022-10-07","");
INSERT INTO books VALUES("14","1","","","A.Durdyýew","2017","","Matematika II bölek","2-nji synp","","","","","160","0","","true","2022-10-07","");
INSERT INTO books VALUES("15","1","","","A.Durdyýew","2016","","Русский язык","2-nji synp","","","","","115","0","","true","2022-10-07","");
INSERT INTO books VALUES("16","1","","","A.Durdyýew","2016","","English I bölek","2-nji synp","","","","","115","6.72","","true","2022-10-07","");
INSERT INTO books VALUES("17","1","","","A.Durdyýew","2016","","English II bölek","2-nji synp","","","","","115","6.47","","true","2022-10-07","");
INSERT INTO books VALUES("18","1","","","A.Durdyýew","2016","","Zähmet","2-nji synp","","","","","115","5.79","","true","2022-10-07","");
INSERT INTO books VALUES("19","1","","","A.Durdyýew","2016","","Şekillendiriş sungaty","2-nji synp","","","","","115","3.13","","true","2022-10-07","");
INSERT INTO books VALUES("20","1","","","A.Durdyýew","2016","","Aýdym-saz","2-nji synp","","","","","160","0","","true","2022-10-07","");
INSERT INTO books VALUES("21","1","","","A.Durdyýew","2016","","Ýaşaýyş durmuş esaslary","2-nji synp","","","","","115","4.09","","true","2022-10-07","");
INSERT INTO books VALUES("22","1","","","A.Durdyýew","2016","","Turkmen-dili","8-nji synp (7ýaş)","","","","","110","7.3","","true","2022-10-07","");
INSERT INTO books VALUES("23","1","","","A.Durdyýew","2016","","Rus-dili","8-nji synp (7ýaş)","","","","","115","0","","true","2022-10-07","");
INSERT INTO books VALUES("24","1","","","A.Durdyýew","2016","","Himiýa","8-nji synp (7ýaş)","","","","","126","0","","true","2022-10-07","");
INSERT INTO books VALUES("25","1","","","A.Durdyýew","2016","","Fizika","8-nji synp (7ýaş)","","","","","126","0","","true","2022-10-07","");
INSERT INTO books VALUES("26","1","","","A.Durdyýew","2013","","Türk. Dur. ykd. geogr-y","8-nji synp (7ýaş)","","","","","107","9.1","","true","2022-10-07","");
INSERT INTO books VALUES("27","1","","","A.Durdyýew","2017","","Geometriýa","8-nji synp (7ýaş)","","","","","140","5.48","","true","2022-10-07","");
INSERT INTO books VALUES("28","1","","","A.Durdyýew","2016","","Türkmenistanyň taryhy","8-nji synp (7ýaş)","","","","","125","5.05","","true","2022-10-07","");
INSERT INTO books VALUES("29","1","","","A.Durdyýew","2017","","Täze taryhy","8-nji synp (7ýaş)","","","","","122","0","","true","2022-10-07","");
INSERT INTO books VALUES("30","1","","","A.Durdyýew","2012","","Biologiýa","8-nji synp (7ýaş)","","","","","100","9.24","","true","2022-10-07","");
INSERT INTO books VALUES("31","1","","","A.Durdyýew","2012","","Hukuk","8-nji synp (7ýaş)","","","","","100","6.17","","true","2022-10-07","");
INSERT INTO books VALUES("32","1","","","A.Durdyýew","2014","","Hukuk","8-nji synp (7ýaş)","","","","","5","4.424","","true","2022-10-07","");
INSERT INTO books VALUES("33","1","","","A.Durdyýew","2020","","Turkmen-dili","8-nji synp","","","","","280","0","","true","2022-10-07","");
INSERT INTO books VALUES("34","1","","","A.Durdyýew","2020","","Geometriýa","8-nji synp","","","","","230","2.83","","true","2022-10-07","");
INSERT INTO books VALUES("35","1","","","A.Durdyýew","2020","","Informatika","9-njy synp","","","","","500","0","","true","2022-10-07","");
INSERT INTO books VALUES("36","1","","","A.Durdyýew","2017","","Täze taryhy","9-njy synp (7ýaş)","","","","","15","0","","true","2022-10-07","");
INSERT INTO books VALUES("37","1","","","A.Durdyýew","2016","","Umumy biologiýa","9-njy synp (7ýaş)","","","","","25","0","","true","2022-10-07","");
INSERT INTO books VALUES("38","1","","","A.Durdyýew","2018","","Himiýa","9-njy synp (7ýaş)","","","","","10","0","","true","2022-10-07","");
INSERT INTO books VALUES("39","1","","","B.Hemraýew","2014","","Iňlis Dili","11-nji synp (7ýaş)","","","","","10","0","","true","2022-10-09","");
INSERT INTO books VALUES("40","1","","","B.Hemraýew","2010","","Täze okatmagyň usulýeti","11-nji synp (7ýaş)","","","","","1","12.39","","true","2022-11-09","");
INSERT INTO books VALUES("62","1","","","R.Nazarow","2022","","Iňlis Dili","2-nji synp","","","","","5","0","","true","2022-11-13","");
INSERT INTO books VALUES("42","3","","","B.Hemraýew","2021","","Matematika","1-nji synp","","","","1","335","3.75","","true","2022-10-09","");
INSERT INTO books VALUES("63","1","","","N.Halmämmedow","2011","","Medeni Miras","9-njy synp (7ýaş)","","","","","0","15","","true","2022-12-19","");
INSERT INTO books VALUES("44","2","A01E1","Beýik Seljukly","Ýazmyrat Mämmedi","2020","Türkmen dilinde","","","2","TDNG","","","5","15.43","","true","2022-10-09","");
INSERT INTO books VALUES("45","2","A01E2","Beýik Seljukly","Ýazmyrat Mämmedi","2020","Türkmen dilinde","","","2","TDNG","","","5","15.43","","true","2022-10-09","");
INSERT INTO books VALUES("46","2","A01E3","Beýik Seljukly","Ýazmyrat Mämmedi","2020","Türkmen dilinde","","","2","TDNG","","","5","15.43","","true","2022-10-09","");
INSERT INTO books VALUES("47","2","A01E4","Beýik Seljukly","Ýazmyrat Mämmedi","2020","Türkmen dilinde","","","2","TDNG","","","5","15.43","","true","2022-10-09","");
INSERT INTO books VALUES("48","2","A01E5","Beýik Seljukly","Ýazmyrat Mämmedi","2020","Türkmen dilinde","","","2","TDNG","","","5","15.43","","true","2022-10-09","");
INSERT INTO books VALUES("49","2","M9E","Счастье мое","Hajy Kakalyýew","2021","Rus dilinde","","","2","TDNG","","","1","31.21","","true","2022-10-09","");
INSERT INTO books VALUES("50","5","M9E","Ak şäherim Aşgabat","Gurbanguly Berdimuhamedow","2021","Rus dilinde","","","","","","","1","127.69","","true","2022-10-09","");
INSERT INTO books VALUES("51","2","M1E1","Orta mekdeplerde bedenterbiýe dersi boýunça synpdan daşary işleri guramagyň usullar","S.Altyýew","2021","Rus dilinde","","","3","TDNG","","","2","0","","true","2022-10-09","");
INSERT INTO books VALUES("52","2","M1E2","Orta mekdeplerde bedenterbiýe dersi boýunça synpdan daşary işleri guramagyň usullar","S.Altyýew","2021","Rus dilinde","","","3","TDNG","","","2","0","","true","2022-11-09","");
INSERT INTO books VALUES("53","4",""," Matematikadan usuly ","Açilowa Awe","2021","","Matematika","","","","","","7","0","","true","2022-10-09","");
INSERT INTO books VALUES("54","4","","başlangyç synplar üçin okuw gollanma","R.Nazarow","2021","","Iňlis Dili","","","","","","7","15.75","","true","2022-11-09","");
INSERT INTO books VALUES("73","1","","","A.Durdyýew","2015","","Täze taryhy","8-nji synp (7ýaş)","","","","","25","5","","true","2023-01-03","");
INSERT INTO books VALUES("64","2","A01E1","Japbaklar","Berdi.Kerbabaýew","2011","Türkmençe","","","1","TDNG","","","2","10","","true","2022-10-25","");
INSERT INTO books VALUES("65","2","A01E2","Japbaklar","Berdi.Kerbabaýew","2011","Türkmençe","","","1","TDNG","","","2","10","","true","2022-11-03","");
INSERT INTO books VALUES("66","1","","","R.Nazarow","2022","","Iňlis Dili","2-nji synp","","","","","20","10","","true","2022-11-03","");
INSERT INTO books VALUES("68","1","","","R.Nazarow","2022","","Geografiya","6-njy synp","","","","","1","10","","true","2022-11-03","");
INSERT INTO books VALUES("69","1","","","R.Nazarow","2022","","Geografiya","7-nji synp","","","","","1","10","","true","2022-11-03","");
INSERT INTO books VALUES("70","2","9iol","Ykbal","R.Nazarow","2022","Rus dilinde","","","1","TDNG","","","1","10","","true","2022-10-27","");
INSERT INTO books VALUES("71","1","","","R.Nazarow","2022","","TEST21012023","8-nji synp (7ýaş)","","","","","1","10","","true","2023-01-21","");
INSERT INTO books VALUES("72","1","","","R.Nazarow","2022","","Fizika","8-nji synp","","","","","200","10","","true","2023-02-01","");
INSERT INTO books VALUES("74","2","A01","Japbaklar","A.Durdyýew","2000","Türkmençe","","","1","TDNG","","","5","50","","true","2023-02-03","");
INSERT INTO books VALUES("75","2","A02","Japbaklar","A.Durdyýew","2000","Türkmençe","","","1","TDNG","","","5","50","","true","2023-02-03","");
INSERT INTO books VALUES("76","2","A03","Japbaklar","A.Durdyýew","2000","Türkmençe","","","1","TDNG","","","5","50","","true","2023-02-03","");
INSERT INTO books VALUES("77","2","A04","Japbaklar","A.Durdyýew","2000","Türkmençe","","","1","TDNG","","","5","50","","true","2023-02-03","");
INSERT INTO books VALUES("78","2","A05","Japbaklar","A.Durdyýew","2000","Türkmençe","","","1","TDNG","","","5","50","","true","2023-02-03","");





CREATE TABLE `borrowed_books` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `book_return` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `book_quantity` int(11) NOT NULL,
  `borrow_exist` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO borrowed_books VALUES("4","40","2022-10-13","","0","7","","0","1");
INSERT INTO borrowed_books VALUES("2","54","2022-10-10","","0","","7","0","1");
INSERT INTO borrowed_books VALUES("3","54","2022-10-10","","0","","8","0","1");
INSERT INTO borrowed_books VALUES("5","55","2022-10-13","","0","7","","0","1");
INSERT INTO borrowed_books VALUES("6","55","2022-10-13","","0","2","","0","1");
INSERT INTO borrowed_books VALUES("7","55","2022-10-13","","0","3","","0","1");
INSERT INTO borrowed_books VALUES("8","56","2022-10-17","","0","","4","0","1");
INSERT INTO borrowed_books VALUES("9","51","2022-10-17","","0","","1","0","1");
INSERT INTO borrowed_books VALUES("10","68","2022-11-03","","0","7","","0","1");
INSERT INTO borrowed_books VALUES("11","69","2022-11-03","","0","7","","1","1");
INSERT INTO borrowed_books VALUES("12","72","2023-02-01","","0","","2","16","1");
INSERT INTO borrowed_books VALUES("13","72","2023-02-01","","0","12","","10","1");
INSERT INTO borrowed_books VALUES("14","72","2023-02-01","","0","13","","10","1");
INSERT INTO borrowed_books VALUES("15","72","2023-02-03","","0","12","","4","1");
INSERT INTO borrowed_books VALUES("16","73","2023-02-03","","0","14","","0","1");
INSERT INTO borrowed_books VALUES("17","73","2023-02-03","","0","16","","0","1");
INSERT INTO borrowed_books VALUES("18","74","2023-02-03","","0","12","","1","1");





CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `added_year` year(4) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO classes VALUES("1","10-Ž","2023");
INSERT INTO classes VALUES("2","11-a","2023");
INSERT INTO classes VALUES("3","11-b","2023");
INSERT INTO classes VALUES("4","12-A","2023");
INSERT INTO classes VALUES("5","12-B","2023");
INSERT INTO classes VALUES("6","12-Ç","2023");
INSERT INTO classes VALUES("7","12-D","2023");
INSERT INTO classes VALUES("8","12-E","2023");
INSERT INTO classes VALUES("9","12-Ä","2023");





CREATE TABLE `returned_books` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `book_quantity` int(11) NOT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO returned_books VALUES("1","3","2022-10-12","1");
INSERT INTO returned_books VALUES("2","2","2022-10-29","1");
INSERT INTO returned_books VALUES("3","5","2022-10-13","3");
INSERT INTO returned_books VALUES("4","7","2022-10-13","2");
INSERT INTO returned_books VALUES("5","6","2022-10-13","2");
INSERT INTO returned_books VALUES("6","8","2022-10-17","700");
INSERT INTO returned_books VALUES("7","9","2022-10-19","1324234");
INSERT INTO returned_books VALUES("8","4","2022-11-03","1");
INSERT INTO returned_books VALUES("9","10","2022-11-03","1");
INSERT INTO returned_books VALUES("10","15","2023-02-04","5");
INSERT INTO returned_books VALUES("11","16","2023-02-03","10");
INSERT INTO returned_books VALUES("12","17","2023-02-03","10");





CREATE TABLE `school_logs` (
  `junior_grade` int(11) NOT NULL,
  `senior_grade` int(11) NOT NULL,
  `junior_year` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `senior_year` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `junior_cost` float NOT NULL,
  `senior_cost` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO school_logs VALUES("34","52","2021","2021","10","0");





CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `student_exist` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `removed_date` date DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO students VALUES("1","2","1","Mähri","Abdyrahmanowa","true","");
INSERT INTO students VALUES("2","2","1","Mekan","Annageldiýew","true","");
INSERT INTO students VALUES("3","2","1","Bahar","Amanowa","true","");
INSERT INTO students VALUES("4","2","1","Aýlara","Aulowa","true","");
INSERT INTO students VALUES("5","2","1","Aýnura","Aulowa","true","");
INSERT INTO students VALUES("6","2","1","Nurana","Annaýewa","true","");
INSERT INTO students VALUES("7","2","1","Babahan","Babakulyýew","true","");
INSERT INTO students VALUES("8","2","1","Nariman","Çaryýew","true","");
INSERT INTO students VALUES("9","2","1","Annamuhammet","Durdyýew","true","");
INSERT INTO students VALUES("10","2","1","Gülnür","Durdymuradowa","true","");
INSERT INTO students VALUES("11","2","1","Zübeýda","Döwranowa","true","");
INSERT INTO students VALUES("12","3","2","Aziza","Egemberdiýew","true","");
INSERT INTO students VALUES("13","3","2","Aýna","Hezretgulyýewa","true","");
INSERT INTO students VALUES("14","3","2","Baýhan","Hudaýberdiýew","true","");
INSERT INTO students VALUES("15","3","2","Näzik","Hojahanowa","true","");
INSERT INTO students VALUES("16","3","2","Arslanbek","Jumanazarow","true","");
INSERT INTO students VALUES("17","3","2","Jennet","Jumaýewa","true","");
INSERT INTO students VALUES("18","3","2","Selbi","Öwezdurdyýewa","true","");
INSERT INTO students VALUES("19","3","2","Batyr","Öwlýagulyýew","true","");
INSERT INTO students VALUES("20","3","2","Şöhrat","Möwlýanow","true","");
INSERT INTO students VALUES("21","3","2","Gözel","Semenderowa","true","");
INSERT INTO students VALUES("22","3","2","Gözel","Serdarowa","true","");
INSERT INTO students VALUES("23","1","3","Akmuhammet","Tekäýew","true","");
INSERT INTO students VALUES("24","1","3","Begendik","Ýoldaşow","true","");
INSERT INTO students VALUES("25","1","3","Döwlet","Sultanow","true","");
INSERT INTO students VALUES("26","1","3","Arzuw","Haýytbaýewa","true","");
INSERT INTO students VALUES("27","1","3","Mekan","Myradow","true","");
INSERT INTO students VALUES("28","1","3","Guwanç","Wepaýew","true","");
INSERT INTO students VALUES("29","1","3","Baýram","Aşyrow","true","");
INSERT INTO students VALUES("30","1","3","Maksat","Rozyýew","true","");
INSERT INTO students VALUES("31","9","4","Batyr","Omarow","true","");





CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_exist` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `removed_date` date DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO teachers VALUES("1","3","Aýsoltan","Bebitowa","true","");
INSERT INTO teachers VALUES("2","1","Jemşit","Taganbaýew","true","");
INSERT INTO teachers VALUES("3","2","Bahar","Maşaripowa","true","");
INSERT INTO teachers VALUES("4","0","Meýlis","Hemraýew","true","");
INSERT INTO teachers VALUES("5","0","Irina","Hemraýewa","true","");
INSERT INTO teachers VALUES("6","0","Atamyrat","Jumaýew","true","");
INSERT INTO teachers VALUES("7","0","Nartäç","Gurbanowa","true","");
INSERT INTO teachers VALUES("8","0","Murat","Hezretkulyýew","true","");
INSERT INTO teachers VALUES("9","4","Toyly","Gurbanow","true","");





CREATE TABLE `today` (
  `today` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO today VALUES("19");





CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user VALUES("1","Jennet","Jumadurdyýewa","user.png");





CREATE TABLE `writed_off_books` (
  `off_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_quantity` int(11) DEFAULT NULL,
  `added_quantity` int(11) NOT NULL,
  `writed_off_date` date NOT NULL,
  PRIMARY KEY (`off_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO writed_off_books VALUES("6","73","40","15","2023-02-03");





CREATE TABLE `writed_on_books` (
  `on_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `added_quantity` int(11) NOT NULL,
  `writed_on_date` date NOT NULL,
  PRIMARY KEY (`on_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO writed_on_books VALUES("5","66","10","10","2023-02-01");
INSERT INTO writed_on_books VALUES("4","63","50","25","2023-02-01");



