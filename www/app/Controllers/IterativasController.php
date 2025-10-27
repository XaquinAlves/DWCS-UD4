<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class IterativasController extends \Com\Daw2\Core\BaseController
{
    public function showIterativas03(array $input = [], array $errors = [], string $result = ""): void
    {
        $data = array(
            'titulo' => 'Iterativas 03',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas03'],
            'seccion' => '/iterativas03',
            'tituloEjercicio' => 'Ordenar matriz',
            'errors' => $errors,
            'input' => $input,
            'ordenados' => $result
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas03.view.php',
            'templates/footer.view.php'), $data);
    }

    public function doIterativas03(): void
    {
        $errors = $this->checkForm03($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($errors !== []) {
            $this->showIterativas03($input, $errors);
        } else {
            $auxMatriz = explode('|', $_POST['input_matriz']);
            $auxLength = 0;
            $auxLineal = [];

            for ($i = 0; $i < count($auxMatriz); $i++) {
                $auxLine = explode(',', $auxMatriz[$i]);
                $auxLineal = array_merge($auxLineal, $auxLine);
                $auxLength = count($auxLine);
            }

            $auxLineal = $this->bubbleSort($auxLineal);
            $result = [];

            for ($i = 0; $i < count($auxLineal); $i += $auxLength) {
                $result[] = array_slice($auxLineal, $i, $auxLength);
            }

            for ($i = 0; $i < count($result); $i++) {
                $result[$i] = implode(',', $result[$i]);
            }
            $result = implode('|', $result);
            $this->showIterativas03($input, [], $result);
        }
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

    public function showIterativas04(array $input = [], array $errors = [], string $result = ""): void
    {
        $data = array(
            'titulo' => 'Iterativas 04',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas04'],
            'seccion' => '/iterativas04',
            'tituloEjercicio' => 'Contar numero de letras',
            'errors' => $errors,
            'input' => $input,
            'cuentaletras' => $result
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas04.view.php',
            'templates/footer.view.php'), $data);
    }

    public function doIterativas04(): void
    {
        $errors = $this->checkForm04($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $letters_string = "";

        if ($errors === []) {
            //Pasamos a minúsculas y separamos en un array
            $aux = mb_str_split(mb_strtolower(preg_replace("/\P{L}/u", "", $_POST['input_letras'])));
            //Contamos las letras con un metodo
            $letters_sorted = $this->buildCountArray($aux);
            //Ordenamos el array y lo invertimos para tener de mayor a menor
            arsort($letters_sorted);
            //Creamos el string de salida
            $letters_string = $this->countArrayToString($letters_sorted);
        }

        $this->showIterativas04($input, $errors, $letters_string);
    }

    private function checkForm04(array $data): array
    {
        $erros = [];

        if (empty($data['input_letras'])) {
            $erros['letras'] = "Inserte un texto no campo";
        } else {
            $text = preg_replace("/\P{L}/u", "", $data['input_letras']);
            if ($text === "") {
                $erros['letras'] = "O texto non contén letras";
            }
        }

        return $erros;
    }

    public function countArrayToString(array $words_sorted): string
    {
        $words_string = "";

        foreach ($words_sorted as $key => $value) {
            $words_string .= $key . ": " . $value . ", ";
        }

        return substr($words_string, 0, -2) . ".";
    }

    private function buildCountArray(array $array): array
    {
        $count = [];
        //Contamos las palabras
        for ($i = 0; $i < count($array); $i++) {
            if (isset($count[$array[$i]])) {
                $count[$array[$i]]++;
            } else {
                $count[$array[$i]] = 1;
            }
        }
        return $count;
    }


    public function showIterativas05(array $input = [], array $errors = [], string $result = ""): void
    {
        $data = array(
            'titulo' => 'Iterativas 05',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas05'],
            'seccion' => '/iterativas05',
            'tituloEjercicio' => 'Contar numero de palabras',
            'errors' => $errors,
            'input' => $input,
            'cuentapalabras' => $result
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas05.view.php',
            'templates/footer.view.php'), $data);
    }

    public function doIterativas05(): void
    {
        $errors = $this->checkForm05($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $words_string = "";

        if ($errors === []) {
            //Pasamos a minúsculas, limpiamos espacios sobrantes y separamos en un array de palabras
            $aux = explode(" ", preg_replace("/ {2,}/", " ", trim(mb_strtolower($_POST['input_palabras']))));
            $aux = preg_replace("/\P{L}/u", "", $aux);
            //Contamos las palabras con un metodo
            $words_sorted = $this->buildCountArray($aux);
            //Ordenamos el array y lo invertimos para tener de mayor a menor
            arsort($words_sorted);
            //Creamos el string de salida
            $words_string = $this->countArrayToString($words_sorted);
        }

        $this->showIterativas05($input, $errors, $words_string);
    }

    private function checkForm05(array $data): array
    {
        $errors = [];

        if (empty($data['input_palabras'])) {
            $errors['palabras'] = "Inserte un valor no campo";
        } else {
            $text = preg_replace("/\P{L}/u", "", $data['input_palabras']);
            if ($text === "") {
                $errors['palabras'] = "O texto non contén letras";
            }
//          else {
//                $palabras = explode(" ", preg_replace("/ {2,}/", " ", trim(mb_strtolower($data['input_palabras']))));
//                if (count($palabras) === 0) {
//                    $errors['palabras'] = "O texto non contén palabras";}
        }

        return $errors;
    }

    public function showIterativas06(array $input = [], array $errors = [], string $result = ""): void
    {
        $data = array(
            'titulo' => 'Iterativas 06',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas06'],
            'seccion' => '/iterativas06',
            'tituloEjercicio' => 'Criba de Erastótenes',
            'errors' => $errors,
            'input' => $input,
            'cribado' => $result
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas06.view.php',
            'templates/footer.view.php'), $data);
    }
    public function doIterativas06(): void
    {
        $errors = $this->checkForm06($_POST);
        $input = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $result = "";

        if ($errors === []) {
            $numero = intval($_POST['input_erasto']);
            $listaNumeros = [];

            for ($i = 1; $i <= $numero; $i++) {
                $listaNumeros[] = $i;
            }

            for ($i = 1; $i < count($listaNumeros); $i++) {
                for ($j = $i + 1; $j < count($listaNumeros); $j++) {
                    if ($listaNumeros[$j] % $listaNumeros[$i] === 0) {
                        array_splice($listaNumeros, $j, 1);
                    }
                }
            }

            $result = implode(', ', $listaNumeros);
        }
        $this->showIterativas06($input, $errors, $result);
    }

    private function checkForm06(array $data): array
    {
        $errors = [];

        if (empty($data['input_erasto'])) {
            $errors['erasto'] = "Inserte un valor no campo";
        } else {
            $check = true;
            $auxArray = str_split($data['input_erasto']);

            for ($i = 0; $i < count($auxArray) && $check; $i++) {
                $check = is_numeric($auxArray[$i]);
            }

            if (!$check) {
                $errors['erasto'] = "Debes insertar un numero enteiro";
            }
        }

        return $errors;
    }

    public function showIterativas07(array $input = [], array $errors = [], string $result = ""): void
    {
        $data = array(
            'titulo' => 'Iterativas 07',
            'breadcrumb' => ['Inicio', 'Iterativas', 'Iterativas07'],
            'seccion' => '/iterativas07',
            'tituloEjercicio' => 'Bingo',
            'errors' => $errors,
            'input' => $input,
            'cribado' => $result
        );

        $this->view->showViews(array('templates/header.view.php', 'iterativas07.view.php',
            'templates/footer.view.php'), $data);
    }

    public function doIterativas07(): void
    {
    }
}
