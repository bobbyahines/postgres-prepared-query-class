# postgres-prepared-query-class
A Class for adding prepared (PDO) queries to an application.

# Queries

**Example:**

```php


$sql = 'SELECT %s, %s, %s FROM my_table LIMIT %d;';
$params = ['col_a', 'col_b', 'col_c', 50];

$queryString = $params
    ? sprintf($sql, ...$params)
    : $sql;

$db = new Database($dbName)
$result = $db->preparedQuery($sql, $$params);

echo json_encode($result).PHP_EOL;
```
