<?php

namespace App\Livewire\PpidAdmin\Aspirasi;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\PpidAspirasiPengaduan;
use App\Models\RequestPpid;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class AspirasiTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Informasi Request Table";
    public $status;
    protected array $permissions = [
        'create' => '',
        'edit' => 'request edit',
        'delete' => 'request delete',
    ];

    protected array $modals = [
        'create' => 'request-form-modal',
        'edit' => 'request-form-modal',
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
                "label" => "Pekerjaan",
                "query" => "pekerjaan",
                "sort" => true,
            ],
            [
                "label" => "Kategori Pemohon",
                "query" => "kategori_pemohon",
                "sort" => true,
            ],
            [
                "label" => "Rincian Informasi",
                "query" => "rincian_informasi",
                "sort" => true,
            ],
        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        RequestPpid::destroy($id);
        $this->toast(
            message: "Request Data Removed",
        );
    }
}
