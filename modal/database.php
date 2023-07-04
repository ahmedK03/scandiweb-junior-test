<?php
require_once('../config/config.php');
require_once('../interfaces/operations.interface.php');

class Database  extends Config implements Operations  {
    // here goes the crud operations only
    // functions are: read, app, mass delete
    // use interface for totalRowCount, singleProduct
}