<?php

namespace App\Interfaces;

interface EmailInterface
{
    public function getEmails();

    public function emailDetails($email_id);
}
