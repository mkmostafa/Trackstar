<?php
/* @var $this IssueController */
/* @var $model Issue */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('/issue/view', 'id'=>$data->id)); ?>
	<br />

	<div>
	<?php if($this instanceOf Issue) 
	{
		echo CHtml::encode($this->getProject()->name);
	}
	      else 
	      {
	      	if($this instanceOf Project)
	      	echo CHtml::encode($this->name);
	      }
	?>
	</div>

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->getTypeName($data->type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusName($data->status_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
	<?php echo CHtml::encode($data->owner->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('requester_id')); ?>:</b>
	<?php echo CHtml::encode($data->requester_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	*/ ?>

</div>