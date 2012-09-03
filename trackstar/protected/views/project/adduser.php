<?php 
    $this->pageTitle=Yii::app()->name . ' - Add User To Project';
    $this->menu=array(
	array('label'=>'Back to Project', 'url'=>array('view','id'=>$form->project->id)),
);
?>

<h1>Add User To <?php echo $form->project->name; ?></h1>
<?php if(Yii::app()->user->hasFlash('success')):?> 
<div class="successMessage">
<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>

<div class = "form">

 <?php $form1=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
 )); ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

  <div class="row">
		<?php echo $form1->labelEx($form,'username'); ?>
		<?php $this->widget('CAutoComplete', array('model'=>$form,
		                                            'attribute'=>'username',
		                                            'data'=>$usernames,
		                                            'multiple'=>false,
		                                            'htmlOptions'=>array('size'=>25),
                                                     )); ?>
		<?php echo $form1->error($form,'username'); ?>
	</div>



	<div class="row">
		<?php echo $form1->labelEx($form,'role'); ?>
		<?php echo $form1->dropDownList($form,'role',Project::model()->getUserRoleOptions()); ?>
		<?php echo $form1->error($form,'role'); ?>
	</div>
  



	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>
	<?php $this->endWidget() ?>

</div>