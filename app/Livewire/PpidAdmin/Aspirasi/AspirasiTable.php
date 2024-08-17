<?php

namespace App\Livewire\PpidAdmin\Aspirasi;

use App\Models\StatusPpid;
use App\Models\RequestPpid;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use App\Livewire\Module\BaseTable;
use App\Models\PpidAspirasiPengaduan;
use App\Livewire\Module\Trait\Notification;

class AspirasiTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Aspirasi dan Pengaduan Table";
    public $status;
    public $c = 'ada';
    protected array $permissions = [
        'create' => '',
        'edit' => 'request edit',
        'delete' => 'request delete',
    ];

    protected array $modals = [
        'create' => 'aspirasi-form-modal',
        'edit' => 'aspirasi-form-modal',
    ];

    public function render()
    {
        return view('pages.admin.ppid.ppid-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        // return RequestPpid::where('status_ppid', '1')->search($this->search)
        //     ->orderBy($this->sort_by, $this->sort_direction)
        //     ->paginate($this->perPage);
        return PpidAspirasiPengaduan::whereHas('status',  function ($query) {
            $query->where('progress', $this->status);
        })->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Nama",
                "query" => "status.user.name",
                "sort" => true,
            ],
            [
                "label" => "Progress",
                "query" => "status.progress",
                "sort" => true,
            ],
            [
                "label" => "Judul",
                "query" => "judul",
                "sort" => true,
            ],
            [
                "label" => "Uraian",
                "query" => "status.uraian",
                "sort" => true,
            ],

        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        $search = PpidAspirasiPengaduan::find($id)->first()->status_ppid;

        PpidAspirasiPengaduan::destroy($id);
        StatusPpid::destroy($search);
        $this->toast(
            message: "Aspirasi Data Removed",
        );
    }
}
