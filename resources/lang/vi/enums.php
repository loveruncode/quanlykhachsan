<?php

use App\Enum\NotifyStatus;


return [
    NotifyStatus::class => [
        NotifyStatus::Draft->value => 'Chưa gửi',
        NotifyStatus::Published->value => 'Gửi Rồi'
    ]

];
