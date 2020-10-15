<?php

namespace App\Models\Status;

use App\Helpers\OrderStatus\Accepting;
use App\Helpers\OrderStatus\Completed;
use App\Helpers\OrderStatus\Consideration;
use App\Helpers\OrderStatus\Published;
use App\Helpers\OrderStatus\Waiting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const PUBLISHED = 'published';
    public const ACCEPTING = 'accepting';
    public const CONSIDERATION = 'consideration';
    public const WAITING = 'waiting';
    public const COMPLETED = 'completed';
}
