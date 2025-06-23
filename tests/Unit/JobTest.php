<?php

use App\Models\Employer;
use App\Models\Job;

test('it belongs to an employer', function () {

    // AAA

    //--> Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id
    ]);

    //--> Act
    $status = $job->employer->is($employer);

    //--> Assert
    expect($status)->toBeTrue();
});
