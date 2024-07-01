<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        $product = Product::find($product_id);
        $product_quantity = $product->product_quantity;

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        if ($product_quantity === null || $product_quantity == 0) {
            Session::flash('error', 'Sản phẩm này hiện đã hết');
            return false;
        }
        if ($qty >$product_quantity) {
            Session::flash('error', 'Số lượng sản phẩm không đủ');
            return false;
        }
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
    
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }
    
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
    
        return true;
    
        // dd($carts);
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('product_id', $productId)
            ->get();
    }

    public function update($request)
    {
        $requestData = $request->input('num_product');
        $carts = Session::get('carts');
        $exceededProducts = [];

        foreach ($requestData as $productId => $quantity) {
            if (!isset($carts[$productId])) {
                continue; 
            }

        
            $product = Product::find($productId);
            if ($quantity > $product->product_quantity) {
                $exceededProducts[] = $product->product_name;
                continue;
            }

           
            $carts[$productId] = $quantity;
        }

 
        if (!empty($exceededProducts)) {
            return [
                'success' => false,
                'message' => 'Số lượng sản phẩm sau đã vượt quá số lượng có sẵn: ' . implode(', ', $exceededProducts)
            ];
        }
        Session::put('carts', $request->input('num_product'));

        return [
            'success' => true,
            'message' => 'Cập nhật giỏ hàng thành công'
        ];
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);

            $this->infoProductCart($carts, $customer->id);
            foreach ($carts as $productId => $quantity) {
                $product = Product::find($productId);
                if (!$product) {
                    throw new \Exception('Sản phẩm không tồn tại.');
                }
    
                if ($product->product_quantity < $quantity) {
                    throw new \Exception('Số lượng sản phẩm không đủ.');
                }
    
                // Giảm số lượng sản phẩm trong kho
                $product->product_quantity -= $quantity;
                $product->save();
            }

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('product_id', 'product_name', 'product_price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('product_id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->product_id,
                'product_quantity'   => $carts[$product->product_id],
                'product_price' => $product->price_sale != 0 ? $product->price_sale : $product->product_price
            ];
        }

        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('product_id', 'product_name', 'thumb');
        }])->get();
    }
}
