<?php
class SpynTPL {
var $output;
var $izq = '<[';
var $der = ']>';
var $tpl_dir;
var $cache = false;
var $cache_dir;
var $cache_time = 3600;
var $cache_file;
var $variables = array();
var $blkvar = array();
var $pos = 0;

function SpynTPL($dir = '.',$cache = false) {
(is_dir($dir))?$this->tpl_dir = $dir:die("No existe el directorio : $dir");
if ($cache) {
(is_dir($dir."cache/"))?$this->cache_dir = $dir."cache/":die("No existe el directorio para la cache: ".$dir."cache/");
$this->cache = $cache;
$this->cache_file = md5($_SERVER['REMOTE_ADDR']);
        }
$this->Asigna('_tDir',$dir);
    }

function Fichero($file) {
if(!$salida=$this->LeeCache() && !$this->cache) {
(file_exists($this->tpl_dir.$file))?$salida=file_get_contents($this->tpl_dir.$file):die('No se encuentra el fichero :'.$this->tpl_dir.$file);
        }
$this->output .= $salida;
    }

function Asigna ($nombre, $valor='') {
if (is_array($nombre)) $this->AsignaArray($nombre);
else $this->variables[$nombre] = $valor;
    }

function AsignaArray($array) {
$this->variables = array_merge($this->variables,$array);
    }

function TrataTemplate() {
if(count($this->variables)>0) {
foreach($this->variables as $nom=>$val) {
error_reporting(0);
$val=(file_exists($this->tpl_dir.$val) && !getimagesize($this->tpl_dir.$val))?$this->CargaFile($this->tpl_dir.$val):$val;
error_reporting(1);
$this->output=str_replace($this->izq.$nom.$this->der,$val,$this->output);
            }
if ($this->cache) $this->EscribeCache($this->output);
        }
else die('No hay variables asignadas');
    }

function CargaFile($file) {
ob_start();
include($file);
$content=ob_get_contents();
ob_end_clean();
return $content;
    }

function EscribeCache($content) {
$fp=fopen($this->cache_dir.$this->cache_file,'w');
fwrite($fp,$content);
fclose($fp);
    }

function LeeCache() {
if(file_exists($this->cache_dir.$this->cache_file)&&filemtime($this->cache_dir.$this->cache_file)>(time()-$this->cache_time)) {
return file_get_contents($this->cache_dir.$this->cache_file);
        }
return false;
    }

function Muestra() {
$this->TrataTemplate();
foreach ($this->blkvar as $nom=>$var) {
$bloque = $this->CreaBloque($nom);
if ($var[0] != '') $bloque = $this->RepiteBloque($nom,$bloque);
else $bloque = ''; $this->output = $this->CambiaBloque($nom,$bloque);
        }
return $this->output;
    }

function CambiaBloque($nom, $content) {
$blockName = $this->izq."block: ".$nom.$this->der; $blockEndName = $this->izq."/block: ".$nom.$this->der;
$ini = strpos($this->output,$blockName);
$fin = strpos($this->output,$blockEndName)+strlen($blockEndName);
$bloq = substr($this->output,$ini,($fin-$ini));
return str_replace ($bloq, $content, $this->output);
    }

function CreaBloque($nom) {
$blockName = $this->izq."block: ".$nom.$this->der; $blockEndName = $this->izq."/block: ".$nom.$this->der;
$ini = strpos($this->output,$blockName)+strlen($blockName);
$fin = strpos($this->output,$blockEndName);
return substr($this->output,$ini,($fin-$ini));
    }

function RepiteBloque($nom,$content) {
$fin ='';
foreach($this->blkvar[$nom] as $v1) {
$tmp = $content;
if ($v1 != '') {
foreach ($v1 as $nom=>$val) {
$nom = $this->izq.$nom.$this->der;
$tmp =str_replace($nom,$val,$tmp);
                }
            }
        $fin .= $tmp;
        }
return $fin;
    }

function AsignaBloque($nom, $var) {
if (!array_key_exists($nom,$this->blkvar)) $this->blkvar[$nom] = array();
$seg = count($this->blkvar[$nom]) + 1;
$this->blkvar[$nom] = array_merge($this->blkvar[$nom],array($seg=>$var));
    }
}
?>