<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int $person_id
 * @property int $guardian_id
 * @property int $student_number
 * @property string $uid
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * * @mixin Builder
 */
class Student extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'students';

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'person_id',
        'guardian_id',
        'student_number',
        'uid',
    ];

    /**
     * @return BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return BelongsTo
     */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }
}
