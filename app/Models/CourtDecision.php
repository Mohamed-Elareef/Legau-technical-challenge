<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Judgement
 * @package App
 * @property Court $court
 * @property int id
 * @property string date
 * @property string process_number
 * @property int $court_id
 * @property string|null $summary
 * @property string|null $full_text
 * @property string|null $decision
 * @property Tag[] $tags
 * @property string|null $argumentation_parties
 * @property string|null $argumentation_court
 * @property string|null $redactor
 * @property string|null $court_report
 *
 */
class CourtDecision extends Model
{
    protected $table = 'court_decisions_court_decisions';

    protected $fillable = ['summary',  'full_text',  'court_report',  'facts',  'argumentation_parties',  'argumentation_court',  'decision','court_id', 'process_number', 'date', 'redactor', 'source'];

    public function court() {
        return $this->belongsTo('App\Models\Court');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'court_decisions_tags_to_court_decisions', 'judgement_id', 'judgement_tag_id');
    }

    public function scopeByCourts(Builder $query, array $courts): Builder
    {
        return $query->whereIn('court_id', $courts);
    }

    public function scopeFromDate(Builder $query, string $fromDate): Builder
    {
        return $query->where('date', '>=', $fromDate);
    }

    public function scopeToDate(Builder $query, string $toDate): Builder
    {
        return $query->where('date', '<=', $toDate);
    }

}
