<?php

namespace App\DataFixtures\Processor;

use App\Entity\Comment;
use App\Enum\CommentStatusEnum;
use Fidry\AliceDataFixtures\ProcessorInterface;

class CommentProcessor implements ProcessorInterface
{
    public function preProcess(string $id, object $object): void
    {
        if ($object instanceof Comment) {
            $object->setStatus(CommentStatusEnum::APPROVED);
        }
    }

    public function postProcess(string $id, object $object): void
    {
    }
}