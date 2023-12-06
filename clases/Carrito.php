<?PHP
class Carrito
{

    /**
     * agregar items al carrito
     * @param int $productoID El ID del producto
     * @param int $cantidad La cantidad
     */
    public function add_item(int $productoID, int $cantidad)
    {
        $itemData = (new Pokes)->filtrado_Id($productoID);

        if ($itemData) {
            $_SESSION['carrito'][$productoID] = [
                'producto' => $itemData->getNombre(),
                'portada' => $itemData->getImagen(),
                'precio' => $itemData->getPrecio(),
                'tipo1'=>$itemData->getTipo1(),
                'tipo2'=>$itemData->getTipo2(),
                'cantidad' => $cantidad
            ];
        }
    }


    /**
     * Elimina un item del carrito de compras
     * @param int $productoID El id del producto a elminar
     */
    public function remove_item(int $productoID)
    {
        if (isset($_SESSION['carrito'][$productoID])) {
            unset($_SESSION['carrito'][$productoID]);
        }
    }

    /**
     * Vacia el carrito de compras
     */
    public function clear_items()
    {
        $_SESSION['carrito'] = [];
    }

    /**
     * Actualiza las cantidades de los ids provistos
     * @param array $cantidades Array asociativo con las cantidades de cada ID
     */
    public function update_quantities(array $cantidades)
    {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

    /**
     * devuelve el contenido del carrito de compras actual
     */
    public function get_carrito(): array
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }

    /**
     * Devuelve el precio total actual del carrito de compras
     */
    public function precio_total(): float
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
}
