<?php

namespace App\Http\Controllers;

use App\Facades\OutputService;
use App\Http\Requests\Family\UpdateRequest;
use App\Models\Family;
use App\Repositories\FamilyRepository;
use App\Repositories\PersonRepository;
use App\Services\FamilyService;

class FamilyController extends Controller
{
    public function __construct(
        public FamilyRepository $familyRepository,
        public PersonRepository $personRepository,
        public FamilyService $familyService
    ) {
    }

    public function show(Family $family)
    {
        $data = $this->familyService->setSingle($family);
        return OutputService::init($data)->response();
    }

    public function update(UpdateRequest $request, Family $family)
    {
        $personData = $request->only('name', 'surname', 'phone', 'birth_date');
        $familyData = $request->only('password');

        $this->familyRepository->update($family, $familyData);
        $this->personRepository->updateFamily($family, $personData);

        return OutputService::init(message: 'Successfully Updated')->response();
    }
}
