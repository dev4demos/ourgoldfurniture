<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel as ArtisanConsole;
use Ourgold\Furniture\Seeders\DBSeeder;

class FurnitureSeedCommand extends Command
{
    /**
     * {@inheritdoc }
     */
    protected $signature = 'furniture:seed';

    /**
     * {@inheritdoc }
     */
    protected $description = 'The furniture package seed command';

    /**
     * {@inheritdoc }
     */
    public function handle()
    {
        $this->line('Package created using Bootpack.');

        foreach ([
            DBSeeder::class
        ] as $target) {
            $this->info('Seeding:: ' . $target);
            $this->getLaravel()->make(ArtisanConsole::class)
                ->call('db:seed', ['--force' => '', '--class' => $target]);
            $this->info('Seeded:: ' . $target);
        }
    }
}
