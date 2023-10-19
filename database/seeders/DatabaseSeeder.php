<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuActionsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(UserMenuActionsTableSeeder::class);
        $this->call(OtpSmsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(AcademiccalenderTableSeeder::class);
        $this->call(AddclassTableSeeder::class);
        $this->call(ClassroutineTableSeeder::class);
        $this->call(HolidaylistTableSeeder::class);
        $this->call(SyllabusTableSeeder::class);
        $this->call(LessonplanTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        $this->call(PrinciplesTableSeeder::class);
        $this->call(VicePrincipalMessagesTableSeeder::class);
        $this->call(AdmissioninfoTableSeeder::class);
        $this->call(ClassInfosTableSeeder::class);
        $this->call(AddgroupTableSeeder::class);
        $this->call(AddsectionTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(TeacherstaffTableSeeder::class);
        $this->call(ExamroutineTableSeeder::class);
        $this->call(GroupInfosTableSeeder::class);
        $this->call(NoticesTableSeeder::class);
        $this->call(PhotogallerysTableSeeder::class);
        $this->call(PreviousClassInfosTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(StudentAdmissionsTableSeeder::class);
        $this->call(StudentInformationsTableSeeder::class);
        $this->call(StudentRegistrationsTableSeeder::class);
        $this->call(SubjectInfosTableSeeder::class);
        $this->call(UsefullinksTableSeeder::class);
        $this->call(VideogallerysTableSeeder::class);
        $this->call(TeachingPermissionsTableSeeder::class);
        $this->call(StudentAttendanceInfosTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(GenderWisesTableSeeder::class);
        $this->call(SectionWisesTableSeeder::class);
    }
}
