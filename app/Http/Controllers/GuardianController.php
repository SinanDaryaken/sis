<?php

namespace App\Http\Controllers;

use App\Facades\OutputService;
use App\Http\Requests\Guardian\UpdateRequest;
use App\Models\Guardian;
use App\Repositories\GuardianRepository;
use App\Repositories\PersonRepository;
use App\Services\GuardianService;

class GuardianController extends Controller
{
    public function __construct(
        public GuardianRepository $guardianRepository,
        public PersonRepository $personRepository,
        public GuardianService $guardianService
    ) {
    }

    public function show(Guardian $guardian)
    {
        $data = $this->guardianService->setSingle($guardian);
        return OutputService::init($data)->response();
    }

    public function update(UpdateRequest $request, Guardian $guardian)
    {
        $personData = $request->only('name', 'surname', 'phone', 'birth_date');
        $guardianData = $request->only('password');

        $this->guardianRepository->update($guardian, $guardianData);
        $this->personRepository->updateGuardian($guardian, $personData);

        return OutputService::init(message: 'Successfully Updated')->response();
    }
}
