<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "capstone";
// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function save($table, $data)
{
    global $conn;
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param(str_repeat("s", count($data)), ...array_values($data));
    if ($stmt->execute()) {
        $last_insert_id = mysqli_insert_id($conn);
        return $last_insert_id;
    } else {
        return false;
    }
}

//sample save('table_name',['column1' => 'value1', 'column2' => 'value2']);
//sample save in data  save('table_name',$data);

function update($table, $id, $data)
{
    global $conn;
    $id_conditions = array_map(function ($column, $value) {
        return "$column = ?";
    }, array_keys($id), array_values($id));
    $set = implode(", ", array_map(function ($column) {
        return "$column = ?";
    }, array_keys($data)));
    $sql = "UPDATE $table SET $set WHERE " . implode(" AND ", $id_conditions);
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        return false;
    }
    $values = array_merge(array_values($data), array_values($id));
    $types = str_repeat("s", count($data) + count($id));
    $stmt->bind_param($types, ...$values);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

//sample update('users', ['id' => $id], ['username' => $username]);


function delete($table, $conditions)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE ";
    $params = [];
    foreach ($conditions as $column => $value) {
        $sql .= "$column = ? AND ";
        $params[] = $value;
    }
    $sql = substr($sql, 0, -4);
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
//sample delete('tablename', ['id' => $id]);

function find($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    foreach ($conditions as $column => $value) {
        $sql .= "$column = ? AND ";
        $params[] = $value;
    }
    $sql = substr($sql, 0, -4);
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
function like($table, $columns)
{
    global $conn;
    $whereClauses = array();
    foreach ($columns as $column => $value) {
        $whereClauses[] = "$column LIKE '%" . mysqli_real_escape_string($conn, $value) . "%'";
    }
    $whereClause = implode(' OR ', $whereClauses);
    $query = "SELECT * FROM $table WHERE $whereClause";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $results;
    }
}


// usage example: find('tablename', ['username' => $username]);
function findAll($table, $orderBy = null)
{
    global $conn;
    $orderByClause = ($orderBy !== null) ? "ORDER BY " . key($orderBy) . " " . current($orderBy) : "";
    $stmt = $conn->prepare("SELECT * FROM $table $orderByClause");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

//sample findAll('table_name')
function find_groupby($table, $groupby)
{
    global $conn;
    $sql = "SELECT * FROM $table GROUP BY $groupby";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
function find_groupbywhere($table, $groupby = null, $condition = array(), $between = array())
{
    global $conn;
    $where_clause = "";
    $params = array();

    if (!empty($condition)) {
        $conditions_arr = array();
        foreach ($condition as $key => $value) {
            $conditions_arr[] = "$key = ?";
            $params[] = $value;
        }
        $where_clause = "WHERE " . implode(' AND ', $conditions_arr);
    }

    if (!empty($between)) {
        foreach ($between as $key => $value) {
            $where_clause .= " AND $key BETWEEN ? AND ?";
            $params[] = $value[0];
            $params[] = $value[1];
        }
    }

    $groupby_clause = "";
    if (!is_null($groupby)) {
        $groupby_clause = "GROUP BY $groupby";
    }

    $sql = "SELECT * FROM $table $where_clause $groupby_clause";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


function find_where($table, $columns_and_values, $order_by = null, $order_dir = 'ASC')
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    $types = "";
    $i = 0;
    foreach ($columns_and_values as $column => $value) {
        $sql .= "$column = ? ";
        $params[] = &$columns_and_values[$column];
        $types .= "s";
        if (++$i !== count($columns_and_values)) {
            $sql .= "AND ";
        }
    }

    // Add ORDER BY clause if $order_by is set
    if ($order_by) {
        $sql .= "ORDER BY $order_by $order_dir";
    }

    $stmt = mysqli_prepare($conn, $sql);
    array_unshift($params, $types);
    call_user_func_array(array($stmt, "bind_param"), $params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


//sample find_where('table_name', ['column'=>$username]);

function first($table, $columns_and_values, $orderBy = null)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    $types = "";
    $i = 0;
    foreach ($columns_and_values as $column => $value) {
        $sql .= "$column = ? ";
        $params[] = &$columns_and_values[$column];
        $types .= "s";
        if (++$i !== count($columns_and_values)) {
            $sql .= "AND ";
        }
    }
    if ($orderBy !== null) {
        $orderByClause = key($orderBy) . " " . current($orderBy);
        $sql .= "ORDER BY $orderByClause ";
    }
    $sql .= "LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    array_unshift($params, $types);
    call_user_func_array(array($stmt, "bind_param"), $params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

//sample $first = first('users', ['username'=>$username]);  return the first value find
function firstJoin($table, $joins, $conditions = [], $orderBy = null)
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
    }
    if ($orderBy !== null) {
        $orderByClause = key($orderBy) . " " . current($orderBy);
        $query .= " ORDER BY $orderByClause ";
    }
    $query .= " LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    if (!empty($conditions)) {
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}






function whereNotIn($table, $exclude_columns)
{
    global $conn;
    $conditions = array();
    $values = array();
    $types = "";
    foreach ($exclude_columns as $column => $exclude_values) {
        $placeholders = implode(',', array_fill(0, count($exclude_values), '?'));
        $conditions[] = "$column NOT IN ($placeholders)";
        $values = array_merge($values, $exclude_values);
        $types .= str_repeat("s", count($exclude_values));
    }
    $sql = "SELECT * FROM $table WHERE " . implode(' AND ', $conditions);
    $stmt = mysqli_prepare($conn, $sql);
    array_unshift($values, $types);
    call_user_func_array(array($stmt, "bind_param"), makeValuesReferenced($values));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//sample $data = whereNotIn($table, 'column_name', ['value1', 'value2', 'value3']);
function makeValuesReferenced($arr)
{
    $refs = array();
    foreach ($arr as $key => $value)
        $refs[$key] = &$arr[$key];
    return $refs;
}

function joinTable($table, $joins, $conditions = [])
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function joinTableBetween($table, $joins, $conditions = [], $between = null)
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            if (is_array($value) && count($value) === 2 && !is_null($between)) {
                $where_clauses[] = "$column BETWEEN ? AND ?";
                $params[] = $value[0];
                $params[] = $value[1];
            } else {
                $where_clauses[] = "$column = ?";
                $params[] = $value;
            }
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function joinTableWherein($table, $joins, $conditions = [])
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            if (is_array($value)) {
                $in_values = implode(',', array_fill(0, count($value), '?'));
                $where_clauses[] = "$column IN ($in_values)";
                $params = array_merge($params, array_values($value));
            } else {
                $where_clauses[] = "$column = ?";
                $params[] = $value;
            }
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function joinTableWhere_in($table, $joins, $conditions = [], $whereIn = [])
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    $where_clauses = array();
    $params = array();
    if (!empty($conditions)) {
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
    }
    if (!empty($whereIn)) {
        foreach ($whereIn as $column => $values) {
            if (!empty($values)) {
                $in_values = implode(',', array_fill(0, count($values), '?'));
                $where_clauses[] = "$column IN ($in_values)";
                $params = array_merge($params, array_values($values));
            }
        }
    }
    if (!empty($where_clauses)) {
        $query .= " WHERE " . implode(" AND ", $where_clauses);
    }
    $stmt = mysqli_prepare($conn, $query);
    if (!empty($params)) {
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function countResult($table, $where_conditions = array(), $whereIn_conditions = array())
{
    global $conn;
    $query = "SELECT COUNT(*) FROM $table";

    // Add WHERE clause if provided
    if (!empty($where_conditions)) {
        $where = array();
        foreach ($where_conditions as $field => $value) {
            $where[] = "$field = '$value'";
        }
        $query .= " WHERE " . implode(' AND ', $where);
    }

    // Add WHERE IN clause if provided
    if (!empty($whereIn_conditions)) {
        $whereIn = array();
        foreach ($whereIn_conditions as $field => $values) {
            $whereIn[] = "$field IN ('" . implode("', '", $values) . "')";
        }
        if (!empty($where_conditions)) {
            $query .= " AND " . implode(' AND ', $whereIn);
        } else {
            $query .= " WHERE " . implode(' AND ', $whereIn);
        }
    }

    // Execute the query and return the count
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_row($result)[0];
    return $count;
}

function countResultWhereIn($table, $conditions)
{
    global $conn;
    $query = "SELECT COUNT(*) FROM $table";
    $where = array();
    foreach ($conditions as $field => $value) {
        $where[] = "$field = '$value'";
    }
    if (!empty($where)) {
        $query .= " WHERE " . implode(' AND ', $where);
    }
    // execute the query and return the count
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_row($result)[0];
    return $count;
}

function lastResult($table, $idField, $conditions)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE ";
    $where = array();
    foreach ($conditions as $field => $value) {
        $where[] = "$field = '$value'";
    }
    $query .= implode(' AND ', $where);
    $query .= " ORDER BY $idField DESC LIMIT 1"; // Use the provided id field
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function joinTableGroup($table, $joins, $group_by = null)
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!is_null($group_by)) {
        $query .= " GROUP BY $group_by";
    }
    $stmt = mysqli_prepare($conn, $query);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}


function countResultJoin($table, $join_conditions = array(), $where_conditions = array())
{
    global $conn;
    $query = "SELECT COUNT(*) FROM $table";

    // Add JOIN clauses if provided
    if (!empty($join_conditions)) {
        foreach ($join_conditions as $join) {
            $join_table = $join[0];
            $join_condition1 = $join[1];
            $join_condition2 = $join[2];
            $query .= " JOIN $join_table ON $join_condition1 = $join_condition2";
        }
    }

    // Add WHERE clause if provided
    if (!empty($where_conditions)) {
        $where = array();
        foreach ($where_conditions as $field => $value) {
            if (is_array($value) && count($value) == 2) {
                // If the value is an array with two elements, assume the first element is the operator
                // and the second element is the value to be compared against
                $operator = $value[0];
                $value = $value[1];
                $where[] = "$field $operator '$value'";
            } else {
                $where[] = "$field = '$value'";
            }
        }
        $query .= " WHERE " . implode(' AND ', $where);
    }

    // Execute the query and return the count
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_row($result)[0];
    return $count;
}


//sample $result = join("users", [["departments", "users.department_id", "departments.department_id"]], ["users.name" => "John Doe"]);
//$result = join("users", [["departments", "users.department_id", "departments.department_id"]]);

function countResultJoinBetween($table, $join_conditions = array(), $where_conditions = array())
{
    global $conn;
    $query = "SELECT COUNT(*) FROM $table";

    // Add JOIN clauses if provided
    if (!empty($join_conditions)) {
        foreach ($join_conditions as $join) {
            $join_table = $join[0];
            $join_condition1 = $join[1];
            $join_condition2 = $join[2];
            $query .= " JOIN $join_table ON $join_condition1 = $join_condition2";
        }
    }

    // Add WHERE clause if provided
    if (!empty($where_conditions)) {
        $where = array();
        foreach ($where_conditions as $field => $value) {
            if (is_array($value) && count($value) == 3) {
                // If the value is an array with three elements, assume the first element is the field name,
                // the second element is the operator and the third element is the value to be compared against
                $field_name = $value[0];
                $operator = $value[1];
                $value = $value[2];
                $where[] = "$field_name $operator '$value'";
            } else {
                $where[] = "$field = '$value'";
            }
        }
        $query .= " WHERE " . implode(' AND ', $where);
    }

    // Execute the query and return the count
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_row($result)[0];
    return $count;
}
