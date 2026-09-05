<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // -------------------------------------------------------------
        // 🏢 1. CREATE BUILDINGS (Teacher's Exact Structure)
        // -------------------------------------------------------------
        DB::table('related_buildings')->insert([
            ['id' => 1, 'name' => 'Embassy of Japan in Damascus', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Japan Center for Academic Cooperation in Aleppo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Japanese Literature Department at Damascus University', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------------
        // 📂 2. CREATE DEPARTMENTS (Teacher's Exact Structure)
        // -------------------------------------------------------------
        DB::table('departments')->insert([
            ['department_id' => 1, 'name' => 'Visa Section', 'building_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => 2, 'name' => 'Consular Services', 'building_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => 3, 'name' => 'JLPT Language Certification Track', 'building_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => 4, 'name' => 'Japanese Literature Degree Program', 'building_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------------
        // 🎲 REAL NAME POOLS FOR LOOPS
        // -------------------------------------------------------------
        $arabicFirst = ['Youssef', 'Ahmad', 'Fatima', 'Rania', 'Mustafa', 'Zainab', 'Layla', 'Tareq', 'Kareem', 'Nour', 'Omar', 'Khaled', 'Mona', 'Samer', 'Hala'];
        $arabicLast = ['Al-Mousa', 'Mansour', 'Ali', 'Al-Khatib', 'Masri', 'Jabi', 'Najjar', 'Shammas', 'Haddad', 'Al-Hassan', 'Rizk', 'Ghanem', 'Assaf'];
        
        $japaneseFirst = ['Kenji', 'Yuki', 'Takashi', 'Hiroshi', 'Kazuto', 'Asuna', 'Shinichi', 'Ran', 'Ichigo', 'Sakura', 'Taro', 'Hanako', 'Kaito', 'Mei'];
        $japaneseLast = ['Sato', 'Tanaka', 'Watanabe', 'Suzuki', 'Kirigaya', 'Yuuki', 'Kudo', 'Mouri', 'Kurosaki', 'Takahashi', 'Saito', 'Ito', 'Yamamoto'];

        // -------------------------------------------------------------
        // 👤 3. GENERATE STAFF USERS VIA REALISTIC LOOPS
        // -------------------------------------------------------------
        // Saria Ido (Chief Admin)
        DB::table('users')->insert([
            'staff_id' => 1, 'first_name' => 'Saria', 'last_name' => 'Ido', 'email' => 'saria@embassy.gov', 'password' => Hash::make('password123'), 'job_title' => 'Chief Admin Officer', 'role' => 'Admin', 'department_id' => 1, 'created_at' => now(), 'updated_at' => now()
        ]);

        // Generate Visa Section Staff (Interviewer Role)
        for ($i = 2; $i <= 5; $i++) {
            DB::table('users')->insert([
                'staff_id' => $i,
                'first_name' => $japaneseFirst[array_rand($japaneseFirst)],
                'last_name' => $japaneseLast[array_rand($japaneseLast)],
                'email' => "visa_staff{$i}@embassy.gov",
                'password' => Hash::make('password123'),
                'job_title' => 'Visa Attaché',
                'role' => 'Interviewer',
                'department_id' => 1,
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
        $visaStaffIds = range(2, 5);

        // Generate Consular Section Staff (Consular Officer Role)
        for ($i = 6; $i <= 8; $i++) {
            DB::table('users')->insert([
                'staff_id' => $i,
                'first_name' => $arabicFirst[array_rand($arabicFirst)],
                'last_name' => $arabicLast[array_rand($arabicLast)],
                'email' => "consular_staff{$i}@embassy.gov",
                'password' => Hash::make('password123'),
                'job_title' => 'Consular Assistant',
                'role' => 'Consular Officer',
                'department_id' => 2,
                'created_at' => now(), 'updated_at' => now()
            ]);
        }
        $consularStaffIds = range(6, 8);

        // Academic Centers Staff
        DB::table('users')->insert([
            ['staff_id' => 9, 'first_name' => $arabicFirst[array_rand($arabicFirst)], 'last_name' => $arabicLast[array_rand($arabicLast)], 'email' => 'aleppo@embassy.gov', 'password' => Hash::make('password123'), 'job_title' => 'Aleppo Center Coordinator', 'role' => 'Admin', 'department_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['staff_id' => 10, 'first_name' => $arabicFirst[array_rand($arabicFirst)], 'last_name' => $arabicLast[array_rand($arabicLast)], 'email' => 'damascus_uni@embassy.gov', 'password' => Hash::make('password123'), 'job_title' => 'University Liaison', 'role' => 'Admin', 'department_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
        $allStaffIds = range(1, 10);

        // -------------------------------------------------------------
        // 🇸🇾 4. GENERATE CITIZENS VIA LOOP (Real Arabic Names)
        // -------------------------------------------------------------
        for ($i = 1; $i <= 10; $i++) {
            DB::table('citizens')->insert([
                'citizen_id' => $i,
                'passport_number' => 'SYR' . rand(100000, 999999),
                'first_name' => $arabicFirst[array_rand($arabicFirst)],
                'last_name' => $arabicLast[array_rand($arabicLast)],
                'current_address' => 'District ' . rand(1, 5) . ', Syria',
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        // -------------------------------------------------------------
        // 🌍 5. GENERATE VISA APPLICANTS VIA LOOP (Real Japanese Names)
        // -------------------------------------------------------------
        for ($i = 1; $i <= 10; $i++) {
            DB::table('visa_applicants')->insert([
                'applicant_id' => $i,
                'passport_number' => 'JPN' . rand(100000, 999999),
                'first_name' => $japaneseFirst[array_rand($japaneseFirst)],
                'last_name' => $japaneseLast[array_rand($japaneseLast)],
                'nationality' => 'Japanese',
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        // -------------------------------------------------------------
        // 🛂 6. GENERATE VISA APPLICATIONS VIA LOOP
        // -------------------------------------------------------------
        $visaTypes = ['Tourist Visa', 'Student Visa', 'Business Visa', 'Official Diplomatic'];
        $visaStatuses = ['Pending', 'Approved', 'Rejected'];
        for ($i = 1; $i <= 10; $i++) {
            DB::table('visa_applications')->insert([
                'application_id' => $i,
                'applicant_id' => $i,
                'visa_type' => $visaTypes[array_rand($visaTypes)],
                'application_status' => $visaStatuses[array_rand($visaStatuses)],
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        // -------------------------------------------------------------
        // 📅 7. CREATE APPOINTMENTS (Teacher's Routing Loop Logic Match)
        // -------------------------------------------------------------
        $purposes = ['Visa Interview', 'Passport Renewal', 'Document Attestation', 'Notary Services'];
        $statuses = ['Scheduled', 'Completed', 'Canceled'];

        for ($i = 1; $i <= 20; $i++) {
            $purpose = $purposes[array_rand($purposes)];
            
            // 🟢 TEACHER'S LOGIC: Visa Interviews route to Visa Staff, other tasks route to Consular
            if ($purpose === "Visa Interview") {
                $interviewerId = $visaStaffIds[array_rand($visaStaffIds)];
                $applicantId = rand(1, 10);
                $citizenId = null;
            } else {
                $interviewerId = $consularStaffIds[array_rand($consularStaffIds)];
                $applicantId = null;
                $citizenId = rand(1, 10);
            }

            DB::table('appointments')->insert([
                'appointment_id' => $i,
                'applicant_id' => $applicantId,
                'citizen_id' => $citizenId,
                'interviewer_staff_id' => $interviewerId,
                'appointment_date' => now()->addDays(rand(1, 14))->setTime(rand(9, 15), 0, 0),
                'purpose_of_visit' => $purpose,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // -------------------------------------------------------------
        // 🏛️ 8. GENERATE CONSULAR REQUESTS
        // -------------------------------------------------------------
        $requestTypes = ['JLPT Language Certification Track', 'Student Consultation', 'Passport Authentication'];
        for ($i = 1; $i <= 8; $i++) {
            DB::table('consular_requests')->insert([
                'request_id' => $i,
                'citizen_id' => rand(1, 10),
                'request_type' => $requestTypes[array_rand($requestTypes)],
                'request_status' => $statuses[array_rand($statuses)],
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        // -------------------------------------------------------------
        // 🚪 9. GENERATE VISITS LOG
        // -------------------------------------------------------------
        for ($i = 1; $i <= 15; $i++) {
            DB::table('visits_log')
            ->insert(['visit_id' => $i,'visitor_id' => rand(100, 999),
            'staff_id' => $allStaffIds[array_rand($allStaffIds)],
            'check_in_time' => now()->subHours(rand(2, 5)),
            'check_out_time' => now()->subHours(rand(0, 1)),
            'created_at' => now(),'updated_at' => now(),]);}}}
