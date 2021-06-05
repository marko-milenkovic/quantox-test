<?php


interface BoardResult
{
    public function calculateAverageGrade(Student $student);

    public function hasPassed(Student $student);

    public function getDataReturnType();
}