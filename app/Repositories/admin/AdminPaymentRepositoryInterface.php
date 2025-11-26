<?php

namespace App\Repositories\admin;

interface AdminPaymentRepositoryInterface{
    public function submitPeyment($validatedData, $paymentId);
}
