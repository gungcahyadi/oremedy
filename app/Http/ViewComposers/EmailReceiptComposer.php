<?php namespace App\Http\ViewComposers;

use App\Email;
use Illuminate\Contracts\View\View;

class EmailReceiptComposer {
    public function compose(View $view)
    {
        $emails = Email::where('receipt',1)->get();
        $email = '';
        foreach ($emails as $em) {
            $email .= $em->email.',';
        }
        $email = rtrim($email, ',');
        $view->with('emailcomposer', $email);
    }
}
