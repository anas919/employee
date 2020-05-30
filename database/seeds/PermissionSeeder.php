<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('permissions')->truncate();
		$permissions = [
			['module' => 'dashboard','name' => 'revenue_dashboard','description' => 'Can view Revenu Dashboard'],
			['module' => 'dashboard','name' => 'projects_tasks_dashboard','description' => 'Can view projects and tasks who\'s belongs to in Dashboard'],
			['module' => 'dashboard','name' => 'all_projects_tasks_dashboard','description' => 'Can view all projects and tasks in Dashboard'],
			['module' => 'dashboard','name' => 'belongs_projects_tasks_dashboard','description' => 'Can view projects and tasks who\'s belongs to in Dashboard'],
			['module' => 'members','name' => 'view_members','description' => 'Can view all members data'],
			['module' => 'members','name' => 'invite_members','description' => 'Can invite members by Email'],
			['module' => 'offers','name' => 'view_offers','description' => 'Can view all company offer'],
			['module' => 'offers','name' => 'create_offers','description' => 'Can create offers'],
			['module' => 'offers','name' => 'edit_offers','description' => 'Can mark offer as opened or closed'],
			['module' => 'offers','name' => 'delete_offers','description' => 'Can delete offers'],
			['module' => 'candidates','name' => 'view_candidates','description' => 'Can view all applicants'],
			['module' => 'candidates','name' => 'view_resumes_candidates','description' => 'Can view resumes of applicants'],
			['module' => 'candidates','name' => 'view_informations_candidates','description' => 'Can view all informations of applicants'],
			['module' => 'candidates','name' => 'delete_candidates','description' => 'Can delete applicants'],
			['module' => 'payroll','name' => 'view_payments','description' => 'Can view payments'],
			['module' => 'payroll','name' => 'schedule_payments','description' => 'Can schedule payments'],
			['module' => 'projects','name' => 'view_projects','description' => 'Can view list of projects, teams and members '],
			['module' => 'projects','name' => 'edit_projects','description' => 'Can edit project informations (client, teams)'],
			['module' => 'projects','name' => 'create_projects','description' => 'Can create new project'],
			['module' => 'teams','name' => 'view_teams','description' => 'Can view list of teams and members'],
			['module' => 'teams','name' => 'edit_teams','description' => 'Can edit team informations (team leads, team members)'],
			['module' => 'teams','name' => 'create_teams','description' => 'Can create new teams'],
			['module' => 'timeoffs','name' => 'create_policies','description' => 'Can create new policies for time-offs and holidays'],
			['module' => 'timeoffs','name' => 'view_timeoffs','description' => 'Can view list of time-offs'],
			['module' => 'timeoffs','name' => 'request_timeoffs','description' => 'Can request time-offs'],
			['module' => 'timeoffs','name' => 'approve_timeoffs','description' => 'Can approve, cancel or delete  time-offs'],
			['module' => 'schedules','name' => 'view_schedules','description' => 'Can view list of schedules'],
			['module' => 'schedules','name' => 'view_belongs_schedules','description' => 'Can view own schedules only'],
			['module' => 'schedules','name' => 'create_schedules','description' => 'Can create schedules'],
			['module' => 'tasks','name' => 'create_boards','description' => 'Can create boards for projects'],
			['module' => 'tasks','name' => 'view_belongs_boards','description' => 'Can view belonging boards only'],
			['module' => 'tasks','name' => 'view_all_boards','description' => 'Can view all boards'],
			['module' => 'tasks','name' => 'view_all_boards','description' => 'Can view all boards'],
			['module' => 'tasks','name' => 'create_lists','description' => 'Can create Task lists'],
			['module' => 'tasks','name' => 'create_cards','description' => 'Can create cards (tasks)'],
			['module' => 'tasks','name' => 'edit_cards','description' => 'Can edit cards (assign members, change due date, attach files...)'],
			['module' => 'tasks','name' => 'remove_cards','description' => 'Can remove cards'],
			['module' => 'invoices','name' => 'view_invoices','description' => 'Can view list invoice'],
			['module' => 'invoices','name' => 'create_invoices','description' => 'Can create invoices'],
			['module' => 'invoices','name' => 'create_invoices','description' => 'Can create invoices'],
			['module' => 'invoices','name' => 'edit_invoices','description' => 'Can edit invoices'],
			['module' => 'screenshots','name' => 'view_invoices','description' => 'Can monitor members via screenshots'],
			['module' => 'apps','name' => 'view_apps','description' => 'Can monitor members via apps'],
			['module' => 'apps','name' => 'view_urls','description' => 'Can monitor members via urls'],
			['module' => 'clients','name' => 'view_clients','description' => 'Can view list of clients'],
			['module' => 'clients','name' => 'create_clients','description' => 'Can create new clients'],
			['module' => 'clients','name' => 'edit_clients','description' => 'Can edit clients informations'],
			['module' => 'permissions','name' => 'edit_permissions','description' => 'Can edit roles and permissions'],
			['module' => 'settings','name' => 'edit_settings','description' => 'Can edit settings of organization']
		];
		DB::table('permissions')->insert($permissions);

    }
}
