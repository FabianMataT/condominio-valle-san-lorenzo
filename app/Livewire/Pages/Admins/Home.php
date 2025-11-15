<?php

namespace App\Livewire\Pages\Admins;

use App\Models\Form;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public ?User $user = null;
    public ?array $forms = [];
    public string $selectedTab = '';
    public array $availableTabs = [];
    public $unreadNotifications = null;
    public $modalDeletConf = false;
    public $notification = null;

    public function mount()
    {
        $this->user = Auth::user();
        $this->forms = Form::where('hide', false)->select('id', 'name', 'description', 'img_url', 'image_path')->take(3)->get()->toArray();
        $this->availableTabs = ['notifications-tab'];
        $this->selectedTab = $this->availableTabs[0];
        $this->unreadNotifications = $this->user->unreadNotifications;
    }

    public function render()
    {
        // $this->user->unreadNotifications->markAsRead();

        return view('livewire.pages.admins.home', [
            'unreadCustomerNotifications' => $this->unreadNotifications,
        ]);
    }
    

    public function notifications()
    {
        $notifications = $this->user->notifications()
            ->whereNotNull('read_at')
            ->get();

        return $notifications;
    }

    public function deleteConf($notificationId): void
    {
        $this->notification = $this->user->notifications()->find($notificationId);
        $this->modalDeletConf = true;
    }

    public function delete(): void
    {
        if ($this->notification) {
            $this->notification->delete();
            $this->notification = null;
            $this->modalDeletConf = false;
            $this->success(__('Deleted successfully!'));
        }
    }
}
