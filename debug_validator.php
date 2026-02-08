<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'demiandesilva47@gmail.com';
$data = ['email' => $email];
$rules = ['email' => 'unique:users'];

$validator = Validator::make($data, $rules);

echo "Testing validation for: $email\n";
if ($validator->fails()) {
    echo "VALIDATION FAILED:\n";
    foreach ($validator->errors()->all() as $error) {
        echo "- $error\n";
    }
} else {
    echo "VALIDATION PASSED\n";
}
