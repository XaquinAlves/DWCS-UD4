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

        if ($errors !== []) {
            $this->showIterativas04($input, $errors);
        } else {
            //Pasamos a minúsculas y separamos en un array
            $aux = str_split(strtolower($input['input_letras']));
            $aux = preg_replace("/[^a-z]/", "", $aux);

            $letters = [];
            //Recorremos el array contando las letras con un regex
            for ($i = 0; $i < count($aux); $i++) {
                if (array_key_exists($aux[$i], $letters)) {
                    $letters[$aux[$i]] += 1;
                } else {
                    $letters[$aux[$i]] = 1;
                }
            }
            //limpiamos el array caracteres vacios
            unset($letters['']);
            //Pasamos el array a un formato ordenable
            $letters_sorted = [];

            foreach ($letters as $key => $value) {
                $letters_sorted[] = [$key, $value];
            }
            //Ordenamos el array y lo invertimos para tener de mayor a menor
            $letters_sorted = $this->bubbleSortLetters($letters_sorted);
            $letters_sorted = array_reverse($letters_sorted);
            //Creamos el string de salida
            $letters_string = $this->countArrayToString($letters_sorted);

            $this->showIterativas04($input, [], $letters_string);
        }
    }

    private function checkForm04(array $data): array
    {
        $erros = [];

        if (empty($data['input_letras'])) {
            $erros['letras'] = "Inserte un valor no campo";
        }

        return $erros;
    }

    /**
     * @param array $words_sorted
     * @return string
     */
    public function countArrayToString(array $words_sorted): string
    {
        $words_string = "";

        for ($i = 0; $i < count($words_sorted); $i++) {
            $words_string .= $words_sorted[$i][0] . ": " . $words_sorted[$i][1];

            if ($i < count($words_sorted) - 1) {
                $words_string .= ", ";
            } else {
                $words_string .= ".";
            }
        }
        return $words_string;
    }

    private function bubbleSortLetters(array $arr): array
    {
        $n = count($arr);

        // Traverse through all array elements
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // Swap if the element found is
                // greater than the next element
                if ($arr[$j][1] > $arr[$j + 1][1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }

        return $arr;
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

        if ($errors !== []) {
            $this->showIterativas05($input, $errors);
        } else {
            //Pasamos a minúsculas y separamos en un array
            $aux = explode(" ", strtolower($input['input_palabras']));
            $words = [];
            //Contamos las palabras
            for ($i = 0; $i < count($aux); $i++) {
                //Limpiamos puntuación final
                if (preg_match("/[a-z]+[\.,]/", $aux[$i])) {
                    $aux[$i] = preg_replace("/[\.,]/", "", $aux[$i]);
                }

                if (array_key_exists($aux[$i], $words)) {
                    $words[$aux[$i]] += 1;
                } else {
                    $words[$aux[$i]] = 1;
                }
            }
            //Pasamos el array a un formato ordenable
            $words_sorted = [];

            foreach ($words as $key => $value) {
                $words_sorted[] = [$key, $value];
            }
            //Ordenamos el array y lo invertimos para tener de mayor a menor
            $words_sorted = array_reverse($this->bubbleSortLetters($words_sorted));
            //Creamos el string de salida
            $words_string = $this->countArrayToString($words_sorted);

            $this->showIterativas05($input, [], $words_string);
        }
    }

    private function checkForm05(array $data): array
    {
        $errors = [];

        if (empty($data['input_palabras'])) {
            $errors['palabras'] = "Inserte un valor no campo";
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

        if ($errors !== []) {
            $this->showIterativas06($input, $errors);
        } else {
            $numero = intval($input['input_erasto']);
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
            $this->showIterativas06($input, [], $result);
        }
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
}
