<?php

namespace App\Http\Controllers\Auth;

use App\Facades\OutputService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Family;
use App\Repositories\FamilyRepository;
use App\Repositories\PersonRepository;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(
        public FamilyRepository $familyRepository,
        public StudentRepository $studentRepository,
        public PersonRepository $personRepository
    ) {
    }

    public function register(RegisterRequest $request)
    {
        $personData = $request->only('name', 'surname');
        $familyData = $request->only('email', 'password');
        $uid = $request->get('uid');

        $person = $this->personRepository->store($personData);
        $family = $this->familyRepository->register($person, $familyData);
        $this->studentRepository->updateFamily($family, $uid);

        $this->guard()->login($family);

        return OutputService::init($family, 'Registration Successful')->response();
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function create(array $data)
    {
        return Family::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
