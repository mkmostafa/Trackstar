<?php
/* @var $this IssueController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Issue', 'url'=>array('index','pid' => $model->project->id)),
	array('label'=>'Create Issue', 'url'=>array('create', 'pid'=>$model->project->id)),
	array('label'=>'Update Issue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issue', 'url'=>array('admin','pid' => $model->project->id)),
);
?>

<h1>View Issue #<?php echo $model->id; ?></h1>
<?php 

$requester = '';
$owner = '';
if($model->requester != null)
$requester = $model->requester->username;
if($model->owner != null)
$owner = $model->owner->username;

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		array('name'=>'Project Name','value'=> CHtml::encode($model->getProjectName())),
		array('name'=>'Type','value'=> CHtml::encode($model->getTypeName($model->type_id))),
		array('name'=>'Status','value'=> CHtml::encode($model->getStatusName($model->status_id))),
		array('name'=>'Owner','value'=> $owner),
		array('name'=> 'Requester','value' => $requester),
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
