<?php
/**
 * Date 14/04/2023
 *
 * @author   Simon Siva <simonsiva13@gmail.com>
 */

namespace Ssiva\MpesaYiiSdk;

use yii\base\Component;
use yii\base\InvalidConfigException;

class MpesaDaraja extends Component
{
    
    public array $configs = [];
    private $daraja;
    
    public function init()
    {
        parent::init();
        $configs = $this->initiate();
        
        //dd($configs);
        
        $this->daraja = new Mpesa($configs);
    }
    
    public function initiate(){
        if (empty($this->configs)) {
            throw new InvalidConfigException('Mpesa Configs cannot be empty');
        }
        return $this->configs;
    }
    
    public function getDaraja()
    {
        return $this->daraja;
    }
    
}