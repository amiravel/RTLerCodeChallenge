<?php

namespace Database\Seeders;

use App\Repositories\Contracts\WebServiceRepositoryInterface;
use Illuminate\Database\Seeder;

class WebServiceSeeder extends Seeder
{
    private WebServiceRepositoryInterface $repository;

    public function __construct(
        WebServiceRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->repository->firstOrCreate(['name' => 'first'], ['name' => 'first']);
    }
}
