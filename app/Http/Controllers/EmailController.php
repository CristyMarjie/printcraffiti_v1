<?php

namespace App\Http\Controllers;

use App\Interfaces\EmailInterface;
use App\Traits\ResponseApi;

class EmailController extends Controller
{
    use ResponseApi;


    protected $emailInterface;

    public function __construct(EmailInterface $emailInterface)
    {
        $this->emailInterface = $emailInterface;
    }

    public function getEmails()
    {
        return $this->emailInterface->getEmails();
    }

    public function emailDetails($email_id)
    {
        return $this->emailInterface->emailDetails($email_id);
    }
}
