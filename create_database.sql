CREATE TABLE exercise
(
   id int(10) unsigned NOT NULL AUTO_INCREMENT,
   nameShort varchar(16) NOT NULL,
   nameLong varchar(32) NOT NULL,
   PRIMARY KEY (id),
   KEY nameShort (nameShort),
   KEY nameLong (nameLong)
) ENGINE=InnoDB;

CREATE TABLE user
(
   id int(10) unsigned NOT NULL AUTO_INCREMENT,
   `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   username varchar(32) NOT NULL,
   emailAddress varchar(64) NOT NULL,
   PRIMARY KEY (id),
   KEY username (username)
) ENGINE=InnoDB;

CREATE TABLE workout
(
   id int(10) unsigned NOT NULL AUTO_INCREMENT,
   `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   idExercise int(10) unsigned NOT NULL,
   idUser int(10) unsigned NOT NULL,
   nGramsIncludingBar int(6) unsigned NOT NULL,
   nRepititions tinyint(2) unsigned NOT NULL,
   notes text,
   PRIMARY KEY (id),
   CONSTRAINT FOREIGN KEY (idExercise) REFERENCES exercise (id),
   CONSTRAINT FOREIGN KEY (idUser) REFERENCES user (id)
) ENGINE=InnoDB;

INSERT INTO exercise
(nameShort, nameLong)
VALUES
('squat', 'Squat'),
('shoulderPress', 'Shoulder Press'),
('benchPress', 'Bench Press'),
('deadlift', 'Deadlift'),
('powerClean', 'Power Clean'),
('chinUp', 'Chin Up'),
('chinUpWideGrip', 'Chin Up - Wide Grip'),
('pushup', 'Push Up'),
('situp', 'Sit Up');

INSERT INTO user
(`create`, username, emailAddress)
VALUES
('2013-04-05 00:00:00', 'TMac', 'tomcdonnell@gmail.com');

INSERT INTO workout
(`create`, idExercise, idUser, nGramsIncludingBar, nRepititions, notes)
VALUES
('2013-03-31 10:30:00', 1, 1, 20000, 10, ''),
('2013-03-31 10:31:00', 1, 1, 40000, 5, ''),
('2013-03-31 10:32:00', 1, 1, 60000, 5, ''),
('2013-03-31 10:33:00', 1, 1, 70000, 5, ''),
('2013-03-31 10:36:00', 1, 1, 80000, 5, ''),
('2013-03-31 10:40:00', 1, 1, 85000, 5, ''),
('2013-03-31 10:44:00', 1, 1, 85000, 5, ''),
('2013-03-31 10:48:00', 1, 1, 85000, 5, ''),
('2013-03-31 10:52:00', 2, 1, 20000, 10, ''),
('2013-03-31 10:55:00', 2, 1, 40000, 5, ''),
('2013-03-31 10:59:00', 2, 1, 45000, 4, ''),
('2013-03-31 11:04:00', 2, 1, 42500, 5, ''),
('2013-03-31 11:08:00', 2, 1, 42500, 5, ''),
('2013-03-31 11:12:00', 2, 1, 42500, 5, ''),
('2013-03-31 11:12:00', 4, 1, 40000, 5, ''),
('2013-03-31 11:12:00', 4, 1, 70000, 5, ''),
('2013-03-31 11:12:00', 4, 1, 90000, 5, ''),
('2013-03-31 11:12:00', 4, 1, 90000, 5, ''),
('2013-03-31 11:12:00', 4, 1, 90000, 5, ''),
('2013-04-02 20:30:00', 1, 1, 20000, 10, ''),
('2013-04-02 20:31:00', 1, 1, 40000, 5, ''),
('2013-04-02 20:32:00', 1, 1, 60000, 5, ''),
('2013-04-02 20:33:00', 1, 1, 70000, 5, ''),
('2013-04-02 20:36:00', 1, 1, 80000, 5, ''),
('2013-04-02 20:40:00', 1, 1, 90000, 5, ''),
('2013-04-02 20:44:00', 1, 1, 90000, 5, 'Cheating a little on depth maybe.'),
('2013-04-02 20:48:00', 1, 1, 90000, 5, 'Cheating a little on depth maybe.'),
('2013-04-02 20:52:00', 3, 1, 20000, 10, ''),
('2013-04-02 20:55:00', 3, 1, 40000, 5, ''),
('2013-04-02 20:59:00', 3, 1, 60000, 5, ''),
('2013-04-02 21:04:00', 3, 1, 80000, 5, ''),
('2013-04-02 21:08:00', 3, 1, 80000, 4, ''),
('2013-04-02 21:12:00', 3, 1, 80000, 4, ''),
('2013-04-02 21:14:00', 4, 1, 70000, 5, ''),
('2013-04-02 21:18:00', 4, 1, 85000, 5, ''),
('2013-04-02 21:21:00', 4, 1, 100000, 4, ''),
('2013-04-02 21:24:00', 4, 1, 100000, 4, ''),
('2013-04-02 21:28:00', 4, 1, 100000, 4, ''),
('2013-04-02 21:32:00', 7, 1, 0, 5, ''),
('2013-04-02 21:35:00', 7, 1, 0, 4, ''),
('2013-04-02 21:39:00', 7, 1, 0, 4, ''),
('2013-05-04 21:30:00', 1, 1, 20000, 10, ''),
('2013-05-04 21:31:00', 1, 1, 50000, 5, ''),
('2013-05-04 21:32:00', 1, 1, 70000, 5, ''),
('2013-05-04 21:36:00', 1, 1, 85000, 5, ''),
('2013-05-04 21:40:00', 1, 1, 95000, 5, ''),
('2013-05-04 21:44:00', 1, 1, 95000, 5, ''),
('2013-05-04 21:48:00', 1, 1, 95000, 5, ''),
('2013-05-04 21:48:00', 1, 1, 95000, 5, ''),
('2013-05-04 21:52:00', 2, 1, 20000, 10, ''),
('2013-05-04 21:55:00', 2, 1, 40000, 5, ''),
('2013-05-04 21:59:00', 2, 1, 45000, 5, ''),
('2013-05-04 22:04:00', 2, 1, 45000, 5, ''),
('2013-05-04 22:08:00', 2, 1, 45000, 5, 'Missed one rep.'),
('2013-05-04 22:08:00', 2, 1, 45000, 5, 'Missed one rep.'),
('2013-05-04 22:12:00', 4, 1, 40000, 5, ''),
('2013-05-04 22:14:00', 4, 1, 70000, 5, ''),
('2013-05-04 22:17:00', 4, 1, 95000, 5, ''),
('2013-05-04 22:22:00', 4, 1,105000, 5, 'Missed one rep.'),
('2013-05-04 22:26:00', 4, 1,105000, 5, 'Missed one rep.');
