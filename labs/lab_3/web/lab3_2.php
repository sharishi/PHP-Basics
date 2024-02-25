<?php
// Определение ассоциативного массива транзакций
$transactions = [
    [
        "transaction_id" => 1, // Уникальный идентификатор транзакции
        "transaction_date" => "2023-07-24", // Дата транзакции
        "transaction_amount" => 87.34, // Сумма транзакции
        "transaction_description" => "Shopping", // Описание транзакции
        "merchant_name" => "MallDova", // Название организации-торговой точки
    ],
    [
        "transaction_id" => 2,
        "transaction_date" => "2023-12-08",
        "transaction_amount" => 178.27,
        "transaction_description" => "Spa with friends",
        "merchant_name" => "Wellness spa",
    ],
];
// Функция addTransaction для добавления новых транзакций
function addTransaction($id, $date, $amount, $description, $merchant, &$transactions)
{
    $newTransaction = [
        "transaction_id" => $id,
        "transaction_date" => $date,
        "transaction_amount" => $amount,
        "transaction_description" => $description,
        "merchant_name" => $merchant,
    ];

    $transactions[] = $newTransaction;
}

// Пример добавления новых транзакций
addTransaction(3, "2022-09-21", 345.90, "Online shopping", "MakeUp", $transactions);
addTransaction(4, "2023-11-11", 59.65, "Go grocery store", "№1", $transactions);

// Вывод массива транзакций после добавления новых
echo "<pre>";
print_r($transactions);
echo "</pre>";

// Функция calculateTotalAmount для вычисления общей суммы транзакций
function calculateTotalAmount($transactions)
{
    $sum = 0;
    foreach ($transactions as $transaction) {
        $sum += $transaction['transaction_amount'];
    }
    return $sum;
}

// Вычисление и вывод общей суммы транзакций
$totalAmount = calculateTotalAmount($transactions);
echo "Общая сумма всех транзакций: $totalAmount <br />";

// Функция calculateAverage для вычисления средней суммы транзакций
function calculateAverage($transactions)
{
    $sum = 0;

    foreach ($transactions as $transaction) {
        $sum += $transaction['transaction_amount'];
    }

    $totalTransactions = count($transactions);
    return $sum / $totalTransactions;
}

// Вычисление и вывод средней суммы транзакций
$averageAmount = calculateAverage($transactions);
echo "Среднее арифметическое сумм всех транзакций: $averageAmount<br />";

// Функция mapTransactionDescriptions для создания массива описаний транзакций
function mapTransactionDescriptions($transactions)
{
    return array_map(function ($transaction) {
        return $transaction['transaction_description'];
    }, $transactions);
}

// Вызов функции и вывод результата на экран
$descriptions = mapTransactionDescriptions($transactions);
echo "Описания транзакций: ";
print_r($descriptions);
echo "<br /><br />";

// Вывод таблицы HTML для отображения транзакций
?>
<table border="1">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th colspan="5">Транзакции</th>
    </tr>
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма транзакции</th>
        <th>Описание транзакции</th>
        <th>Название организации</th>
    </tr>
    <?php
    // Итерация по транзакциям для вывода данных в таблице
    foreach ($transactions as $transaction) { ?>
        <tr>
            <td><?php echo $transaction['transaction_id']; ?></td>
            <td><?php echo $transaction['transaction_date']; ?></td>
            <td><?php echo $transaction['transaction_amount']; ?></td>
            <td><?php echo $transaction['transaction_description']; ?></td>
            <td><?php echo $transaction['merchant_name']; ?></td>
        </tr>
    <?php }

