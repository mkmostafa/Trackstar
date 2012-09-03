<?php
class ProjectUserForm extends CFormModel
{
   public $username;
   public $project;
   public $role;
   
	


   public function rules()
   {
   	return array(
   		array('username','required'),
   		array('role','required'),
   		array('username','verify'),
	   	);
   }
   
   public function verify($attribute,$params)
   {
   	 $user=User::model()->findByAttributes(array('username'=>$this->username));

   	 if($user===null)
   	 {
   	 	$this->addError('username','is not valid');
   	 }
   	 else
   	 {
   	 	if($this->project->isUserInProject($user))
   	 	{
   	 		$this->addError('username','is already a member');
   	 	}
   	 	else
   	 	{
   	 		$this->project->associateUserToProject($user);
   	 		$this->project->associateUserToRole($this->role,$user->id);
   	 		$auth=Yii::app()->authManager;
   	 		$bizRule='return isset($params["project"]) &&
   	 		$params["project"]->isUserInRole("'.$this->role.'");';
   	 		$auth->assign($this->role,$user->id,$bizRule);

   	 	}
   	 	
   	 }
   }
   
   public function attributeLabels()
	{
		return array(
			'username'=>'Username',
			'project'=>'Project',
			'role'=>'Role',
		);
	}	
}