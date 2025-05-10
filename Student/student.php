<?php
 class Student
{
    public function __construct(
        public string $name,
        public int    $age,
        public string $gender,
        public string $major
    ) {}
    public function getNamere(): string
    {
        return $this->name;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function getGender(): string
    {
        return $this->gender;
    }
    public function getMajor(): string
    {
        return $this->major;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }
    public function setMajor(string $major): void
    {
        $this->major = $major;
    }

}
