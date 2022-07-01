<?php

namespace App\Pages\DashboardPage;

use Arpite\Page\Page;

class DashboardPage extends Page
{
    public function route(): string
    {
        return "/";
    }

    public function title(): string
    {
        return "Dashboard";
    }

    public function nodes(): array
    {
        return [];
    }
}
