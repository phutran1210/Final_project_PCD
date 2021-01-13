<?php
    session_start();
    require('../../doanadmin/modules/config.php');

    //Thêm mới sản phẩm
    if(isset($_POST['add-to-cart'])){
        $id = $_GET['id'];
        $soluong = $_POST['soluong'];
        $sql_products = "SELECT * FROM `product` WHERE `id_product` = '$id' LIMIT 1";
        $query_products = mysqli_query($conn, $sql_products);
        $row_product = mysqli_fetch_array($query_products);
        
        if($row_product){
            $new_product = array(
                array(
                'id' => $id,
                'product_name' => $row_product['product_name'],
                'soluong' => $soluong,
                'price' => $row_product['price']
                )
            );
            if(isset($_SESSION['product'])){
                $found = false;
                foreach($_SESSION['product'] as $cart_item){
                    if($cart_item['id'] == $id){
                        $product[] = array(
                            'id' => $cart_item['id'],
                            'product_name' => $cart_item['product_name'],
                            'soluong' => $soluong,
                            'price' => $cart_item['price']
                        );
                        $found = true;
                    }else{
                        ob_start();
                        $product[] = array(
                            'id' => $cart_item['id'],
                            'product_name' => $cart_item['product_name'],
                            'soluong' => $cart_item['soluong'],
                            'price' => $cart_item['price']
                        );
                        ob_flush();
                    }
                }
                if($found == false){
                    $_SESSION['product'] = array_merge($product, $new_product);
                }else{
                    $_SESSION['product'] = $product;
                }
            }else{
                $_SESSION['product'] = $new_product;
            }
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    //Thêm 1 sản phẩm
    if(isset($_GET['plus'])){
        $id = $_GET['plus'];
        foreach($_SESSION['product'] as $cart_item){
            if($id != $cart_item['id']){
                $product[] = array(
                    'id' => $cart_item['id'],
                    'product_name' => $cart_item['product_name'],
                    'soluong' => $cart_item['soluong'],
                    'price' => $cart_item['price']
                );
                $_SESSION['product'] = $product;
            }else{
                $tang = $cart_item['soluong'] + 1;
                if($cart_item['soluong'] < 5){
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'product_name' => $cart_item['product_name'],
                        'soluong' => $tang,
                        'price' => $cart_item['price']
                    );
                }else{
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'product_name' => $cart_item['product_name'],
                        'soluong' => $cart_item['soluong'],
                        'price' => $cart_item['price']
                    );
                }
                $_SESSION['product'] = $product;
            }
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    //Giảm 1 sản phẩm
    if(isset($_GET['reduced'])){
        $id = $_GET['reduced'];
        foreach($_SESSION['product'] as $cart_item){
            if($id != $cart_item['id']){
                $product[] = array(
                    'id' => $cart_item['id'],
                    'product_name' => $cart_item['product_name'],
                    'soluong' => $cart_item['soluong'],
                    'price' => $cart_item['price']
                );
                $_SESSION['product'] = $product;
            }else{
                $giam = $cart_item['soluong'] - 1;
                if($cart_item['soluong'] > 1){
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'product_name' => $cart_item['product_name'],
                        'soluong' => $giam,
                        'price' => $cart_item['price']
                    );
                }else{
                    $giam = 1;
                    $product[] = array(
                        'id' => $cart_item['id'],
                        'product_name' => $cart_item['product_name'],
                        'soluong' => $giam,
                        'price' => $cart_item['price']
                    );
                }
                $_SESSION['product'] = $product;
            }
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    //Xóa 1 sản phẩm
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        echo '<pre>';
		print_r($_SESSION['product']);
        echo '</pre>';
        echo '<br>';
        for($i = 0; $i < count($_SESSION['product']); $i++){
            if($_SESSION['product'][$i]['id'] == $id){
                unset($_SESSION['product'][$i]);
            $i++;
            }
        }
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

    //Xóa toàn bộ
    if(isset($_GET['deleteAll'])&&$_GET['deleteAll']==1){
		unset($_SESSION['product']);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>