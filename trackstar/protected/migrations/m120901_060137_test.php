<?php

class m120901_060137_test extends CDbMigration
{
	public function up()
	{
		$this->createTable('test',
		array('id'=>'pk'));
	}

	public function down()
	{
		$this->dropTable('test');
		echo "m120901_060137_test does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}