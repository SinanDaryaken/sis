<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property-read int $id
 * @property string $name
 * @property string $surname
 * @property Carbon $birth_date
 * @property string $phone
 * @property string $short_name
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * * @mixin Builder
 */
class Person extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'people';

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'birth_date',
        'phone',
    ];

    /**
     * @return HasOne
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    /**
     * @return HasOne
     */
    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    public function shortName(): Attribute
    {
        $return = mb_substr($this->name, 0, 1) . mb_substr($this->surname, 0, 1);

        return new Attribute(
            get: fn($value) => strtoupper($return),
        );
    }
}
