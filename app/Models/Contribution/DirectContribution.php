<?php

namespace Muserpol\Models\Contribution;

use Illuminate\Database\Eloquent\Model;

class DirectContribution extends Model
{
    public function contribution_processes()
    {
        return $this->hasMany("Muserpol\Models\Contribution\ContributionProcess");
    }
    public function affiliate()
    {
        return $this->belongsTo("Muserpol\Models\Affiliate");
    }
    public function city()
    {
        return $this->belongsTo("Muserpol\Models\City");
    }
    public function contributor_type()
    {
        return $this->belongsTo("Muserpol\Models\Kinship");
    }
    public function procedure_state()
    {
        return $this->belongsTo("Muserpol\Models\ProcedureState");
    }
    public function procedure_modality()
    {
        return $this->belongsTo("Muserpol\Models\ProcedureModality");
    }
}
