<?php


class StudentController extends BaseController
{
    /**
     * @return Response
     */
    public function studentAction(): Response
    {
        $studentModel = new StudentModel();
        /** @var Student $student */
        $student = $studentModel->getStudent();

        if ($student instanceof Student)
        {
            $data = $studentModel->getData($student);
            $returnType = $studentModel->getReturnType($student);
            return $this->response($returnType, $data);
        }

        return $this->response(
            Constants::TYPE_ERROR,
            [],
            'Student not found'
        );
    }

    /**
     * @return Response
     */
    public function createStudentAction(): Response
    {
        $studentModel = new StudentModel();
        $student = $studentModel->createStudent();

        if ($student instanceof Student)
        {
            return $this->response(
                Constants::TYPE_JSON,
                [
                    'student_id' => $student->getId()
                ]
            );
        }

        return $this->response(
            Constants::TYPE_ERROR,
            [],
            $student
        );
    }

    /**
     * @return Response
     */
    public function addGradeAction(): Response
    {
        $gradeModel = new GradeModel();
        $grade = $gradeModel->addStudentGrade();

        if ($grade instanceof Grade)
        {
            return $this->response(
                Constants::TYPE_JSON,
                [
                    'grade_id' => $grade->getId(),
                    'student_id' => $grade->getStudent()->getId()
                ]
            );
        }

        return $this->response(
            Constants::TYPE_ERROR,
            [],
            $grade
        );
    }
}