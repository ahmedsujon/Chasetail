<?php

namespace App\Livewire\Admin\MessagingLogs;

use Livewire\Component;
use Twilio\Rest\Client;

class LogsComponent extends Component
{
    public $logs = [];

    public function mount()
    {
        $this->fetchLogs();
    }

    public function fetchLogs()
    {
        $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $messages = $client->messages->read([], 20);

        // Convert complex objects into a simple array
        $this->logs = array_map(function ($message) {
            return [
                'dateSent' => $message->dateSent ? $message->dateSent->format('Y-m-d H:i:s') : null,
                'from' => $message->from,
                'to' => $message->to,
                'status' => $message->status,
                'body' => $message->body,
            ];
        }, $messages);
    }

    public function render()
    {
        // Fetch logs here if needed, or just pass the existing logs
        return view('livewire.admin.messaging-logs.logs-component', ['logs' => $this->logs])->layout('livewire.admin.layouts.base');
    }
}
