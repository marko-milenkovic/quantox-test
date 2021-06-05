1. Run composer install
2. Import database file quantox-test.sql
3. Route for testing is http://localhost/quantox-test/test?student=1, there are 4 students with ids 1, 2, 3 and 4.

Query's used to create tables:
CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, type VARCHAR(10) NOT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_58562B47CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, value VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_595AAE34CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
ALTER TABLE board ADD CONSTRAINT FK_58562B47CB944F1A FOREIGN KEY (student_id) REFERENCES student (id);
ALTER TABLE grade ADD CONSTRAINT FK_595AAE34CB944F1A FOREIGN KEY (student_id) REFERENCES student (id);
ALTER TABLE board CHANGE type type INT NOT NULL;
