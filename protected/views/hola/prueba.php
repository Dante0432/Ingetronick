<?php 
/*Yii::app()->getClientScript()->registerScript('myscript','$("#HolaForm_nombre").keyup(function() {
alert(\'Hello world !\');
});');
*/
?>
<div id="Mensaje" style="border:1px solid #003"></div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Adol_form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
	// si se quisiera ir a otro controlador se crearia una Url dentro del array 'action'=>$this->createUrl('controlador/metodo');
?>
	<!--campo de texto para nombre -->	
	<?php echo $form->labelEx($formPr,'nombre');?></br>
	<?php echo $form->textField($formPr,'nombre');?></br>
	<?php echo $form->error($formPr,'nombre');?>

	<?php echo $form->labelEx($formPr,'descripcion');?></br>
	<?php echo $form->textArea($formPr,'descripcion');?></br>
	<?php echo $form->error($formPr,'descripcion');?>
    <?php
		$boton=CHtml::ajaxSubmitButton (
						'Crear Registro',   
						array('hola/prueba'),
						array(				
							'dataType'=>'json',
							'type' => 'post',
							'success' => 'function(datos) {								
								if(datos.estado=="exito"){
									$("#Mensaje").html("Los datos se han envioado satisfactoriamente");
								}
								else{						
									$.each(datos, function(key, val) {
										$("#Adol_form #"+key+"_em_").text(val);                                                    
                       					$("#Adol_form #"+key+"_em_").show();                                                
									});
								}									
							}'
						),
						array('id'=>'btnCreaAdolId','name'=>'btnCreaAdolN')
				);
    ?>

    <?php echo $boton; 
	
	//CHtml::submitButton('Crear');?>


<?php $this->endWidget();?>
