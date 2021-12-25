<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getSuccessMessage($message)
    {
        session()->flash('message', $message);
        session()->flash('key', 'success');
    }
    public function getErrorMessage($message)
    {
        session()->flash('message', $message);
        session()->flash('key', 'warning');
    }
}
