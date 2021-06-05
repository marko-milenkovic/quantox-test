<?php


class CSMB implements BoardResult
{
    /**
     * @param Student $student
     * @return float|int
     */
    public function calculateAverageGrade(Student $student)
    {
        $grades = $student->getGrades();

        $numberOfGrades = count($grades);

        if ($numberOfGrades > 0)
        {
            $gradeValues = [];
            /** @var Grade $grade */
            foreach ($grades as $grade)
            {
                $gradeValues[] = $grade->getValue();
            }

            sort($gradeValues);

            if (count($gradeValues) > 2)
            {
                array_shift($gradeValues);
            }

            $numberOfGrades = count($gradeValues);

            $gradeSum = 0;
            foreach ($gradeValues as $value)
            {
                $gradeSum += $value;
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
        $grades = $student->getGrades();
        $gradeValues = [];
        /** @var Grade $grade */
        foreach ($grades as $grade)
        {
            $gradeValues[] = $grade->getValue();
        }

        sort($gradeValues);

        return end($gradeValues) > 8;
    }

    /**
     * @return string
     */
    public function getDataReturnType(): string
    {
        return Constants::TYPE_XML;
    }
}