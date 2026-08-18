<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certs = [
            [
                'name' => 'Laravel Professional Certification',
                'issuing_organization' => 'Laravel',
                'issue_date' => '2024-06-15',
                'expiry_date' => null,
                'credential_id' => 'LAR-2024-001',
                'credential_url' => 'https://laravel.com/certification/001',
                'is_published' => true,
                'order_column' => 1,
            ],
            [
                'name' => 'PHP 8 Professional Developer',
                'issuing_organization' => 'PHP Institute',
                'issue_date' => '2024-03-20',
                'expiry_date' => '2027-03-20',
                'credential_id' => 'PHP-2024-002',
                'credential_url' => 'https://php.net/certification/002',
                'is_published' => true,
                'order_column' => 2,
            ],
            [
                'name' => 'MySQL Database Administration',
                'issuing_organization' => 'Oracle',
                'issue_date' => '2024-01-10',
                'expiry_date' => '2027-01-10',
                'credential_id' => 'MYSQL-2024-003',
                'credential_url' => 'https://oracle.com/certification/003',
                'is_published' => true,
                'order_column' => 3,
            ],
        ];

        foreach ($certs as $cert) {
            Certification::create($cert);
        }
    }
}
