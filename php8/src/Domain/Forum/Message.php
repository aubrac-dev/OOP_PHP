<?php

declare(strict_types=1);

namespace App\Domain\Forum;

use App\Domain\User\User;

class Message
{
    private $content;
    private $author;

    public function __construct(User $author, string $content)
    {
        $this->author = $author;
        $this->content = $content;
    }
}
