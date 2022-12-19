<?php

namespace App\Http\Controllers;

use App\Models\Caracteristcs;
use App\Models\Category;
use App\Models\ImagensProduct;
use App\Models\Product;
use App\Models\ProductCaracteristic;
use App\Models\Promocao;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = \DB::select('SELECT * FROM products ORDER BY id DESC');
        $listaImagens = \DB::select('SELECT * FROM imagens_product GROUP BY product_id');
        $listaCarac = \DB::select('SELECT * FROM caracteristics');
        $listaProdutoCarac = \DB::select('SELECT * FROM product_caracteristics');
        $listaProdEmPromo = \DB::select('SELECT * FROM promocoes WHERE data_final > NOW()'); #Promocao::all();

        return view('admin.products-admin',compact('produtos','listaImagens','listaCarac','listaProdutoCarac','listaProdEmPromo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \DB::select('select * from categories');
        $subcategorias = \DB::select('select * from sub_categories');
        return view('admin.create-product-admin',compact('categorias','subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nome = $request->input('nome');
        $preco = $request->input('preco');
        $quantidade = $request->input('quantidade');
        $categoria = $request->input('categoria');
        $subcategoria = $request->input('subcategoria');
        $descricao = $request->input('descricao');

        $insert = Product::create([
            'nome' => $nome,
            'preco' => $preco,
            'descricao' => $descricao,
            'quantidade' => $quantidade,
            'categoria_id' => $categoria,
            'subcategoria_id' => $subcategoria
        ]);

        if($insert)
        {

            $idLastProduct = \DB::select('SELECT * FROM products ORDER BY id DESC LIMIT 1');

            $images = $request->file('imagem');

            foreach($images as $image){
                //$image->store('uploads');
                $file = ImagensProduct::create([
                    'imagem' => $image->store(''),
                    'product_id' => $idLastProduct[0]->id
                ]);
            }

            if($file)
            {
               return redirect('admin/products/create')->with('success','Produto cadastrado com sucesso!');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Product::where('id',$id)->get();
        $categorias = \DB::select('select * from categories');
        $subcategorias = \DB::select('select * from sub_categories');
        $categoriaEspe = Category::where('id',$produto[0]->categoria_id)->get();
        $subcategoriaEspe = SubCategory::where('id',$produto[0]->subcategoria_id)->get();
        return view('admin.edit-product-admin',compact('categorias','subcategorias','produto','categoriaEspe','subcategoriaEspe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nome = $request->input('nome');
        $preco = $request->input('preco');
        $quantidade = $request->input('quantidade');
        $categoria = $request->input('categoria');
        $subcategoria = $request->input('subcategoria');
        $descricao = $request->input('descricao');

        $update = \DB::update('update products set nome=?,preco=?,descricao=?,quantidade=?,categoria_id=?,subcategoria_id=? where id=?',[
            $nome,
            $preco,
            $descricao,
            $quantidade,
            $categoria,
            $subcategoria,
            $id
        ]);

        if($update)
        {
            $ret = redirect('admin/products/')->with('success','Produto alterado com sucesso!');
        }else{
            $ret = redirect('admin/products/edit/',$id)->with('danger','Produto não alterado!');
        }
        return $ret;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteImage = \DB::delete('delete from imagens_product where product_id=?',[$id]);

        if($deleteImage)
        {
            $deleteProduct = \DB::delete('delete from products where id=?',[$id]);

            return redirect('admin/products')->with('success','Produto excluído com sucesso!');
        }
    }

    public function categorias_change($categoria)
    {
        $listaSubcategoria = SubCategory::where('categoria_id',$categoria)->get();

        return response()->json($listaSubcategoria);
    }

    public function addCaracteristica($idProduto)
    {
        $data = [];

        $listaCarac = Caracteristcs::all();

        $data['idProduto'] = $idProduto;
        $data['listaCarac'] = $listaCarac;
        return view('admin.add-carac-admin',$data);
    }
    public function addCaracteristicaStore(Request $request)
    {

        $idProduto = $request->input('product_id');
        $idCaracteristica = $request->input('caracteristica');
        $valor = $request->input('valor');
        $insert = ProductCaracteristic::create([
            'product_id' => $idProduto,
            'caracteristic_id' => $idCaracteristica,
            'valor' => $valor
        ]);
        if($insert){
            return redirect()->route('add_carac',$idProduto)->with('success','Caracteristica adciona ao produto com sucesso!');
        }

    }
    public function addPromocao($idProduto)
    {
        $data = [];

        $data['idProduto'] = $idProduto;
        $data['listaProduto'] = Product::where('id',$idProduto)->get();
        return view('admin.add-promo-admin',$data);
    }
    public function addPromoStore(Request $request)
    {
        $idProduto = $request->input('product_id');
        $porce = $request->input('porcent');
        $dataFinal = $request->input('data');
        $insert = Promocao::create([
            'product_id' => $idProduto,
            'porcentagem' => $porce,
            'data_final' => $dataFinal
        ]);
        if($insert){
            return redirect()->action('ProductAdminController@index')->with('success','Promoção adciona ao produto com sucesso!');
        }
    }

    public function addImageProduct($idProduto)
    {
        $data = [];
        $data['idProduto'] = $idProduto;
        $data['listaImagens'] = ImagensProduct::where('product_id',$idProduto)->get();

        return view("admin.product-add-photo-admin",$data);
    }

    public function addImageProductStore(Request $request)
    {
        $idProduto = $request->input('product_id');
        $images = $request->file('imagem');

        foreach($images as $image){
            //$image->store('uploads');
            $inserir = ImagensProduct::create([
                'imagem' => $image->store(''),
                'product_id' => $idProduto
            ]);
        }
        if($inserir)
        {
            return redirect()->route('add_image',$idProduto)->with('success','Imagem(s) adcionada com sucesso!');
        }
    }
    public function deleteImageProduct($idImg,$idProduto)
    {
        $deleteImage = \DB::delete('delete from imagens_product where id=?',[$idImg]);

        //dd('Testando..');
        if($deleteImage)
        {
            return redirect()->route('add_image',$idProduto)->with('success','Imagem excluída com sucesso!');
        }
    }
}
