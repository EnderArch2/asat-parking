<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Transaction;
use Carbon\Carbon;

// Find the most recent transaction
$transaction = Transaction::latest('id')->first();
if ($transaction) {
    echo "Found transaction: {$transaction->no_tiket}\n";
    // Set the masuk time to 6 hours ago
    $oldMasuk = $transaction->masuk;
    $newMasuk = Carbon::now()->subHours(6);
    $transaction->update(['masuk' => $newMasuk]);
    echo "Updated masuk from: {$oldMasuk} to: {$transaction->masuk}\n";
    echo "Current masuk time: " . $transaction->masuk->format('Y-m-d H:i:s') . "\n";
    echo "Now time: " . Carbon::now()->format('Y-m-d H:i:s') . "\n";
    echo "Difference in minutes: " . $transaction->masuk->diffInMinutes(Carbon::now()) . "\n";
} else {
    echo "No transaction found\n";
}
