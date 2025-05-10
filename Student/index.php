<?php
declare(strict_types=1);

require_once 'student.php';
require_once 'db_connection.php';

try {
    // Create student objects
    $student1 = new Student("Robert ", 22, "male", "Mathematics");
    $student2 = new Student("Alexandra ", 20, "female", "Romanology");
    $student5 = new Student("Ionut", 15, "male", "English");

    // Save students to the database
    DBConnection::saveStudent($student1);
    DBConnection::saveStudent($student2);
    DBConnection::saveStudent($student5);

    // Fetch all students and display them
    $students = DBConnection::fetchAllStudents();

    echo "<h2>All Students in Database:</h2><br>";
    foreach ($students as $student) {
        echo "Name: " . $student['name'] . "<br>";
        echo "Age: " . $student['age'] . "<br>";
        echo "Gender: " . $student['gender'] . "<br>";
        echo "Major: " . $student['major'] . "<br><br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
