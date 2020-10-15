<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public const SUBMITTED = 'submitted';
    public const ACCEPTED = 'accepted';
    public const COMPLETED = 'completed';
    public const REJECTED = 'rejected';
}
