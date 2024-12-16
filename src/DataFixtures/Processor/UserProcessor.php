<?php

namespace App\DataFixtures\Processor;

use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use Fidry\AliceDataFixtures\ProcessorInterface;

class UserProcessor implements ProcessorInterface
{
    public function preProcess(string $id, object $object): void
    {
        if ($object instanceof User) {
            $object->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        }
    }

    public function postProcess(string $id, object $object): void
    {
    }
}