<?php

$query = mysqli_query(dbConnect(), "SELECT * FROM comments");

$reviews = [];

while ($row = mysqli_fetch_assoc($query)) {
    $reviews[] = $row;
}
