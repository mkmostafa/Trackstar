<?php
class RbacCommand extends CConsoleCommand
{
     private $_authManager;
     
     public function run ($args)
     {
     	if(($this->_authManager=Yii::app()->authManager)===null)
     	{
     		echo "Error: an autorzation manager, named 'authManager' needs to be configured to use this command. \n";

     		echo "If you already added 'authManager' component in application configuration, \n";

     		echo "please quit and re-enter the yiic shell command. \n";
     		

     		return;
     	}
     	echo"This command will create three roles:Owner, Member, Reader and and the following permissions: \n";
     	echo"read, create, update and delete issue \n";
     	echo"read, create, update and delete user \n";
     	echo"read, create, update and delete project \n";
     	echo"Would you like to continue? [Yes|No]";

     	if(!strncasecmp(trim(fgets(STDIN)),'y','1'))
     	{
     		//clear all roles and permissions
     		$this->_authManager->clearAll();

     		// *Operations*

     		   // User Operations
     		   $this->_authManager->createOperation('readUser','views an existing user');
     		   $this->_authManager->createOperation('createUser','creates a new user');
     		   $this->_authManager->createOperation('updateUser','updates an existing user');
     		   $this->_authManager->createOperation('deleteUser','deletes an existing user');

     		   // Issue Operations
     		   $this->_authManager->createOperation('readIssue','views an existing issue');
     		   $this->_authManager->createOperation('createIssue','creates a new issue');
     		   $this->_authManager->createOperation('updateIssue','updates an existing issue');
     		   $this->_authManager->createOperation('deleteIssue','deletes an existing issue');

     		   // Project Operations
     		   $this->_authManager->createOperation('readProject','views an existing project');
     		   $this->_authManager->createOperation('createProject','creates a new project');
     		   $this->_authManager->createOperation('updateProject','updates an existing project');
     		   $this->_authManager->createOperation('deleteproject','deletes an existing project');

     		// *Roles and Relations* 
     		   $role = $this->_authManager->createRole('reader');
     		   $role->addChild('readProject');
     		   $role->addChild('readIssue');
     		   $role->addChild('readUser');


     		   $role = $this->_authManager->createRole('member');
     		   $role->addChild('reader');
     		   $role->addChild('createIssue');
     		   $role->addChild('updateIssue');
     		   $role->addChild('deleteIssue');

     		   $role = $this->_authManager->createRole('owner');
     		   $role->addChild('reader');
     		   $role->addChild('member');
     		   $role->addChild('createUser');
     		   $role->addChild('deleteUser');
     		   $role->addChild('updateUser');
     		   $role->addChild('createProject');
     		   $role->addChild('deleteProject');
     		   $role->addChild('updateProject');


     	    echo"Authorization successfully generated";

     	}



     }	
}