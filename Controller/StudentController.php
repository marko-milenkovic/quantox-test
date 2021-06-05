<?php


class StudentController extends BaseController
{
    public function studentAction()
    {

    }

    public function createStudentAction(): JsonResponse
    {
        $studentModel = new StudentModel();
        $student = $studentModel->createStudent();

        if ($student instanceof Student)
        {
            return $this->json(
                true,
                Constants::SUCCESS_MESSAGE,
                [
                    'student_id' => $student->getId()
                ]
            );
        }

        return $this->json(
            false,
            $student
        );
    }

    public function addGradeAction(): JsonResponse
    {
        $gradeModel = new GradeModel();
        $grade = $gradeModel->addStudentGrade();

        if ($grade instanceof Grade)
        {
            return $this->json(
                true,
                Constants::SUCCESS_MESSAGE,
                [
                    'grade_id' => $grade->getId(),
                    'student_id' => $grade->getStudent()->getId()
                ]
            );
        }

        return $this->json(
            false,
            $grade
        );
    }
}