<?php
session_start();
class CalculadoraBasica {
    protected $pantalla;
    public function __construct(){
        $this->pantalla = "";
    }
    public function getPantalla(){
        return $this->pantalla;
    }
    public function pulsar($boton){
        $this->pantalla .= $boton; 
    }
    public function borrar(){
        $this->pantalla = "";
    }
    public function calcular(){
        $this->pantalla = eval("return $this->pantalla;");
    }
}
if(!isset($_SESSION['calculadora'])){
    $_SESSION['calculadora'] = new CalculadoraBasica();   
}
$calc = $_SESSION['calculadora'];

if(count($_POST)>0){
    if(isset($_POST['cero'])){$calc->pulsar("0");} 
    if(isset($_POST['uno'])){$calc->pulsar("1");} 
    if(isset($_POST['dos'])){$calc->pulsar("2");} 
    if(isset($_POST['tres'])){$calc->pulsar("3");} 
    if(isset($_POST['cuatro'])){$calc->pulsar("4");} 
    if(isset($_POST['cinco'])){$calc->pulsar("5");} 
    if(isset($_POST['seis'])){$calc->pulsar("6");} 
    if(isset($_POST['siete'])){$calc->pulsar("7");} 
    if(isset($_POST['ocho'])){$calc->pulsar("8");} 
    if(isset($_POST['nueve'])){$calc->pulsar("9");} 
    if(isset($_POST['punto'])){$calc->pulsar(".");} 
    if(isset($_POST['mas'])){$calc->pulsar("+");} 
    if(isset($_POST['menos'])){$calc->pulsar("-");} 
    if(isset($_POST['por'])){$calc->pulsar("*");} 
    if(isset($_POST['entre'])){$calc->pulsar("/");} 
    if(isset($_POST['borrar'])){$calc->borrar();} 
    if(isset($_POST['igual'])){$calc->calcular();} 
    $_SESSION['calculadora'] = $calc;
    
}

echo    "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='author' content='Esther González'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Calculadora básica</title>
            <link rel='stylesheet' type='text/css' href='CalculadoraBasica.css'/>             
        </head>
        <body>
            <h1>Calculadora básica</h1>
            <form method='POST'>
                <div id='pantalla'>
                   <p><input type='text' id='calculadora' title='calculadora' value='".$calc->getPantalla()."' readonly/></p>
                </div>
            <p> 
                <input type='submit' name='siete' value='7'/>
                <input type='submit' name='ocho' value='8'/>
                <input type='submit' name='nueve' value='9'/>
                <input type='submit' name='entre' value='/'/>
            </p>
            <p> 
                <input type='submit' name='cuatro' value='4'/>
                <input type='submit' name='cinco' value='5'/>
                <input type='submit' name='seis' value='6'/>
                <input type='submit' name='por' value='*'/> 
            </p>
            <p> 
                <input type='submit' name='uno' value='1'/>
                <input type='submit' name='dos' value='2'/>
                <input type='submit' name='tres' value='3'/>
                <input type='submit' name='mas' value='+'/>
            </p>
            <p> 
                <input type='submit' name='cero' value='0'/>
                <input type='submit' name='punto' value='.'/>
                <input type='submit' name='borrar' value='C'/>
                <input type='submit' name='menos' value='-'/>
            </p>
            <p>
                <input type='submit' name='igual' value='='/>
            </p>
            </form>
        </body>
        </html>
        ";
?>