<?php

namespace App\Http\Controllers;

use App\Facades\OutputService;
use App\Models\Guardian;
use App\Repositories\StudentRepository;
use App\Services\StudentService;

class StudentController extends Controller
{
    public function __construct(
        public StudentRepository $studentRepository,
        public StudentService $studentService
    ) {
    }

    public function getByGuardian(Guardian $guardian)
    {
        $students = $this->studentRepository->getByGuardian($guardian);
        $data = $this->studentService->setPlural($students);
        return OutputService::init($data)->response();
    }
}
