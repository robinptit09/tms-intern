<?php

namespace App\Services;

use App\Interfaces\OptionRepositoryInterface as OptionRepository;

class OptionService extends BaseService
{
    protected $optionRepository;

    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }


}