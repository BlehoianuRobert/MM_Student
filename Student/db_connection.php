<?php
class DBConnection
{
    private static ?PDO $conn = null;

    private function __construct() {} // Prevent direct instantiation

    public static function connect(): PDO
    {
        if (self::$conn === null) {
            try {
                $servername = "localhost";
                $username = "root";
                $password = "12345";
                $dbname = "students_db";

                self::$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$conn;
    }

    public static function saveStudent(Student $student): void
    {
        $conn = self::connect();

        try {
            $sql = "SELECT COUNT(*) FROM students WHERE name = :name AND age = :age AND gender = :gender AND major = :major";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':name' => $student->name,
                ':age' => $student->age,
                ':gender' => $student->gender,
                ':major' => $student->major
            ]);

            if ($stmt->fetchColumn() > 0) {
                return; // Student already exists
            }

            $sql = "INSERT INTO students (name, age, gender, major) VALUES (:name, :age, :gender, :major)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':name' => $student->name,
                ':age' => $student->age,
                ':gender' => $student->gender,
                ':major' => $student->major
            ]);

            echo "Student added successfully!<br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function fetchAllStudents(): array
    {
        $conn = self::connect();

        $sql = "SELECT * FROM students";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
