<?php

// Get Coonnection Configuration 
require_once 'db_connection.php';
require_once 'services.php';
require_once 'config.php';


// Create a new DatabaseConnection instance
$dbConnection = new DatabaseConnection($servername, $username, $password, $database);

// Connect to the database
$conn = $dbConnection->connect();

// Create a new DatabaseOperations instance
$services = new Services($conn);

$uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL) ?? '/';
$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS) ?? 'GET';

// Check if the URI matches the pattern /articles/:id
if (preg_match('#^' . preg_quote($basePath . '/articles/', '#') . '(\d+)$#', $uri, $matches) && $method === 'GET') {
    $articleId = isset($matches[1]) ? (int)$matches[1] : null;
    

    // Call your logic function with the extracted $articleId
    $currentArticle = $services->getArticleById($articleId);
   
    // Check if the currentArticle is found
    if ($currentArticle) {

        $nextArticleId = $services->getNextArticle($articleId);
        $previousArticleId = $services->getPreviousArticle($articleId);

        // Include next and previous article IDs in the response
        $result = [
            'id' => $currentArticle['id'],
            'title' => $currentArticle['title'],
            'content' => $currentArticle['content'],
            'author' => [
                'firstName' => $currentArticle['firstName'],
                'lastName' => $currentArticle['lastName'],
                'email' => $currentArticle['email'],
            ],
            'nextArticle' => $nextArticleId ?: 1, // If at the end, start with the first one again
            'previousArticle' => $previousArticleId ?: 3, // If at the beginning, go to the last one
        ];


        // Encode the result to JSON
        $jsonResult = json_encode($result, JSON_PRETTY_PRINT);

        // Output the JSON result
        echo $jsonResult;
    } else {
        // Handle the case where the article is not found
        http_response_code(404);
        echo json_encode(['error' => 'Article not found']);
    }
} elseif ($uri === $basePath . '/articles' && $method === 'GET') {
     // Call your logic function
     $articlesList = $services->getArticlesList();
     $result = [
         'articles' => [],
     ];
     foreach ($articlesList as $row) {
         $author = [
             'firstName' => $row['firstName'],
             'lastName' => $row['lastName'],
             'email' => $row['email'],
         ];
     
         // Check if the article already exists in the result
         $existingArticle = array_filter($result['articles'], function ($item) use ($row) {
             return $item['id'] == $row['id'];
         });
     
         // If the article doesn't exist, add it to the result
         if (empty($existingArticle)) {
             $result['articles'][] = [
                 'id' => $row['id'],
                 'title' => $row['title'],
                 'content' => $row['content'],
                 'author' => $author,
             ];
         } else {
             // If the article already exists, add the author to the existing article
             $result['articles'][key($existingArticle)]['author'] = $author;
         }
     }
     
     // Encode the result to JSON
     $jsonResult = json_encode($result, JSON_PRETTY_PRINT);
     
     // Output the JSON result
     echo $jsonResult;
} else {
    // Handle other routes/methods as needed
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}






//$articleById = $services->getArticleById($articleId);

// Close the database connection when done (optional for PDO)
$dbConnection->closeConnection();
?>