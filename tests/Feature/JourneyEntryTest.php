<?php

namespace Tests\Feature;

use App\Models\JourneyEntry;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JourneyEntryTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_narrative_accessor_returns_true_when_learned_and_result_present(): void
    {
        $entry = new JourneyEntry([
            'learned' => 'Belajar indexing query database',
            'result' => 'Query time berkurang hingga 50%',
        ]);

        $this->assertTrue($entry->has_narrative);
    }

    public function test_has_narrative_accessor_returns_false_when_narrative_is_missing_or_empty(): void
    {
        $entry1 = new JourneyEntry([
            'learned' => null,
            'result' => null,
        ]);
        $this->assertFalse($entry1->has_narrative);

        $entry2 = new JourneyEntry([
            'learned' => 'Hanya ada learned',
            'result' => '',
        ]);
        $this->assertFalse($entry2->has_narrative);

        $entry3 = new JourneyEntry([
            'learned' => '   ',
            'result' => 'Ada result tapi learned spasi',
        ]);
        $this->assertFalse($entry3->has_narrative);
    }

    public function test_credential_type_scopes(): void
    {
        JourneyEntry::create([
            'course_name' => 'Course 1',
            'credential_type' => 'course',
            'learned' => 'Learned 1',
            'result' => 'Result 1',
            'status' => 'published',
        ]);

        JourneyEntry::create([
            'course_name' => 'Cert 1',
            'credential_type' => 'certification',
            'learned' => null,
            'result' => null,
            'status' => 'published',
        ]);

        JourneyEntry::create([
            'course_name' => 'Diploma 1',
            'credential_type' => 'diploma',
            'learned' => null,
            'result' => null,
            'status' => 'published',
        ]);

        $this->assertEquals(1, JourneyEntry::courses()->count());
        $this->assertEquals(1, JourneyEntry::certifications()->count());
        $this->assertEquals(1, JourneyEntry::diplomas()->count());
    }
}
