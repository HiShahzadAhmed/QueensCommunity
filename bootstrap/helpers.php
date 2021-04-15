<?php
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




    function setting()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    function sendMail($data)
    {
        if (array_key_exists("pdf",$data)) {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject'])->attachData($data['pdf']->output(), "invoice.pdf");
            });
        }else {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject']);
            });
        }
    }


    function uploadAvatar($file, $path){
        $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
        $file->move($path,$name);
        return $path.'/'.$name;
    }

?>
