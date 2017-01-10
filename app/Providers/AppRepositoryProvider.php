<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppRepositoryProvider extends ServiceProvider  {

    /**
     * Register all repositories.
     *
     * @author	Andrea Marco Sartori
     * @return	void
     */
    public function register()
    {
        $this->registerPostRepository();
    }


    public function registerPostRepository()
    {
        //
    }
}