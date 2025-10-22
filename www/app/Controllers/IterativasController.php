<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class IterativasController extends \Com\Daw2\Core\BaseController
{
    public function showIterativas03(): void
    {
        $data = array(
            'titulo' => 'Iterativas 03',
            'breadcrumb' => ['Iterativas', '03'],
            'seccion' => '/iterativas/03',
            'tituloEjercicio' => 'Ordenar matriz'
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas03.view.php', 'templates/footer.view.php'), $data);
    }

    public function doIterativas03(): void
    {
        $errors = $this->checkForm03($_POST);
//        if (isset($_POST['enviar'])) {
//            //Comprobar
//            $erros = checkForm($_POST);
//            $data['input_matriz'] = $_POST['input_matriz'];
//
//            if (count($erros) > 0) {
//                $data['erros'] = $erros;
//            } else {
//                $auxMatriz = explode('|', $_POST['input_matriz']);
//                $auxLength = 0;
//                $auxLineal = [];
//
//                for ($i = 0; $i < count($auxMatriz); $i++) {
//                    $auxLine = explode(',', $auxMatriz[$i]);
//                    $auxLineal = array_merge($auxLineal, $auxLine);
//                    $auxLength = count($auxLine);
//                }
//
//                $auxLineal = bubbleSort($auxLineal);
//                $result = [];
//
//                for ($i = 0; $i < count($auxLineal); $i += $auxLength) {
//                    $result[] = array_slice($auxLineal, $i, $auxLength);
//                }
//
//                for ($i = 0; $i < count($result); $i++) {
//                    $result[$i] = implode(',', $result[$i]);
//                }
//                $result = implode('|', $result);
//
//                $data['ordenados'] = $result;
//            }
//        }
    }
    private function checkForm03(array $data): array
    {
        $erros = [];

        if (empty($data['input_matriz'])) {
            $erros['matriz'] = "Inserte una matriz";
        } else {
            $auxMatriz = explode('|', $data['input_matriz']);
            $procesada = array();

            foreach ($auxMatriz as $linea) {
                $procesada[] = explode(',', $linea);
            }

            //Comprobar que tenga solo numeros
            $noNumeros = [];
            foreach ($procesada as $linea) {
                foreach ($linea as $num) {
                    if (!is_numeric($num)) {
                        $noNumeros[] = $num;
                    }
                }
            }

            if ($noNumeros !== []) {
                $erros['matriz'] = "Los siguientes elementos no son numeros: " . implode(', ', $noNumeros) . ".";
            } else {
                //Comprobar que las filas de la matriz tienen el mismo tamaño
                $tamanoPrimera = count($procesada[0]);
                $i = 1;
                $errorTamano = false;

                while ($i < count($procesada) && !$errorTamano) {
                    $errorTamano = count($procesada[$i]) !== $tamanoPrimera;
                    $i++;
                }

                if ($errorTamano) {
                    $erros['matriz'] = 'Todas las lineas deben tener la misma longitud';
                }
            }
        }

        return $erros;
    }

    private function bubbleSort(array $arr): array
    {
        $n = count($arr);

        // Traverse through all array elements
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // Swap if the element found is
                // greater than the next element
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }

        return $arr;
    }

    public function iterativas06()
    {
        $data = array(
            'titulo' => 'Iterativas 06',
            'breadcrumb' => ['Iterativas', '06'],
            'seccion' => '/iterativas/06',
            'tituloEjercicio' => 'Criba de Erastótenes'
        );
        $this->view->showViews(array('templates/header.view.php', 'iterativas06.view.php', 'templates/footer.view.php'), $data);
    }
}
