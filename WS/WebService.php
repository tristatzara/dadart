<?php
  require_once('/lib/vendor/autoload.php');
  require_once('userFunction.php');
  require_once('catalogFunction.php');
  require_once('addressFunction.php');
  require_once('productFunction.php');
  require_once('purchaseFunction.php');
  require_once('artistFunction.php');

  $app = new \Slim\Slim(array(
    'mode'=>'dev'
  ));

  $app->configureMode('prod', function () use ($app){
    $app->config(array(
      'log.enable' => true,
      'debug' => false
    ));
  });

  $app->configureMode('dev', function () use ($app){
    $app->config(array(
      'log.enable' => false,
      'debug' => true
    ));
  });

  $app->group('/api', function() use ($app){
    $app->group('/users', function () use ($app){
      $app->get('/user/:id', function($id){
        echo json_encode(GetUserById($id));
      });
      $app->get('/profile/:id', function($id){
        echo json_encode(GetProfile($id));
      });
      $app->put('/passwordChange', function() use ($app){
        echo json_encode(PutPassword($app->request->params('Password'), $app->request->params('PasswordSalt'), $app->request->params('userId')));
      });
      $app->put('/eamilChange', function() use ($app){
        echo json_encode(PutEmail($app->request->params('profileId'), $app->request->params('email')));
      });
      $app->post('/newUser', function() use ($app){
        echo json_encode(PostUser(json_decode($app->request->header->get('User'))));
      });
      $pp->post('/newProfile', function() use ($app){
        echo json_encode(PostProfile(json_decode($app->request->header->get('Profile'))));
      });
    });
    $app->group('/catalog', function() use($app){
      $app->get('(/:catalogName(/:categoryName(/:subCategoryName+)))', function($catalog = null, $categoryName = null, $subCategoryName = null){
        if($catalog == null){
          echo json_encode(GetAllCatalogs());
          break;
        }
        else if($catalog != null && $categoryName == null){
          $catalogId = GetCatalogByName($catalog);
          $categoryId = GetCategoryByCatalogId($catalogId);
          $categories = new Array();
          foreach ($categoryId as $key => $value) {
              $categories[] = GetCatalogById($value);
          }
          echo json_encode($categories);
        }
        else if($catalog != null && $categoryName != null && $subCategoryName == null){
          $catalogId = GetCatalogByName($catalog);
          $categoryId = GetCategoryByName($categoryName);
          $subCategoriesId = GetSubCategoryByCatalogCategoryId($catalogId, $categoryId);\
          $subCategories = new Array();
          foreach ($subCategoriesId as $key => $value) {
            $subCategories[] = GetSubCageoryNameById($value);
          }
          echo json_encode($subCategories);
        }
        else if($catalog != null && $categoryNAme != null && $subCategoryName != null){
          $ctalogId = GetCatalogByName($catalog);
          $subCategoryId = GetSubCategoryByName(end($subCategoryName));
          $subCategoriesId = GetSubCategoryByCatalogCategoryId($catalogId, $subCategoryId);
          $subCategories = new Array();
          foreach ($subCategoriesId as $key => $value) {
            $subCategories[] = GetSubCategoryById($value);
          }
          echo json_encode($subCategories);
        }
      });
    });
    $app->group('/address', function() use ($app){
      $app->get('/:addressId', function($addressId){
        echo json_encode(GetAddress($addressId));
      });
      $app->get('/address/:profileId', function($profileId){
        echo json_encode(GetAddressProfile($profileId));
      });
      $app->post('/insertAddress', function() use($app){
        echo json_encode(PostAddress(json_decode($app->request->header->get('address'))));
      });
    });
    $app->group('/products', function() use($app){
      $app->get('/all', function(){
        echo json_encode(GetAllProducts());
      });
      $app->get('/cart/:productId', function($productId){
        echo json_encode(GetProductCart($productId));
      });
      $app->get('/detail/:productId', function($productId){
        echo json_encode(GetProductDetail($productId));
      });
      $app->get('(/:categoryId(/:subCategoryId+))', function($catgoryId = null, $subCategoryId = null){
        if($categoryId == null && $subCategoryId == null){
            echo json_encode(GetAllProducts());
        }
        else if ($categoryId != null && $subCategoryId == null){
          echo json_encode(GetProductsCategoryList($categoryId));
        }
        else if ($categoryId != null && $subCategoryId != null){
          echo json_encode(GetProductsSubCategoryList($categorId, end($subCategoryID)));
        }
      });
      $app->post('/newProduct', function() use($app){
        echo json_encode(PostProduct(json_decode($app->request->header->get('product'))))
      });
      $app->put('/updatePrice', function() use($app){
        echo json_encode(UpdatePrice($app->request->params('price'), $app->request->params('productId')));
      });
    });
    $app->group('/purchase', function() use($app){
      $app->get('/all', function(){
        echo json_encode(GetAllPurchase());
      });
      $app->get('/:purchaseId', function($purchaseId){
        echo json_encode(GetPuchase($purchaseId));
      });
      $app->get('/detail/:purchaseId', function($purchaseId){
        echo json_encode(GetPurchaseDetails($purchaseId));
      });
      $app->get('/:profileId', function($profileId){
        echo json_encode(GetPurchasesProfile($profileId));
      });
      $app->post('/newPurchse', function() use($app){
        echo json_encode(PostPurchase(json_decode($app->request->header->get('Purchase'))));
      });
      $app->post('/newPurchaseDetail', function() use($app){
        echo json_encode(PostPurchaseDetal(json_decode($app->request->header->get('PurchaseDetail'))));
      });
    });
    $app->group('/artist', function() use($app){
      $app->get('/all', function(){
        echo json_encode(GetArtists());
      });
      $app->get('/detail/:artistiId', function($artistId){
        echo json_encode(GetArtist($artistId));
      });
      $app->get('/product/:artistId', function($artistiId){
        echo json_encode(GetArtistName($artistId));
      });
      $app->post('/insertArtisti', function() use($app){
        echo json_encode(PostArtist(json_decode($app->request->header->get('Artist'))));
      });
    });
  });

  $app->run();
 ?>
