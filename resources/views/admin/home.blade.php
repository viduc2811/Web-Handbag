@extends('admin.main')

@section('content')
    <div class="container mt-4">
        <!-- Doanh thu theo ngày và Lợi nhuận -->
        <div class="row mb-4">
            <!-- Doanh thu theo ngày -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>Doanh thu theo ngày</h4>
                    </div>
                    <div class="card-body">
                        @if ($revenues->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Doanh thu</th>
                                        <th>Số hóa đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revenues as $revenue)
                                        <tr>
                                            <td>{{ $revenue->date }}</td>
                                            <td>{{ number_format($revenue->total_revenue, 0, ',', '.') }} VND</td>
                                            <td>{{ $revenue->total_orders }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $revenues->appends(['inventoryPage' => $productInventory->currentPage()])->links('pagination') !!}
                        @else
                            <p>Không có dữ liệu doanh thu.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Lợi nhuận theo tháng -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>Lợi nhuận</h4>
                    </div>
                    <div class="card-body">
                        @if (count($profits) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Doanh thu</th>
                                        <th>Chi phí</th>
                                        <th>Lợi nhuận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profits as $month => $profit)
                                        @php
                                            $totalRevenue = 0;
                                            $totalCost = 0;

                                            foreach ($monthlyRevenues as $revenue) {
                                                if ($revenue->year . '-' . str_pad($revenue->month, 2, '0', STR_PAD_LEFT) == $month) {
                                                    $totalRevenue = $revenue->total_revenue;
                                                    break;
                                                }
                                            }

                                            foreach ($monthlyCosts as $cost) {
                                                if ($cost->year . '-' . str_pad($cost->month, 2, '0', STR_PAD_LEFT) == $month) {
                                                    $totalCost = $cost->total_cost;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $month }}</td>
                                            <td>{{ number_format($totalRevenue, 0, ',', '.') }} VND</td>
                                            <td>{{ number_format($totalCost, 0, ',', '.') }} VND</td>
                                            <td>{{ number_format($profit, 0, ',', '.') }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Không có dữ liệu lợi nhuận.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sản phẩm bán chạy và Tồn kho sản phẩm -->
        <div class="row">
            <!-- Sản phẩm bán chạy -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Sản phẩm bán chạy</h4>
                    </div>
                    <div class="card-body">
                        @if ($bestSellingProducts->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng đã bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bestSellingProducts as $product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->total_sold }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $bestSellingProducts->appends(['revenuePage' => $revenues->currentPage(), 'inventoryPage' => $productInventory->currentPage()])->links('pagination') !!}
                        @else
                            <p>Không có dữ liệu sản phẩm bán chạy.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tồn kho sản phẩm -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Tồn kho sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        @if ($productInventory->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tồn kho</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productInventory as $product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_quantity }}</td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $productInventory->appends(['revenuePage' => $revenues->currentPage()])->links('pagination') !!}
                        @else
                            <p>Không có dữ liệu tồn kho sản phẩm.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
