<?php
class NewException extends ErrorException
{
  public function __toString()
  {
    switch ($this->severity)
    {
      case E_USER_ERROR : // Si l'utilisateur émet une erreur fatale.
        $type = 'Erreur fatale';
        break;
      
      case E_WARNING : // Si PHP émet une alerte.
      case E_USER_WARNING : // Si l'utilisateur émet une alerte.
        $type = 'Attention';
        break;
      
      case E_NOTICE : // Si PHP émet une notice.
      case E_USER_NOTICE : // Si l'utilisateur émet une notice.
        $type = 'Note';
        break;
      
      default : // Erreur inconnue.
        $type = 'Erreur';
        break;
    }
    
    return '<strong>' . $type . '</strong>[' . $this->code . '] : ' . $this->message /*. '<br />' . '<strong>' . $this->file . '</strong> à la ligne <strong>' . $this->line . '</strong>'*/ ;
  }
}

function error2exception($code, $message, $fichier, $ligne)
{
  throw new NewException($message, 0, $code, $fichier, $ligne);
}

function customException($e)
{
  echo /*'Ligne ', $e->getLine(), ' dans ', $e->getFile(), '<br />' . */'Exception lancée : ', $e->getMessage();
}

set_error_handler('error2exception');
set_exception_handler('customException');