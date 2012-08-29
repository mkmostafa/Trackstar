<?php
class ProjectTest extends CDbTestCase
{
	public $fixtures=array(
		'projects'=>'Project',
		'users' => 'User',
		'userAssignProject' => ':tbl_project_user_assignment',
		);

	public function testCrud()
	{
		//Creating new instance test.
		$newProject = new Project;
		$newProjectName = 'Test Project 1';
		$newProject -> setAttributes(
			array (
				'name' => $newProjectName,
				'description' => 'Test project number one',
				)
			);

			$this -> assertTrue($newProject -> save(false));

		//Reading the created instance test.
		$retrievedProject = Project::model()->findByPk($newProject->id);
		$this-> assertTrue($retrievedProject instanceof Project);
		$this-> assertEquals($retrievedProject->name, $newProjectName);

		//Updating the created instance
		$updatedProjectName = 'Updated Project 1';
		$newProject->name = $updatedProjectName;
		$this->assertTrue($newProject->save(false));

		//Deleting the created instance
		$projectId = $newProject->id;
		$this->assertTrue($newProject->delete());
		$deletedProject = Project::model()->findByPk($projectId);
		$this->assertEquals(NULL,$deletedProject);

	}

	public function testRead()
	{
		$retrievedProject = $this->projects('project1');
		$this->assertEquals($retrievedProject->name,'Test Project 1');
	}

	public function testDelete()
	{
		$projectId = $this->projects('project2')->id;
		$this->assertTrue($this->projects('project2')->delete());
		$retrievedProject = Project::model()->findByPk($projectId);
		$this->assertEquals(NULL,$retrievedProject);
	}

	public function testUpdate()
	{
		$project = $this->projects('project1');
		$project->name = 'Updated Project 1';
		$this->assertTrue($project->save(false));
		$this->assertEquals($this->projects('project1')->name,'Updated Project 1');
	}
	public function testCreate()
	{
		$project = new Project;
		$project -> setAttributes(
			array (
				'name'=>'created test project 1',
				'description'=>'created test project 1',
				)
			);
		Yii::app()->user->setId($this->users('user1')->id);
		$this -> assertTrue($project->save());
		$retrievedProject = Project::model()->findByPk($project->id);
		$this->assertEquals($retrievedProject->name, 'created test project 1');
		$this->assertEquals(Yii::app()->user->id,$retrievedProject->create_user_id);
	}
	public function testGetUserOptions()
	{
		$project = $this->projects('project1');
		$options = $project->userOptions;
		$this->assertTrue(is_array($options));
		$this->assertTrue(0 < count($options));
	}

	public function testUserRoleAssignment()
	{
		$project = $this->projects('project1');
		$user = $this->users('user1');
		$this->assertEquals(1,$project->associateUserToRole('owner',$user->id));
	}
}