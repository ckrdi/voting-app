<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';

    public $statusCount;

    protected $queryString = [
        'status'
    ];

    public function mount()
    {
        $this->statusCount = Status::getCount();

        if (Route::currentRouteName() === 'show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

        return redirect(route('index', [
            'status' => $this->status
        ]));
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
