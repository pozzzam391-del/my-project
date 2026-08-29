<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['title' => 'Total Users', 'value' => '1,248', 'change' => '+12%', 'is_positive' => true],
            ['title' => 'Active Projects', 'value' => '38', 'change' => '+4%', 'is_positive' => true],
            ['title' => 'System Load', 'value' => '24%', 'change' => '-2%', 'is_positive' => false],
        ];

        return view('dashboard', compact('stats'));
    }
}
