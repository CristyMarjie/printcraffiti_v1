<?php
namespace App\Traits;

use App\Mail\NoticeMail;
use App\Models\Notice;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use NumberFormatter;

trait NoticeTrait
{

    public function firstNotice($contract, $dompdf,$data)
    {
        $notice = Notice::create([
            'tenant_id' => $contract->tenant->additional->id,
            'notice_type' => $data->notice_type,
            'notice_details' => [
                    'issuance_date' => $data['issuance_date'],
                    'balance' => $data['balance'],
                    'deadline' => $data['deadline'],
                    'soa_number' => $data['soa_number'],
                    'prepared_by' => $data['collection_officer'],
                    'contact_number' => $data['contact_number']
                ]
        ]);

        $ownerPos = explode(',',$contract->owner);

        $compact =  [
            'issuance' => $data['issuance_date'],
            'owner' => $ownerPos[0] ?? '',
            'position' => $ownerPos[1] ?? '',
            'lesse' => $contract->lessee,
            'location' => $contract->location,
            'address' => $contract->address,
            'balance'=> number_format($data['balance'],2,'.',','),
            'soaNumber' => $data['soa_number'],
            'deadline' =>  $data['deadline'],
            'preparedBy' =>  $data['collection_officer'],
            'contactNumber' => $data['contact_number']
        ];

        $dompdf->loadHtml(view('pages.notices.letters.first_notice',$compact+['withLogo' => true]));

        $dompdf->render();

        $path = "attachments/notice/".$data['issuance_date']."_".$ownerPos[0]."_".$notice->id.".pdf";

        $notice->update(['path' => $path]);

        Storage::put($path,$dompdf->output());
        Mail::to($contract->tenant->additional->user->email)->queue(new NoticeMail($path,'First Notice Of Default Payment(30 Days)',$compact,$data->notice_type));

        return $notice;

    }

    public function secondNotice($contract,$dompdf,$data)
    {
        $notice = Notice::create([
            'tenant_id' => $contract->tenant->additional->id,
            'notice_type' => $data->notice_type,
            'notice_details' => [
                    'issuance_date' => $data['issuance_date'],
                    'balance' => $data['balance'],
                    'notice_from' => DateTime::createFromFormat('!m', $data['notice_from'])->format('F'),
                    'notice_to' => DateTime::createFromFormat('!m', $data['notice_to'])->format('F'),
                    'deadline' => $data['deadline'],
                    'soa_number' => $data['soa_number'],
                    'prepared_by' => $data['collection_officer'],
                    'contact_number' => $data['contact_number']
                ]
        ]);

        $ownerPos = explode(',',$contract->owner);

        $compact =  [
            'issuance' => $data['issuance_date'],
            'owner' => $ownerPos[0] ?? '',
            'position' => $ownerPos[1] ?? '',
            'lesse' => $contract->lessee,
            'location' => $contract->location,
            'address' => $contract->address,
            'balance'=> number_format($data['balance'],2,'.',','),
            'notice_from' => DateTime::createFromFormat('!m', $data['notice_from'])->format('F'),
            'notice_to' => DateTime::createFromFormat('!m', $data['notice_to'])->format('F'),
            'soaNumber' => $data['soa_number'],
            'deadline' =>  $data['deadline'],
            'preparedBy' =>  $data['collection_officer'],
            'contactNumber' => $data['contact_number']
        ];

        $dompdf->loadHtml(view('pages.notices.letters.second_notice',$compact+['withLogo' => true]));

        $dompdf->render();

        $path = "attachments/notice/".$data['issuance_date']."_".$ownerPos[0]."_".$notice->id.".pdf";

        $notice->update(['path' => $path]);

        Storage::put($path,$dompdf->output());

        Mail::to($contract->tenant->additional->user->email)->queue(new NoticeMail($path,'Second Notice Of Default In Payment(60 Days)',$compact,$data->notice_type));

        return $notice;
    }

    public function thirdNotice($contract,$dompdf,$data)
    {
        $notice = Notice::create([
            'tenant_id' => $contract->tenant->additional->id,
            'notice_type' => $data->notice_type,
            'notice_details' => [
                    'issuance_date' => $data['issuance_date'],
                    'balance' => $data['balance'],
                    'overdue' => $data['deadline'],
                    'prepared_by' => $data['collection_officer']
                ]
        ]);

        $ownerPos = explode(',',$contract->owner);

        $compact =  [
            'issuance' => $data['issuance_date'],
            'owner' => $ownerPos[0] ?? '',
            'position' => $ownerPos[1] ?? '',
            'lesse' => $contract->lessee,
            'location' => $contract->location,
            'address' => $contract->address,
            'balanceAmount'=> number_format($data['balance'],2,'.',','),
            'balance' => $this->numberToText($data['balance']),
            'deadline' =>  $data['deadline'],
            'preparedBy' =>  $data['collection_officer']
        ];

        $dompdf->loadHtml(view('pages.notices.letters.third_notice',$compact));

        $dompdf->render();

        $path = "attachments/notice/".$data['issuance_date']."_".$ownerPos[0]."_".$notice->id.".pdf";

        $notice->update(['path' => $path]);

        Storage::put($path,$dompdf->output());

        Mail::to($contract->tenant->additional->user->email)->queue(new NoticeMail($path,'Pre-termination Of Lease',$compact,$data->notice_type));

        return $notice;
    }

    public function takeoverNotice($contract,$dompdf,$data)
    {
        $notice = Notice::create([
            'tenant_id' => $contract->tenant->additional->id,
            'notice_type' => $data->notice_type,
            'notice_details' => [
                    'issuance_date' => $data['issuance_date'],
                    'balance' => $data['balance'],
                    'overdue' => $data['deadline'],
                    'prepared_by' => $data['collection_officer'],
                    'takeover_date' => $data['takeover_date']
                ]
        ]);

        $ownerPos = explode(',',$contract->owner);

        $compact =  [
            'issuance' => $data['issuance_date'],
            'owner' => $ownerPos[0] ?? '',
            'position' => $ownerPos[1] ?? '',
            'lesse' => $contract->lessee,
            'location' => $contract->location,
            'address' => $contract->address,
            'balanceAmount'=> number_format($data['balance'],2,'.',','),
            'balance' => $this->numberToText($data['balance']),
            'deadline' =>  $data['deadline'],
            'takeover_date' => $data['takeover_date'],
            'preparedBy' =>  $data['collection_officer'],
        ];

        $dompdf->loadHtml(view('pages.notices.letters.takeover_notice',$compact));

        $dompdf->render();

        $path = "attachments/notice/".$data['issuance_date']."_".$ownerPos[0]."_".$notice->id.".pdf";

        $notice->update(['path' => $path]);

        Storage::put($path,$dompdf->output());

        Mail::to($contract->tenant->additional->user->email)->queue(new NoticeMail($path,'Takeover Noitce',$compact,$data->notice_type));

        return $notice;
    }


    private function numberToText($number) {
        $digit = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $numberParts = explode('.', (string) round($number,3));
        $formatedNumber =  $digit->format($numberParts[0]);
        if (isset($numberParts[1])){
          $formatedNumber .= ' and ' . $digit->format($numberParts[1]);
        }
        return ucwords($formatedNumber).' Pesos';
      }

}
