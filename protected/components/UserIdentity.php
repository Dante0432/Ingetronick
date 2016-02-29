<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 private $cedulaUsr;
	 public $_sedeForjar;
	 
	public function authenticate()
	{
		//$usuario=Personal::model()->find('nombreusuario=?',array($this->username));
		$persona=new Usuario($this->username);
		$persona->_clave=1234;
		if($persona->consultaUsuario()===false){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif($this->password!==$persona->_clave){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else{
			$this->errorCode=self::ERROR_NONE;
			$persona->_cedula=1;
			$this->setState('cedula',$persona->_cedula);			
			$this->cedulaUsr=$persona->_cedula;
			$this->setState('rol',$persona->_id_rol);
			//$this->setState('nombre',$persona->_nombre_profes.' '.$persona->_apellido_prof);
			//Yii::app()->getSession()->add('cedula',$cedula);
		}
		return !$this->errorCode;
	}
	public function getId()
    {
        return $this->cedulaUsr;
    }
}