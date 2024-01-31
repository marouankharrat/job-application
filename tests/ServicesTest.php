<?php 
// tests/ServicesTest.php

require_once __DIR__ . '/../services.php';

use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase {
    private $services;

    private $mockPdo;

    public function setUp(): void {
        // Create a mock PDO instance
        $this->mockPdo = $this->createMock(PDO::class);

        // Pass the mock PDO to the Services class
        $this->services = new Services($this->mockPdo);
    }

    public function tearDown(): void {
    }


    public function testGetArticlesList() {
        // Mock the expected result from the database
        $expectedResult = [
            [
                'id' => 1,
                'title' => 'Article 1',
                'content' => 'Lorem ipsum 1',
                'author' => 1
            ],
            [
                'id' => 2,
                'title' => 'Article 2',
                'content' => 'Lorem ipsum 2',
                'author' => 2
            ],
        ];

        // Mock the database connection's prepare and execute methods
        $mockStmt = $this->createMock(PDOStatement::class);
        $mockStmt->expects($this->once())
            ->method('fetchAll')
            ->willReturn($expectedResult);

        $mockConn = $this->createMock(PDO::class);
        $mockConn->expects($this->once())
            ->method('prepare')
            ->willReturn($mockStmt);

        $services = new Services($mockConn);

        // Call the method being tested
        $result = $services->getArticlesList();

        // Assert that the result matches the expected result
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetArticleById() {
        // Mock the expected result from the database
        $expectedResult = [
            'id' => 1,
            'title' => 'Sample Article',
            'content' => 'Lorem ipsum dolor sit amet',
            'author' => 1
        ];
        

        // Mock the database connection's prepare and execute methods
        $mockStmt = $this->createMock(PDOStatement::class);
        $mockStmt->expects($this->once())
            ->method('fetch')
            ->willReturn($expectedResult);

        $this->mockPdo->expects($this->once())
            ->method('prepare')
            ->willReturn($mockStmt);

        // Call the method being tested
        $result = $this->services->getArticleById(1); // Pass a sample article ID

        // Assert that the result matches the expected result
        $this->assertEquals($expectedResult, $result);
    }
}


?>