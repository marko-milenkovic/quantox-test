<?php


use Doctrine\ORM\ORMException;

class StudentModel extends Database
{
    public function createStudent()
    {
        try {
            $entityManager = $this->getEntityManager();

            if (!isset($_POST['board']))
            {
                return 'Board is not set';
            }
            elseif (isset($_POST['board']) && !in_array(strtoupper($_POST['board']), Board::$types))
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
}