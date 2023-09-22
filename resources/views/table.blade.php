@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <!-- Products Inventory -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Products Inventory</h2>

            </div>
            <div class="card-body">
             
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>ID</th>
                            <th>Qty</th>
                            <th>Variants</th>
                            <th>Committed</th>
                            <th>User Activity</th>
                            <th>Sold</th>
                            <th>In Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="py-0">
                                <img src="{{url('assets/images/products/products-xs-01.jpg')}}" alt="Product Image">
                            </td>
                            <td>Coach Swagger</td>
                            <td>24541</td>
                            <td>27</td>
                            <td>1</td>
                            <td>2</td>
                            <td>
                                <div id="tbl-chart-01"></div>
                            </td>
                            <td>4</td>
                            <td>18</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-0">
                                <img src="{{url('assets/images/products/products-xs-02.jpg')}}" alt="Product Image">
                            </td>
                            <td>Toddler Shoes, Gucci Watch</td>
                            <td>24542</td>
                            <td>18</td>
                            <td>7</td>
                            <td>5</td>
                            <td>
                                <div id="tbl-chart-02"></div>
                            </td>
                            <td>1</td>
                            <td>14</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-0">
                                <img src="{{url('assets/images/products/products-xs-11.jpg')}}" alt="Product Image">
                            </td>
                            <td>Smart Watch</td>
                            <td>24551</td>
                            <td>19</td>
                            <td>76</td>
                            <td>38</td>
                            <td>
                                <div id="tbl-chart-11"></div>
                            </td>
                            <td>3</td>
                            <td>17</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-0">
                                <img src="{{url('assets/images/products/products-xs-15.jpg')}}" alt="Product Image">
                            </td>
                            <td>Headphones</td>
                            <td>24555</td>
                            <td>17</td>
                            <td>6</td>
                            <td>7</td>
                            <td>
                                <div id="tbl-chart-15"></div>
                            </td>
                            <td>6</td>
                            <td>98</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </td>
                        </tr>



                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
</div>

</div>
@endsection