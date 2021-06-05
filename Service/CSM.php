<?php


class CSM implements BoardResult
{
    /**
     * @param Student $student
     * @return float
     */
    public function calculateAverageGrade(Student $student): float
    {
        $grades = $student->getGrades();

        $numberOfGrades = count($grades);

        if ($numberOfGrades > 0)
        {
            $gradeSum = 0;
            /** @var Grade $grade */
            foreach ($grades as $grade)
            {
                $gradeSum += $grade->getValue();
            }

            return $gradeSum / $numberOfGrades;
        }

        return 0;
    }

    /**
     * @param Student $student
     * @return bool
     */
    public function hasPassed(Student $student): bool
    {
        $averageGrade = $this->calculateAverageGrade($student);
        return $averageGrade >= 7;
    }

    /**
     * @return string
     */
    public function getDataReturnType(): string
    {
        return Constants::TYPE_JSON;
    }
}