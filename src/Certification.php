<?php
namespace L41rx\FE3H;
use L41rx\FE3H\Enumerations\CertificationTier;

class Certification
{
    public string $name;
    public string $slug;
    public string $short_name;
    public CertificationTier $tier;
    public array $stats_min;            // key: Stat  | val: int
    public array $stats_growth;         // key: Stat  | val: int
    public array $stats_bonus;          // key: Stat  | val: int
    public array $proficiencies;        // key: N/A   | val: Skill
    public array $skill_requirements;   // key: Skill | val: SkillRank
    public string $notes;
}
