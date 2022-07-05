<?php

namespace App\Http\Controllers;

use App\Facades\OutputService;
use App\Models\Family;
use App\Repositories\StudentRepository;
use App\Services\StudentService;

class StudentController extends Controller
{
    public function __construct(
        public StudentRepository $studentRepository,
        public StudentService $studentService
    ) {
    }

    public function getByFamily(Family $family)
    {
        $students = $this->studentRepository->getByFamily($family);
        $data = $this->studentService->setPlural($students);
        return OutputService::init($data)->response();
    }
}
