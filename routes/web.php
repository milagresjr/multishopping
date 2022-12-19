<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::resource('product-category','ProductController');

Route::get('product-category','ProductCategoryController@index')->name("product");

Route::get('product-category/{id}','ProductCategoryController@showCategory')->name("product-category");

Route::get('product-category/{id}/{idSub}','ProductCategoryController@showSubCategory')->name("product-subcategory");

Route::get('product-category','ProductCategoryController@showSubCategoryAll')->name("product-subcategory-all");


Route::get('product-details/{id}','ProductDetailsController@show')->name('product-details');

Route::get('/','HomeController@index')->name("home");


Route::get('cart/add', function(){
    return view('home');
});

Route::get('books/','LivroController@showAllLivro')->name("books");

Route::get('book-details/{idLivro}','LivroController@showBook')->name("book_details");

Route::get('books/{idCat}','LivroController@showLivroCat')->name("books_cat");

Route::post('cart/add','CarrinhoController@addCarrinho')->name("add_cart");
Route::post('cart/buy','CarrinhoController@comprarDireito')->name("comprar_dir");

Route::delete('/cart/delete','CarrinhoController@excluirCarrinho')->name("delete_cart");

Route::post('/cart/finish','CarrinhoController@concluir')->name("concluir_cart");

Route::get('/checkout','CarrinhoController@checkout')->name("checkout_cart");

Route::match(['get','post'],'/payment','CarrinhoController@payment')->name("payment_cart");

Route::match(['get','post'],'/finish/{idPedido}/{formaPag}','CarrinhoController@finish')->name("finish_cart");

Route::get('/cart/buy','CarrinhoController@comprar')->name("comprar_cart");

Route::get('/view-cart','CarrinhoController@index')->name("view_cart");

Route::post('pedido/cancel','CarrinhoController@cancelarPedido')->name('cancelar_pedido');

Route::post('pedido/admin/cancel','PedidoAdminController@cancelarPedido')->name('cancelar_pedido_admin');

Route::post('pedido/admin/finish','PedidoAdminController@finalizarPedido')->name('finalizar_pedido_admin');

Route::get('download/{idLivro}/{plano}','DownloadController@download')->name('download');
Route::get('download-gratis/{idLivro}','DownloadController@downloadGratis')->name('download_gratis');

Route::post('cadCliente','ClientController@cadastrar')->name("cadastrar_cliente");
Route::post('altDados','ClientController@storeDados')->name("alterar_dados_cliente");

Route::match(['get'],'logar/cliente','ClientController@logar')->name("login-cliente");

Route::get('logoutCliente','ClientController@logout')->name("logout");

Route::get('search','ProductController@search')->name("search_product");

Route::post('envio-cod','ClientController@formaEnvioCod')->name("forma_envio_cod");

Route::get('retirar-pontos/{idPonto}','PontosAdminController@retirarPontos')->name('retirar_pontos');

Route::get('marcar-lida/{idNoti}','NotificationsController@marcarNotiLida')->name('marcar_lida');

Route::get('faq','MyFunctionController@faq')->name('faq');
Route::get('reset-password','MyFunctionController@recuperarSenha')->name('recuperar_senha');

/* ADMIN */
Route::get('admin/home','AdminController@index')->name("index-admin");
Route::resource('admin/products','ProductAdminController');
Route::resource('admin/clients','ClientAdminController');
Route::resource('admin/downloads','DownloadAdminController');
Route::resource('admin/pedidos','PedidoAdminController');
Route::resource('admin/livros','LivroAdminController');
Route::resource('admin/pubslivros','PubsLivroAdminController');
Route::resource('admin/categories/livros','CategoryLivroAdminController');
Route::resource('admin/categories','CategoryAdminController');
Route::resource('admin/subcategories','SubCategoryAdminController');
Route::resource('admin/caracteristics','CaracteristicAdminController');
Route::post('admin/login','AdminController@logar')->name("login-admin");
Route::match(['post','get'],'categoria-change/{categoria}','ProductAdminController@categorias_change')->name("categoria_change");
Route::get('admin/logout','AdminController@logout')->name("logout_admin");
Route::get('admin/add-carac/{id}','ProductAdminController@addCaracteristica')->name('add_carac');
Route::get('admin/add-image/product/{id}','ProductAdminController@addImageProduct')->name('add_image');
Route::get('admin/points','PontosAdminController@index')->name("home_pontos");
Route::get('admin/email-marketing','EmailMarketingController@index')->name('email_marketing');
Route::get('admin/notification', function(){
   return view('admin.notificacao-admin');
})->name('notification');

Route::post('admin/add-image/product/store','ProductAdminController@addImageProductStore')->name('add_image_store');
Route::match(['get','post','delete'],'admin/delete-image/product/store/{idImg}/{idProduto}','ProductAdminController@deleteImageProduct')->name('delete_image_store');

Route::get('admin/add-promo/{id}','ProductAdminController@addPromocao')->name('add_promo');
Route::post('admin/add/carac/','ProductAdminController@addCaracteristicaStore')->name('add_carac_store');
Route::post('admin/add/promo/','ProductAdminController@addPromoStore')->name('add_promo_store');
Route::get('admin/add-image/categoria/{id}','CategoryAdminController@addImage')->name('add_image_cat');
Route::post('admin/add/image/categoria/{id}','CategoryAdminController@addImageStore')->name('add_image_cat_store');
Route::get('admin/pedidos/details/{idPedido}','PedidoAdminController@detailsPedidos')->name('details_pedido_admin');


Route::get('cliente-ativar/{id}','ClientAdminController@ativar')->name('ativar_client');
Route::get('cliente-desativar/{id}','ClientAdminController@desativar')->name('desativar_client');
Route::get('cliente-habilitar-plano/{id}','ClientAdminController@habilitarPlano')->name('habilitar_plano');

Route::get('cliente-ativar-plano/{idCliente}/{plano}','ClientAdminController@habilitarPlanoStore')->name('ativar_plano');
//Route::redirect('login','home');

/*Route::get('login', function() {
   return
});*/

Route::get('myaccount','ClientController@myaccount')->name('myaccount');
Route::get('myaccount/pedidos','ClientController@mypedidos')->name('mypedidos');
Route::get('myaccount/details-pedidos/{idPedido}','ClientController@detailsPedidos')->name('details_pedido');
Route::get('myaccount/downloads','ClientController@mydownloads')->name('mydownloads');
Route::get('myaccount/dados','ClientController@mydados')->name('mydados');
Route::get('myaccount/points','ClientController@mypontos')->name('mypontos');
Route::get('myaccount/points/levantar','ClientController@levantarPontos')->name('levantar_pontos');
Route::post('myaccount/points/register-data','ClientController@registarDadosBancarios')->name('registar_dados_bancarios');
Route::post('client/evaluation','ClientController@avaliar')->name('avaliar');


Route::post('/send-mail/finish','CarrinhoController@sendEmail')->name('send_mail');
//Route::post('/send-mail/reset_password','ClientController@sendEmailResetPass')->name('send_mail_reset_pass');
Route::post('/send-mail/reset_password','ClientController@sendEmailResetPassStore')->name('send_mail_reset_pass_store');
Route::post('/send-mail/reset_password/store','ClientController@alterarSenhaVeriCod')->name('alterar_senha_veri_cod');

Route::post('/newsletter/store','MyFunctionController@newsletterStore')->name('newsletter_store');

Route::get('our-community','MyFunctionController@ourCommunity')->name('our_community');

Route::get('community-package/{plano}','MyFunctionController@communityPackage')->name('community_package');

Route::get('politica-privacidade','MyFunctionController@politicaPrivacidade')->name('politica_privacidade');
Route::get('/messege/reset-password',function(){
    return view('recupera-senha3');
})->name('recupera_senha3');