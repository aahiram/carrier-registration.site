<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'contract_name', 'file_path', 'contract_details'];

    /**
     * Get the user that owns the contract.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
