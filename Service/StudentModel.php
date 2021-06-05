<?php


use Doctrine\ORM\ORMException;

class StudentModel extends Database
{
    use BoardTrait;

    /**
     * @return string|Student
     */
    public function createStudent()
    {
        try {
            $entityManager = $this->getEntityManager();

            if (!isset($_POST['board']))
            {
                return 'Board is not set';
            }
            elseif (isset($_POST['board']) && !in_array(strtoupper($_POST['board']), Board::$typesFlipped))
            {
                return 'Board type not supported';
            }

            $student = new Student();
            $student->setFirstName($_POST['first_name']);
            $student->setLastName($_POST['last_name']);

            $board = new Board();
            $boardId = Board::$types[strtoupper($_POST['board'])];
            $board->setType($boardId);
            $board->setStudent($student);

            $entityManager->persist($student);
            $entityManager->persist($board);
            $entityManager->flush();
            return $student;
        } catch (ORMException | Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param Student $student
     * @return array|null
     */
    public function getData(Student $student): ?array
    {
        $boardInstance = $this->getBoardInstance($student);

        $gradeValues = [];
        foreach ($student->getGrades() as $grade)
        {
            $gradeValues[] = $grade->getValue();
        }

        return [
            'id' => $student->getId(),
            'name' => $student->getFirstName() . ' ' . $student->getLastName(),
            'board' => Board::$typesFlipped[$student->getBoard()->getId()],
            'grades' => implode(',', $gradeValues),
            'average_grade' => (string) $boardInstance->calculateAverageGrade($student),
            'final_result' => $boardInstance->hasPassed($student) ? 'Pass' : 'Fail'
        ];
    }

    /**
     * @param Student $student
     * @return string|null
     */
    public function getReturnType(Student $student): ?string
    {
        $boardInstance = $this->getBoardInstance($student);
        return $boardInstance->getDataReturnType();
    }

    /**
     * @return object|null
     */
    public function getStudent(): ?object
    {
        return $this->getEntityManager()->getRepository(Student::class)->findOneBy(['id' => $_GET['student']]);
    }

    /**
     * @param Student $student
     * @return CSM|CSMB|null
     */
    private function getBoardInstance(Student $student): ?object
    {
        /** @var Board $board */
        $board = $student->getBoard();
        return $this->getBoardInstanceFromType($board->getId());
    }
}