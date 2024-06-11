<?php

namespace App\Livewire\PpidAdmin;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\RequestPpid;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class RequestTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Informasi Request Table";

    protected array $permissions = [
        'create' => 'request create',
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
        return RequestPpid::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
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
        dd($id);
        parent::delete($id);
        RequestPpid::destroy($id);
        $this->toast(
            message: "Informasi Kouta Removed",
        );
    }
}
