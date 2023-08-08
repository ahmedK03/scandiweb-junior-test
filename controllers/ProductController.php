<?php

require_once(__DIR__ . '/../modal/database.php');
require_once(__DIR__ . '/../traits/utils.trait.php');
class ProductController extends Database
{
    // import trait
    use Utils;
    private $varaint_type;
    public function setVarType($id)
    {
        $newVarType = Database::selectVariantName($id);
        $this->varaint_type = $newVarType['name'];
    }

    public function getVarType()
    {
        // result = size or weight or dimensions
        return $this->varaint_type;
    }
    public function showProducts()
    {
        $output = '';
        $productsList = Database::read();
        if (count($productsList)) {
            foreach ($productsList as $product) {
                $unit = $product['name'] == 'size' ? 'MB' : ($product['name'] == 'dimensions' ? '' : 'KG');
                $output =
                    '<div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="single-product d-flex flex-column justify-content-center align-items-center">
                                <div class="form-check align-self-start">
                                    <input class="delete-checkbox form-check-input"
                                    name="product_mass_delete[]" type="checkbox"
                                    value="' . $product['id'] . '"/>
                                </div>
                                <div class="sku">' . $product['sku'] . '</div>
                                <div class="product_name">' . $product['product_name'] . '</div>
                                <div class="product_price">' .
                    number_format($product['product_price'], 2, '.', '') . ' $</div>
                                <div class="product_details"><b class="type">' . ucwords($product['name']) . ':</b> ' . str_replace(',', 'x', $product['values']) . ' ' . $unit . '</div>
                        </article>
                    </div>';
                echo $output;
            }
        }
        return true;
    }
    public function addProduct($typeId, $name, $sku, $price, $typeVal)
    {
        print_r(['id' => $typeId, 'name' => $name, 'sku' => $sku, 'price' => $price, 'extra' => $typeVal]);
        return true;
        // add general info
        Database::insertGeneralInfo($typeId, $name, $sku, $price);
        // add extra info
        Database::insertSwitcherValues($typeId, $typeVal);
    }

    /**
     * check if sku exists in the database onfocusout js event
     */
    public function skuChecker($sku)
    {
        $searchResults = Database::search($sku);
        if (count($searchResults) > 0) {
            echo 'sku already exists';
        }
        return true;
    }

    public function del($arr)
    {
        Database::massDelete($arr);
        return true;
    }

    public function loadProductCategories()
    {
        $catergories = Database::loadCategories();
        foreach ($catergories as $catergory) {
            echo '<option value="' . $catergory['category'] . '" data-id="' . $catergory['id'] . '">' . strtoupper($catergory['category']) . '</option>';
        }
        return null;
    }
}