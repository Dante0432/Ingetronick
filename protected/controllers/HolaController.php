<?
	class HolaController extends Controller{
		
		public function actionIndex(){
		
			$saludo="Prueba yii";	
			$this->render("index",array("saludo"=>$saludo));
		}
		
		public function actionPrueba(){
			$formPr=new HolaForm();             
			//$this->performAjaxValidation($formPr);  
			if(isset($_POST["HolaForm"])){
				$formPr->attributes=$_POST["HolaForm"];
				$valido=$formPr->validate();   
				if($formPr->validate()){
					echo CJSON::encode (
						array("estado"=>"exito")
					);
				}else{
					echo CActiveForm::validate($formPr);
					
					
				}
				
				/*if(!empty($valido)){
					$error=CActiveForm::validate($formPr);
					echo $error;
					echo $valido;
					Yii::app()->end();
				}
				else{	
					echo CJSON::encode (
						array("key"=>"estado", "value"=>"exito")
					);
					echo $valido;
					Yii::app()->end();				
					
				}*/
			}
			else{
				$this->render("prueba",array('formPr'=>$formPr));
			}
		}
		protected function performAjaxValidation($model)
		{/*
			if(isset($_POST['ajax']) && $_POST['ajax']==='Adol_form')
			{
				echo CJSON::encode (
						array("key"=>"estado", "value"=>"exito")
					);
				Yii::app()->end();
			}*/
		}
		public function actionCreaAdol(){
			if(Yii::app()->request->isAjaxRequest){
				$id_modulo=CHtml::encode(($_POST['id_modulo']));
				echo $id_modulo;
			}
		}
	}
?>