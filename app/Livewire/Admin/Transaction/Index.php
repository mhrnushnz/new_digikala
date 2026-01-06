<?php

namespace App\Livewire\Admin\Transaction;

use App\Models\PeymentMethod;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $transactions = PeymentMethod::query()->with( 'order')->latest()->paginate(10);
        return view('livewire.admin.transaction.index', compact('transactions'))->layout('layouts.admin.app');
    }
}
