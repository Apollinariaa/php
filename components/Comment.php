<?php

namespace classes;

class Comment
{
    public function __construct(public User $user, public string $comment)
    {
    }
}
