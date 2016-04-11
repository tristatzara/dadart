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
      // Test pass.
      $app->get('/user/:id', function($id){
        echo json_encode(GetUserById($id));
      });
      // Test pass.
      $app->get('/profile/:id', function($id){
        echo json_encode(GetProfile($id));
      });
      $app->get('/profile/product/:profileId', function($profileId){
        echo json_encode(GetProductByUser($profileId));
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
      $app->post('/newProfile', function() use ($app){
        echo json_encode(PostProfile(json_decode($app->request->header->get('Profile'))));
      });
    });
    $app->group('/catalog', function() use($app){
      // Tested
      $app->get('(/:catalogName(/:categoryName(/:subCategoryName+)))', function($catalogName = null, $categoryName = null, $subCategoryName = null){
        $returning = array();
        if($catalogName == null){
          $returning = GetAllCatalogs();
        }
        else if($catalogName != null && $categoryName == null){
          $catalogId = GetCatalogByName($catalogName);
          $categoryId = GetCategoryByCatalogId($catalogId[0]['CatalogId']);
          foreach ($categoryId as $key => $value) {
              $returning[] = GetCategoryById($value['CategoryId']);
          }
        }
        else if($catalogName != null && $categoryName != null && $subCategoryName == null){

          $catalogId = GetCatalogByName($catalogName);
          $categoryId = GetCategoryByName($categoryName);
          $subCategoriesId = GetSubCategoryByCatalogCategoryId($catalogId[0]['CatalogId'], $categoryId[0]['CategoryId']);
          foreach ($subCategoriesId as $key => $value) {
            $returning[] = GetSubCageoryNameById($value['SubCategoryId']);
          }
        }
        else if($catalogName != null && $categoryNAme != null && $subCategoryName != null){
          $ctalogId = GetCatalogByName($catalogName);
          $subCategoryId = GetSubCategoryByName(end($subCategoryName));
          $subCategoriesId = GetSubCategoryByCatalogCategoryId($catalogId[0]['CatalogId'], $subCategoryId[0]['SubCategoryId']);
          foreach ($subCategoriesId as $key => $value) {
            $returning[] = GetSubCategoryById($value['SubCategoryId']);
          }

        }
        echo json_encode($returning);
      });
    });
    $app->group('/address', function() use ($app){
      // Tested
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
      // Tested All
      $app->get('/all', function(){
        echo json_encode(GetAllProducts());
      });
      $app->get('/cart/:productId', function($productId){
        echo json_encode(GetProductCart($productId));
      });
      $app->get('/detail/:productId', function($productId){
        echo json_encode(GetProductDetail($productId));
      });
      $app->get('/user/:productId', function($productId){
        echo json_encode(GetUserProduct($productId));
      });
      $app->get('(/:categoryId(/:subCategoryId+))', function($categoryId = null, $subCategoryId = null){
        if($categoryId == null && $subCategoryId == null){
            echo json_encode(GetAllProducts());
        }
        else if ($categoryId != null && $subCategoryId == null){
          echo json_encode(GetProductsCategoryList($categoryId));
        }
        else if ($categoryId != null && $subCategoryId != null){
          echo json_encode(GetProductsSubCategoryList($categoryId, end($subCategoryID)));
        }
      });
      $app->post('/newProduct', function() use($app){
        echo json_encode(PostProductToProfile(json_decode($app->request->header->get('profileToProduct'))));
        echo json_encode(PostProduct(json_decode($app->request->header->get('product'))));
      });
      $app->put('/updatePrice', function() use($app){
        echo json_encode(UpdatePrice($app->request->params('price'), $app->request->params('productId')));
      });
    });
    $app->group('/purchase', function() use($app){
      // Tested
      $app->get('/all', function(){
        echo json_encode(GetAllPurchase());
      });
      $app->get('/:purchaseId', function($purchaseId){
        echo json_encode(GetPuchase($purchaseId));
      });
      $app->get('/detail/:purchaseId', function($purchaseId){
        echo json_encode(GetPurchaseDetails($purchaseId));
      });
      $app->get('/profile/:profileId', function($profileId){
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
      // Tested.
      $app->get('/all', function(){
        echo json_encode(GetArtists());
      });
      $app->get('/detail/:artistiId', function($artistId){
        echo json_encode(GetArtist($artistId));
      });
      $app->get('/product/:artistId', function($artistId){
        echo json_encode(GetArtistName($artistId));
      });
      $app->post('/insertArtisti', function() use($app){
        echo json_encode(PostArtist(json_decode($app->request->header->get('Artist'))));
      });
    });
  });

  $app->run();
 ?>
