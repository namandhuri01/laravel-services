<?php

namespace App\Services;

use Log;
use App\Models\Task;


class TaskServices 
{
    public function storeTask($data): array
    {
        try {
            $data['user_id'] = auth()->user()->id;
            \Log::info($data);
            $task =  Task::create($data);
            Activity::create([
                'end_point' => 'task-create',
                'user_id' => auth()->user()->id,
                'request_data' => $data,
                'ip_address' => '127.0.0.0',
                'request_from' => 'browser',
            ]);
        } catch(Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}
