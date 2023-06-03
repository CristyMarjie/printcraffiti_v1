<?php

namespace App\Repositories;

use App\Interfaces\EmailInterface;
use App\Models\TenantContactUs;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Auth;

class EmailRepository implements EmailInterface
{
    use ResponseApi;

    public function getEmails()
    {
        $emails = TenantContactUs::with('request_submitted')->where('intended_to_id',Auth::user()->role_id);
        return $emails->get();
    }

    public function emailDetails($email_id)
    {
        return view('pages.partials.notifications.email_details',['details' =>TenantContactUs::with('request_submitted.user')->findOrFail($email_id)]);
    }
}
