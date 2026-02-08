<?php

use App\Models\User;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'demiandesilva47@gmail.com';
$user = User::where('email', $email)->first();

echo "Checking for email: $email\n";
if ($user) {
    echo "STATUS: FOUND\n";
    echo "ID: " . $user->id . "\n";
    echo "Role: " . $user->role . "\n";
} else {
    echo "STATUS: NOT FOUND\n";
}

$count = User::count();
echo "Total Users: $count\n";

echo "All Emails:\n";
foreach (User::all() as $u) {
    echo "- " . $u->email . " (ID: $u->id)\n";
}
