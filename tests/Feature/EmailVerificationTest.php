<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Features;

it('can render email verification screen', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $response = $this->actingAs($user)->get('/email/verify');

    $response->assertStatus(200);
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');

it('can verify email', function () {
    Event::fake();

    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);

    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');

it('can not verify email with invalid hash', function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user->fresh())->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
})->skip(function () {
    return ! Features::enabled(Features::emailVerification());
}, 'Email verification not enabled.');
