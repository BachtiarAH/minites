<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Process;

class Service
{
    public function async()
    {
        echo "somthing";
        $process = Process::timeout(120)->start('bash import.sh');

        while ($process->running()) {
            echo $process->latestOutput();
            echo $process->latestErrorOutput();
            echo "proses";
            // sleep(1);
        }
    }
}
