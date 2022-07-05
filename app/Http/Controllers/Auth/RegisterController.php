<?php

namespace App\Http\Controllers\Auth;

use App\Facades\OutputService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Guardian;
use App\Repositories\GuardianRepository;
use App\Repositories\PersonRepository;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(
        public GuardianRepository $guardianRepository,
        public StudentRepository $studentRepository,
        public PersonRepository $personRepository
    ) {
    }

    public function register(RegisterRequest $request)
    {
        $personData = $request->only('name', 'surname');
        $guardianData = $request->only('email', 'password');
        $uid = $request->get('uid');

        $person = $this->personRepository->store($personData);
        $guardian = $this->guardianRepository->register($person, $guardianData);
        $this->studentRepository->updateGuardian($guardian, $uid);

        $this->guard()->login($guardian);

        return OutputService::init($guardian, 'Registration Successful')->response();
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function create(array $data)
    {
        return Guardian::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
