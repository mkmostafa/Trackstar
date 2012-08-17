<?php
class IssueTest extends CDbTestCase 
{
	public function testGetTypes()
	{
		$options = Issue::model()->typeOptions;
		$this->assertTrue(is_array($options));
		$this->assertTrue(3 == count($options));
		$this->assertTrue(in_array('Bug',$options));
		$this->assertTrue(in_array('Feature',$options));
		$this->assertTrue(in_array('Task',$options));
	}

	public function testGetStatus()
	{
		$status = Issue::model()->statusOptions;
		$this->assertTrue(is_array($status));
		$this->assertTrue(3 == count($status));
		$this->assertTrue(in_array('Not Started Yet',$status));
		$this->assertTrue(in_array('Started',$status));
		$this->assertTrue(in_array('Finished',$status));

	}
}