<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
//Yii::app()->getSession()->add('cedula', 80760766);
//Yii::app()->getSession()->remove('cedula');
if(!Yii::app()->user->isGuest){
	Yii::app()->user->returnUrl = array("controlAp/index"); 
	$this->redirect(Yii::app()->user->returnUrl);	
	Yii::app()->getSession()->remove('cedula');
}
else{
echo Yii::app()->getSession()->get('nombreVariable');
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
/*Yii::app()->getClientScript()->registerScript('myscript','$("#LoginForm_nombreusuario").keyup(function() {
alert(\'Hello world !\');
});');
*/
?>

<h1>Acceso</h1>

<p>Por favor acceda con su nombre de usuario y contraseña</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreusuario'); ?>
		<?php echo $form->textField($model,'nombreusuario'); ?>
		<?php echo $form->error($model,'nombreusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claveusr'); ?>
		<?php echo $form->passwordField($model,'claveusr'); ?>
		<?php echo $form->error($model,'claveusr'); ?>
	</div>
    <div class="row">
		<?php //echo $form->labelEx($model,'id_forjar'); ?>
		<?php echo $form->hiddenField($model,'id_forjar'); ?>
		<?php echo $form->error($model,'id_forjar'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Acceder'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php } ?>

