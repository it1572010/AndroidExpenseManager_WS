<?php

include_once '../entity/CategoryIncome.php';
include_once '../dao/CategoryIncomeDaoImpl.php';
include_once '../util/PDOUtil.php';

/**
 * Description of getCategoriesIncomeService
 *
 * @author Win10
 */
$apiKey = filter_input(INPUT_GET, 'api_key');
header("content-type:application/json");
if (isset($apiKey)) {
    $categoryIncomeDao = new CategoryIncomeDaoImpl();
    $result = $categoryIncomeDao->getAllCategoriesIncome();
    $categoriesIncome = array();
    foreach ($result as $categoryIncome) {
        array_push($categoriesIncome, $categoryIncome);
    }
    echo json_encode($categoriesIncome);
} else {
    $jsonData = array();
    $jsonData['status'] = 2;
    $jsonData['message'] = 'API Key not recognized';
    echo json_encode($jsonData);
}