<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send()
    {
        $title = "Thư liên hệ";
        $hoten = "Nguyễn Thị Hoài";
        $noidung = "Liên hệ với công ty xin làm thực tập viên";

        Mail::mailer()
            ->to('hoainguyen07122004@gmail.com')
            ->send(new SendMail($title, $noidung, $hoten));

        return "Gửi mail thành công";
    }
}