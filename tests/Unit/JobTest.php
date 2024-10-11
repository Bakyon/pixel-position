<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // Act
    $result_employer = $job->employer;

    // Assert
    expect($result_employer->is($employer))->toBeTrue();
});

it('can have tags', function () {
    // AAA
    // Arrange
    $job = Job::factory()->create();

    // Act
    $job->tag('Front-end developer');

    // Assert
    expect($job->tags)->toHaveCount(1);
});
