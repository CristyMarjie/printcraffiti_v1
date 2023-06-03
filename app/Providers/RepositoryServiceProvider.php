<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\EmailInterface;

use App\Repositories\AdminRepository;
use App\Repositories\EmailRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(ContractInterface::class, ContractRepository::class);
        $this->app->bind(AnnouncementInterface::class, AnnouncementRepository::class);
        $this->app->bind(MallDirectoryInterface::class, MallDirectoryRepository::class);
        $this->app->bind(EmailInterface::class, EmailRepository::class);
    }
}
