# Exercise 1: PHP basics with articles and authors

Create following data model (classes, logic, database tables, whatever you think is needed) to fulfill following requirements:
- There is a blog application
- The blog has `articles`
- An article has a `title` and `content` attribute
- The blog has `authors`
- An author has a `first name`, `last name` and `email` address attribute
- Each article is written by an author
- An author can have `n` articles

You can structure your classes, database tables, logic – and whatever you think is needed, the way you like. Please provide as result following json output:

### Articles overview: http://some-local-url/articles

```json
{
  "articles": [
    {
      "id": 1,
      "title": "article 1 title",
      "content": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam",
      "author": {
        "firstName": "Max",
        "lastName": "Mustermann",
        "email": "max.mustermann@example.com"
      }
    },
    {
      "id": 2,
      "title": "article 2 title",
      "content": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam",
      "author": {
        "firstName": "Maria",
        "lastName": "Musterfrau",
        "email": "maria.musterfrau@example.com"
      }
    },
    {
      "id": 3,
      "title": "article 3 title",
      "content": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam",
      "author": {
        "firstName": "Max",
        "lastName": "Mustermann",
        "email": "max.mustermann@example.com"
      }
    }
  ]
}
```

The overview page should list all articles with the assigned authors from the database.

### Articles detail view: http://some-local-url/articles/:id

The `:id` is a placeholder for the `id` of an article.

```json
{
  "id": 1,
  "title": "article 1 title",
  "content": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam",
  "author": {
    "firstName": "Max",
    "lastName": "Mustermann",
    "email": "max.mustermann@example.com"
  }
}
```

### Article next / previous switcher
Add `nextArticle` and `previousArticle` in the detail-view response - and add the `ids` of the next and previous article from the database - if you are “at the end” - start with the first one again:

```json
{
  "id": 1,
  "title": "article 1 title",
  "content": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam",
  "author": {
    "firstName": "Max",
    "lastName": "Mustermann",
    "email": "max.mustermann@example.com"
  },
  "nextArticle": 2,
  "previousArticle": 3
}
```

### Testing
Add `Unit tests` for all relevant cases

### Tech requirements
- use latest PHP version
- use one of the following databases: MariaDB, MySQL or SQLite
- use your preferred local setup (for example: Docker, XAMPP, MAMP, …)
- do NOT use any framework like Symfony, Laravel and co.

### Further instructions
- Organize the code, however you feel it is good
- Add all other information to the project, you think makes sense - examples:
    - README / Documentation / Instructions
    - Migrations
    - Demo data
    - Database schema
    - ...

[Back to overview](../README.md)