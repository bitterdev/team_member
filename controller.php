<?php

namespace Concrete\Package\TeamMember;

use Bitter\TeamMember\Provider\ServiceProvider;
use Concrete\Core\Entity\Package as PackageEntity;
use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected string $pkgHandle = 'team_member';
    protected string $pkgVersion = '0.0.1';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/TeamMember' => 'Bitter\TeamMember',
    ];

    public function getPackageDescription(): string
    {
        return t('Easily showcase your team members with editable profiles including photo, role, contact details, and social links.');
    }

    public function getPackageName(): string
    {
        return t('Team Member ');
    }

    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        /** @noinspection PhpUnhandledExceptionInspection */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}