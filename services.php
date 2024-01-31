<?php

class Services {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getArticlesList() {
        // Get all Articles
        $stmt = $this->conn->prepare("SELECT article.*, author.firstName, author.lastName, author.email 
                             FROM article 
                             LEFT JOIN author ON article.author = author.id order by article.id");
        
        // Execute the request
        $stmt->execute();

        // Fetch the results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getArticleById($articleId) {
        // Get article by ID
        $stmt = $this->conn->prepare("SELECT article.*, author.firstName, author.lastName, author.email 
                                     FROM article 
                                     LEFT JOIN author ON article.author = author.id 
                                     WHERE article.id = :id");

        $stmt->bindParam(':id', $articleId, PDO::PARAM_INT);

        // Execute the request
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getNextArticle($articleId){
        // Fetch the IDs of the next and previous articles
        $stmtNext = $this->conn->prepare("SELECT id FROM article WHERE id > :id ORDER BY id ASC LIMIT 1");
        $stmtNext->bindParam(':id', $articleId, PDO::PARAM_INT);
        $stmtNext->execute();
        $nextArticleId = $stmtNext->fetchColumn();
        return($nextArticleId);
    }

    public function getPreviousArticle($articleId){
        // Fetch the IDs of the next and previous articles
        $stmtPrevious = $this->conn->prepare("SELECT id FROM article WHERE id < :id ORDER BY id DESC LIMIT 1");
        $stmtPrevious->bindParam(':id', $articleId, PDO::PARAM_INT);
        $stmtPrevious->execute();
        $previousArticleId = $stmtPrevious->fetchColumn();                
        return($previousArticleId);

}


    
}
?>