<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "Attempting to create user...\n";
    $user = User::create([
        'name' => 'Demian de silva',
        'email' => 'demiandesilva47@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    echo "User created successfully! ID: " . $user->id . "\n";
} catch (\Exception $e) {
    echo "Error creating user: " . $e->getMessage() . "\n";
    if ($e instanceof \Illuminate\Database\QueryException) {
        echo "SQL: " . $e->getSql() . "\n";
    }
}
