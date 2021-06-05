<?php


use Doctrine\ORM\ORMException;

class GradeModel extends Database
{
    public function addStudentGrade()
    {
        try {
            $entityManager = $this->getEntityManager();
            $student = $entityManager->getRepository(Student::class)->findOneBy(['id' => $_POST['student_id']]);

            if (!$student instanceof Student)
            {
                return 'Student not found';
            }

            $grade = new Grade();
            $grade->setStudent($student);
            $grade->setValue($_POST['grade_value']);

            $entityManager->persist($grade);
            $entityManager->flush();

            return $grade;
        } catch (ORMException | Exception $exception) {
            return $exception->getMessage();
        }
    }
}