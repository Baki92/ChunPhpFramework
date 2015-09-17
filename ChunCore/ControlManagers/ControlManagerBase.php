<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeControlManagerModuls();
class ControlManagerBase
{
    protected $request_url="";
    protected $parsed_request_url="";
    protected $caller_model_name="";
    protected $function_name="";
    protected $function_parameters=null;
    protected $exploded_request_url=null;
    const explode_delimiter_for_url='/';



    function __construct($_caller_model_name)
    {
        $this->caller_model_name=$_caller_model_name;
        $this->setCallerModelNameToCorrectFormat();

    }
    protected function callControlFunction()
    {
        $this->startUrlProcessing();
    }
    private function setCallerModelNameToCorrectFormat()
    {
        $this->caller_model_name=$this->caller_model_name.DEFAULT_FILE_EXT;
    }
    private function startUrlProcessing()
    {
        $this->request_url=$_SERVER['REQUEST_URI'];
        $this->parseRequestUrl();
    }
    private function parseRequestUrl()
    {
        $parameters_start_index=strpos($this->request_url,$this->caller_model_name);
        $parameters_start_index+=strlen($this->caller_model_name);
        $parameters_length=(strlen($this->request_url)-$parameters_start_index);
        $this->parsed_request_url=substr($this->request_url,$parameters_start_index,$parameters_length);
        $this->explodeParsedRequestUrl();
    }
    private function  explodeParsedRequestUrl()
    {
        $this->exploded_request_url=explode(EXPLODE_DELIMITER_FOR_URL,$this->parsed_request_url);
        $this->exploded_request_url=array_filter($this->exploded_request_url);
        $this->setFunction();
    }
    private function setFunction()
    {
        try
        {
            if(empty($this->exploded_request_url[1]))
            {
                throw new Exception('Function is not setted!');
            }
            $this->function_name = $this->exploded_request_url[1];
            $this->setFunctionParameters();
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
    }
    private function setFunctionParameters()
    {
        $this->function_parameters=$this->exploded_request_url;
        array_shift($this->function_parameters);
        $this->buildFunctionHeader();
    }
    private function  buildFunctionHeader()
    {
        try
        {
            if(method_exists($this,$this->function_name)==false)
            {
                throw new Exception("'".$this->function_name."'"." function not exist");
            }
            call_user_func_array(array($this, $this->function_name), $this->function_parameters);
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }


    }


}


?>