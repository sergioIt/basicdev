Yii 2 REST API
============================

HOW TO USE
--------------
#1 INSTALL necessary tables placed at products_categories.sql
#2 USAGE 
GET categories: http://yourdomain/index.php/categories
GET specific categories: http://yourdomain/index.php/categories/1
GET all categories with products http://yourdomain/index.php/categories?expand=products
GET specific category with products http://yourdomain/index.php/categories/1?expand=products

GET categories sorted by their title: 
 sort ASC: http://yourdomain/index.php/categories/?sort=title
 sort DESC: http://yourdomain/index.php/categories/?sort=-title

OTHER BASIC ACTIONS
for create, update, delete action see http://budiirawan.com/setup-restful-api-yii2/

