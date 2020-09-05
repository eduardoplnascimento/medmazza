<?php

namespace App\Http\Services\Params;

use ReflectionMethod;

class BaseServiceParams
{
    /**
     * Seta as variaveis do construct nos respectivos atributos da classe
     */
    public function __construct()
    {
        // Pega os parametros que foram passados para o construtor da classe
        // que herda essa
        $trace = debug_backtrace(null, 2);
        $args = $trace[count($trace) - 1]['args'];

        // Pega os atributos do metodo construtor da classe herdada que chamou
        // este construct, e faz um foreach pelas propriedades do construct
        $reflectionMethod = new ReflectionMethod(get_called_class(), '__construct');
        foreach ($reflectionMethod->getParameters() as $parameter) {
            // Se existir um valor entre os argumentos passados para os atributos
            // que ela espera receber, seta, senão pega o valor padrão se existir
            // senão o valor será nulo
            $this->{$parameter->getName()} = isset($args[$parameter->getPosition()])
                ? $args[$parameter->getPosition()]
                : ( $parameter->isDefaultValueAvailable()
                    ? $parameter->getDefaultValue()
                    : null );
        }
    }

    /**
     * Transforma a classe em array
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this;
    }
}
