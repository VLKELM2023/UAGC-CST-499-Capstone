USE registration_project;

CREATE TABLE User (
userID INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
firstName VARCHAR(255) NOT NULL,
lastName VARCHAR(255) NOT NULL, 
userType ENUM('Student', 'Administrator') NOT NULL,
enrolledCourses TEXT,
PRIMARY KEY (userID)
);

CREATE TABLE Course (
courseID INT NOT NULL AUTO_INCREMENT,
courseName VARCHAR(255) NOT NULL,
semester VARCHAR(255) NOT NULL,
enrolledStudents TEXT,
maxEnrollment INT NOT NULL,
numEnrolled INT NOT NULL,
waitingList INT NOT NULL,
PRIMARY KEY (courseID)
);

CREATE TABLE Waitlist (
WaitlistID INT AUTO_INCREMENT PRIMARY KEY,
CourseID INT,
UserID INT,
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
FOREIGN KEY (UserID) REFERENCES User(UserID)
);