<?php
namespace FrameworkWidget;

use \Exception;

class Form {
    
    private $action;
    private $method;
    private $error = array();
    private $listWidget = array();
    
    public function __construct($pAction, $pMethod)
    {    
        $this->action = $pAction;
        $this->method = $pMethod;
    }   
    
    public function add($pWidget)
    {
        if(!array_key_exists($pWidget->getName() , $this->listWidget))
        {   
            $this->listWidget[$pWidget->getName()] = $pWidget;
        }
        else{
            throw new Exception("Le formulaire contient déjà un widget avec le nom ".$pWidget->getName());
        }
    }
    
    public function bind($pPost)
    {
        foreach ($pPost as $key => $value)
        {
            $this->listWidget[$key]->setValue($value);
        }
    }
    
    public function isValid()
    {
        foreach($this->listWidget as $w)
        {
            try{
                $w->isValid();
            }catch(Exception $ex)
            {
                $this->error[$w->getName()] = $ex->getMessage(); 
            }
        } 
    }
    
    public function render()
    {
        $s = '<form method = "POST" action="'.$this->action.'"><table>';
        foreach($this->listWidget as $w)
        {
            $s .= '<tr><td>'.$w->render().'</td></tr>';
            //if(array_key_exists($w->getName() , $this->error)) $s .= '<tr><td style="color: red">'.$this->error[$w->getName()].'</td></tr>';
        }
        $s .= '<tr><td colspan="2"><input type="submit" value="Valider" /></td></tr>';        
        $s .='</table></form>';

        return $s;
    }
    
}
